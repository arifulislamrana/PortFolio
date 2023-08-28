<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Blog;
use App\Repository\BlogRepository\IBlogRepository;
use App\Repository\HomeRepository\IHomeRepository;
use App\Repository\AboutRepository\IAboutRepository;
use App\Repository\SkillRepository\ISkillRepository;
use App\Repository\ResumeRepository\IResumeRepository;
use App\Repository\ProjectRepository\IProjectRepository;
use App\Repository\ServiceRepository\IServiceRepository;

class FrontController extends Controller
{
    public $logger;
    public $aboutRepository;
    public $homeRepository;
    public $blogRepository;
    public $serviceRepository;
    public $skillRepository;
    public $projectRepository;
    public $resumeRepository;

    public function __construct(ILogger $logger, IAboutRepository $aboutRepository, IHomeRepository $homeRepository, IBlogRepository $blogRepository, IServiceRepository $serviceRepository, ISkillRepository $skillRepository, IProjectRepository $projectRepository, IResumeRepository $resumeRepository)
    {
        $this->logger = $logger;
        $this->aboutRepository = $aboutRepository;
        $this->homeRepository = $homeRepository;
        $this->blogRepository = $blogRepository;
        $this->serviceRepository = $serviceRepository;
        $this->skillRepository = $skillRepository;
        $this->projectRepository = $projectRepository;
        $this->resumeRepository = $resumeRepository;
    }

    public function index()
    {
        $homeSliders = $this->homeRepository->getAll();
        $about = $this->aboutRepository->getData();
        $resumes = $this->resumeRepository->getAll();
        $services = $this->serviceRepository->getAll();
        $skills = $this->skillRepository->getAll();
        $projects = $this->projectRepository->getAll();
        $blogs = $this->blogRepository->getAll();

        return view('welcome', compact('homeSliders', 'about', 'resumes', 'services', 'skills', 'projects', 'blogs'));
    }

    public function contact(ContactRequest $request)
    {
        try
        {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            return redirect()->route('home')->with(['message' => 'Contact data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to store contact data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to send contact data']);
        }
    }

    public function blog(string $id)
    {
        try
        {
            $blog = Blog::find($id);

            return view('single_blog', compact('blog'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show  blog data", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show data']);
        }
    }
}
