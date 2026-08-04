<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->query('search');
        $statusFilter = $request->query('status');
        $techFilter = $request->query('tech');

        $query = Project::latest();

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('summary', 'like', '%' . $searchQuery . '%');
            });
        }

        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }

        $projects = $query->paginate(9)->withQueryString();

        $featuredProjects = Project::where('is_featured', true)->latest()->take(3)->get();
        if ($featuredProjects->isEmpty()) {
            $featuredProjects = Project::latest()->take(3)->get();
        }

        return view('projects.index', compact(
            'projects',
            'featuredProjects',
            'searchQuery',
            'statusFilter',
            'techFilter'
        ));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->increment('views_count');

        $otherProjects = Project::where('id', '!=', $project->id)->latest()->take(3)->get();

        return view('projects.show', compact('project', 'otherProjects'));
    }
}
