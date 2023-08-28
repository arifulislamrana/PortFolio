<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlog;
use Illuminate\Support\Facades\File;
use App\Repository\BlogRepository\IBlogRepository;

class BlogController extends Controller
{
    public $logger;
    public $blogRepository;

    public function __construct(ILogger $logger, IBlogRepository $blogRepository)
    {
        $this->logger = $logger;
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $blogs = $this->blogRepository->getAllPaginated($request->search);

            return view('admin.blog.blogs', compact('blogs'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show blogs list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show blogs list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin.blog.create');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create blog form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlog $request)
    {
        try
        {
            $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
            $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

            $this->blogRepository->create([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $imagePath,
            ]);

            $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

            return redirect()->route('blogs.index')->with(['message' => 'Blog data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Blog Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $blog = $this->blogRepository->find($id);

            return view('admin.blog.blog', compact('blog'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show  blog data", "error", $e);

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
            $blog = $this->blogRepository->find($id);

            return view('admin.blog.edit', compact('blog'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show edit blog form", "error", $e);

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
            $blog = $this->blogRepository->find($id);

            if ($request->image != null)
            {
                if(File::exists(public_path($blog->image)))
                {
                    File::delete(public_path($blog->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.adminImagePath'))."\\".$imageName;

                $this->blogRepository->update($id, [
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $imagePath,
                ]);
                $request->file('image')->move(public_path(config('app.adminImagePath')), $imageName);

                return redirect()->route('blogs.index')->with(['message' => 'Blog data Updated successfully']);
            }

            $this->blogRepository->update($id, [
                'title' => $request->title,
                'body' => $request->body,
            ]);

            return redirect()->route('blogs.index')->with(['message' => 'Blog data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update Blog Data", $e);

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
            $blog = $this->blogRepository->find($id);

            if(File::exists(public_path($blog->image)))
            {
                File::delete(public_path($blog->image));
            }

            $this->blogRepository->destroy($id);

            return redirect()->route('blogs.index')->with(['message' => 'Blog deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Blog", "error", $e);

            return redirect()->back()->with(['message' => 'Blog can not be deleted']);
        }
    }
}
