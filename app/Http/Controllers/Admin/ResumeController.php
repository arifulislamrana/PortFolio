<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateResume;
use App\Repository\ResumeRepository\IResumeRepository;

class ResumeController extends Controller
{
    public $logger;
    public $resumeRepository;

    public function __construct(ILogger $logger, IResumeRepository $resumeRepository)
    {
        $this->logger = $logger;
        $this->resumeRepository = $resumeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $resumes = $this->resumeRepository->getAllPaginated($request->search);

            return view('admin.resume.resumes', compact('resumes'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show resume list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show resume list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.resume.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create resume form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResume $request)
    {
        try
        {
            $this->resumeRepository->create($request->validated());

            return redirect()->route('resumes.index')->with(['message' => 'Resume data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store resume data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to store data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $resume = $this->resumeRepository->find($id);

            return view('admin.resume.resume', compact('resume'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show  resume data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try
        {
            $resume = $this->resumeRepository->find($id);

            return view('admin.resume.edit', compact('resume'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show edit resume form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateResume $request, string $id)
    {
        try
        {
            $this->resumeRepository->update($id, $request->validated());

            return redirect()->route('resumes.index')->with(['message' => 'Resume data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store resume data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to update data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->resumeRepository->destroy($id);

            return redirect()->route('resumes.index')->with(['message' => 'Resume deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete resume", "error", $e);

            return redirect()->back()->with(['message' => 'resume can not be deleted']);
        }
    }
}
