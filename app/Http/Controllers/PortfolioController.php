<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $projects = Project::orderBy('order', 'asc')->get();
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('order', 'asc')
            ->get();
        $skills = Skill::orderBy('order', 'asc')->get();
        $skillsByCategory = $skills->groupBy('category');

        return view('portfolio.index', compact(
            'profile',
            'projects',
            'featuredProjects',
            'skills',
            'skillsByCategory'
        ));
    }
}