<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProject;
use Illuminate\Support\Facades\File;
use App\Repository\ProjectRepository\IProjectRepository;

class ProjectController extends Controller
{
    public $logger;
    public $projectRepository;

    public function __construct(ILogger $logger, IProjectRepository $projectRepository)
    {
        $this->logger = $logger;
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $projects = $this->projectRepository->getAllPaginated($request->search);

            return view('admin.project.projects', compact('projects'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show projects list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show projects list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.project.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create projectws form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProject $request)
    {
        try
        {
            $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
            $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

            $this->projectRepository->create([
                'name' => $request->name,
                'title' => $request->title,
                'image' => $imagePath,
                'src' => $request->src,
            ]);

            $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

            return redirect()->route('projects.index')->with(['message' => 'Project data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Project Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try
        {
            $project = $this->projectRepository->find($id);

            return view('admin.project.edit', compact('project'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show edit project form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $project = $this->projectRepository->find($id);

            if ($request->image != null)
            {
                if(File::exists(public_path($project->image)))
                {
                    File::delete(public_path($project->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

                $this->projectRepository->update($id, [
                    'name' => $request->name,
                    'title' => $request->title,
                    'image' => $imagePath,
                    'src' => $request->src,
                ]);
                $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

                return redirect()->route('projects.index')->with(['message' => 'Project data Updated successfully']);
            }

            $this->projectRepository->update($id, [
                'name' => $request->name,
                'title' => $request->title,
                'src' => $request->src,
            ]);

            return redirect()->route('projects.index')->with(['message' => 'Project data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update product Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $project = $this->projectRepository->find($id);

            if(File::exists(public_path($project->image)))
            {
                File::delete(public_path($project->image));
            }

            $this->projectRepository->destroy($id);

            return redirect()->route('projects.index')->with(['message' => 'Project deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Project", "error", $e);

            return redirect()->back()->with(['message' => 'Project can not be deleted']);
        }
    }
}
