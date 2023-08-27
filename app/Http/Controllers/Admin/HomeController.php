<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSlider;
use App\Repository\HomeRepository\IHomeRepository;

class HomeController extends Controller
{
    public $logger;
    public $homeRepository;

    public function __construct(ILogger $logger, IHomeRepository $homeRepository)
    {
        $this->logger = $logger;
        $this->homeRepository = $homeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $sliders = $this->homeRepository->getAllPaginated($request->search);

            return view('admin.home.sliders', compact('sliders'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show sliders list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show sliders list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.home.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show home.create form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create slider form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSliderRequest $request)
    {
        try
        {
            $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
            $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

            $this->homeRepository->create([
                'intro' => $request->intro,
                'designation' => $request->designation,
                'image' => $imagePath,
            ]);

            $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

            return redirect()->route('homes.index')->with(['message' => 'slider data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore slider Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
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
            $slider = $this->homeRepository->find($id);

            return view('admin.home.edit', compact('slider'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show home.edit form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show edit slider form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlider $request, string $id)
    {
        try
        {
            $slider = $this->homeRepository->find($id);

            if ($request->image != null)
            {
                if(File::exists(public_path($slider->image)))
                {
                    File::delete(public_path($slider->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

                $this->homeRepository->update($id, [
                    'intro' => $request->intro,
                    'designation' => $request->designation,
                    'image' => $imagePath,
                ]);
                $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

                return redirect()->route('homes.index')->with(['message' => 'slider data updated successfully']);
            }

            $this->homeRepository->update($id, [
                'intro' => $request->intro,
                'designation' => $request->designation,
            ]);

            return redirect()->route('homes.index')->with(['message' => 'slider data updated successfully']);
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
            $slider = $this->homeRepository->find($id);

            if(File::exists(public_path($slider->image)))
            {
                File::delete(public_path($slider->image));
            }

            $this->homeRepository->destroy($id);

            return redirect()->route('homes.index')->with(['message' => 'Slider deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Slider", "error", $e);

            return redirect()->back()->with(['message' => 'Slider can not be deleted']);
        }
    }
}
