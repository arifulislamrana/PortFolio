<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAbout;
use App\Http\Requests\UpdateAbout;
use Illuminate\Support\Facades\File;
use App\Repository\AboutRepository\IAboutRepository;

class AboutController extends Controller
{
    public $logger;
    public $aboutRepository;

    public function __construct(ILogger $logger, IAboutRepository $aboutRepository)
    {
        $this->logger = $logger;
        $this->aboutRepository = $aboutRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->aboutRepository->getData();

        if ($data == null)
        {
            return redirect()->route('abouts.create');
        }

        return view('admin.about.about', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.about.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show about.edit form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show edit about info form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAbout $request)
    {
        try
        {
            $data = $this->aboutRepository->getData();

            if ($data == null)
            {
                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

                $this->aboutRepository->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'dob' => $request->dob,
                    'image' => $imagePath,
                    'address' => $request->address,
                ]);
                $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

                return redirect()->route('abouts.index')->with(['message' => 'About data created successfully']);
            }

            return redirect()->back()->withErrors(['invalid' => 'About info already exist. If needed then update there.']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store about info", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to store about info']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try
        {
            $data = $this->aboutRepository->find($id);

            return view('admin.about.edit', compact('data'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show about.edit form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show edit about info form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbout $request, string $id)
    {
        try
        {
            $data = $this->aboutRepository->find($id);

            if ($request->image != null)
            {
                if(File::exists(public_path($data->image)))
                {
                    File::delete(public_path($data->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

                $this->aboutRepository->update($id, [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'dob' => $request->dob,
                    'image' => $imagePath,
                    'address' => $request->address,
                ]);
                $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

                return redirect()->route('abouts.index')->with(['message' => 'About data updated successfully']);
            }

            $this->aboutRepository->update($id, [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'dob' => $request->dob,
                'address' => $request->address,
            ]);

            return redirect()->route('abouts.index')->with(['message' => 'About data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update About Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->back();
    }
}
