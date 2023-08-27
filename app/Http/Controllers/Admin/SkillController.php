<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\SkillRepository\ISkillRepository;

class SkillController extends Controller
{
    public $logger;
    public $skillRepository;

    public function __construct(ILogger $logger, ISkillRepository $skillRepository)
    {
        $this->logger = $logger;
        $this->skillRepository = $skillRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $skills = $this->skillRepository->getAllPaginated($request->search);

            return view('admin.skill.skills', compact('skills'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show skills list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show skills list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.skill.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create skill form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $this->skillRepository->create([
                'name' => $request->name,
                'percentage' => $request->percentage,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('skills.index')->with(['message' => 'skill data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store skill data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to store data']);
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
            $skill = $this->skillRepository->find($id);

            return view('admin.skill.edit', compact('skill'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show edit service form", "error", $e);

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
            $this->skillRepository->update($id, [
                'name' => $request->name,
                'percentage' => $request->percentage,
                'updated_at' => now(),
            ]);

            return redirect()->route('skills.index')->with(['message' => 'skill data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to update skill data", "error", $e);

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
            $this->skillRepository->destroy($id);

            return redirect()->route('skills.index')->with(['message' => 'Skill deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Skill", "error", $e);

            return redirect()->back()->with(['message' => 'skill can not be deleted']);
        }
    }
}
