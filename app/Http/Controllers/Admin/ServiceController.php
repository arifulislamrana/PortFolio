<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository\IServiceRepository;

class ServiceController extends Controller
{
    public $logger;
    public $serviceRepository;
    public $icon = ["flaticon-ideas", "flaticon-flasks", "flaticon-analysis"];

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $services = $this->serviceRepository->getAllPaginated($request->search);

            return view('admin.service.services', compact('services'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show service list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show service list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.service.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create service form", "error", $e);

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
            $this->serviceRepository->create([
                'name' => $request->name,
                'icon' => $this->icon[rand(0, count($this->icon)-1)],
            ]);

            return redirect()->route('services.index')->with(['message' => 'Service data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store service data", "error", $e);

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
            $service = $this->serviceRepository->find($id);

            return view('admin.service.edit', compact('service'));
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
            $this->serviceRepository->update($id, [
                'name' => $request->name,
                'icon' => $this->icon[rand(0, count($this->icon)-1)],
            ]);

            return redirect()->route('services.index')->with(['message' => 'Service data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to update service data", "error", $e);

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
            $this->serviceRepository->destroy($id);

            return redirect()->route('services.index')->with(['message' => 'Service deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete service", "error", $e);

            return redirect()->back()->with(['message' => 'service can not be deleted']);
        }
    }
}
