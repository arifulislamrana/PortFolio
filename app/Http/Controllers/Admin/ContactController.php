<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ContactRepository\IContactRepository;

class ContactController extends Controller
{
    public $logger;
    public $contactRepository;

    public function __construct(ILogger $logger, IContactRepository $contactRepository)
    {
        $this->logger = $logger;
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $contacts = $this->contactRepository->getAllPaginated($request->search);

            return view('admin.contact.contacts', compact('contacts'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show contacts list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show contacts list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $contact = $this->contactRepository->find($id);

            return view('admin.contact.contact', compact('contact'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show  contact data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->contactRepository->destroy($id);

            return redirect()->route('contacts.index')->with(['message' => 'contact deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete contact", "error", $e);

            return redirect()->back()->with(['message' => 'skill can not be contact']);
        }
    }
}
