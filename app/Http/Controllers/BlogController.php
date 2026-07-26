<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        // Ambil 3 artikel teratas untuk Hero Section
        $heroPosts = Post::latest()->take(3)->get();

        $featuredPost  = $heroPosts->get(0); // Artikel utama terbesar (Lg: 5/12)
        $highlightPost = $heroPosts->get(1); // Artikel Quote/Top Post (Lg: 3/12)
        $secondaryPost = $heroPosts->get(2); // Artikel sekunder (Lg: 4/12)

        // Ambil artikel untuk grid main content
        $tutorialPosts = Post::latest()->skip(3)->take(6)->get();

        // Ambil artikel untuk sidebar (Latest/Popular)
        $sidebarPosts = Post::latest()->take(5)->get();

        return view('blog.index', compact(
            'featuredPost',
            'highlightPost',
            'secondaryPost',
            'tutorialPosts',
            'sidebarPosts'
        ));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
