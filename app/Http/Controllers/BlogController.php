<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');

        $query = Post::latest();
        if ($selectedCategory && in_array($selectedCategory, ['Teknologi', 'Gaya Hidup', 'Edukasi', 'Bisnis', 'Kreatif'])) {
            $query->where('category', $selectedCategory);
        }

        $allPosts = $query->get();

        if ($selectedCategory) {
            $featuredPost  = null;
            $highlightPost = null;
            $secondaryPost = null;
            $tutorialPosts = $allPosts;
        } else {
            $featuredPost  = $allPosts->get(0);
            $highlightPost = $allPosts->get(1);
            $secondaryPost = $allPosts->get(2);
            $tutorialPosts = $allPosts->skip(3)->take(6);
        }

        $sidebarPosts = Post::latest()->take(5)->get();

        return view('blog.index', compact(
            'featuredPost',
            'highlightPost',
            'secondaryPost',
            'tutorialPosts',
            'sidebarPosts',
            'selectedCategory'
        ));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
