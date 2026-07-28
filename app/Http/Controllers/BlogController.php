<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');
        $searchQuery      = $request->query('search');

        // Query terfilter untuk grid artikel utama
        $query = Post::latest();

        if ($selectedCategory) {
            $query->where('category', $selectedCategory);
        }

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('content', 'like', '%' . $searchQuery . '%');
            });
        }

        // Bug 3 fix: $tutorialPosts sekarang menggunakan $query yang sudah terfilter
        $tutorialPosts = $query->get();

        // $allPosts diambil terpisah untuk Hero Section (selalu tampil semua, tanpa filter)
        $allPosts = Post::latest()->get();

        $featuredPost  = $allPosts->get(0); // Terbaru #1
        $highlightPost = $allPosts->get(1); // Terbaru #2
        $secondaryPost = $allPosts->get(2); // Terbaru #3

        $sidebarPosts = Post::orderBy('views_count', 'desc')->take(5)->get();

        $categories = ['Ensiklopedia', 'Fakta Unik', 'Info Menarik'];

        return view('blog.index', compact(
            'tutorialPosts',
            'featuredPost',
            'highlightPost',
            'secondaryPost',
            'sidebarPosts',
            'selectedCategory',
            'searchQuery',
            'categories'
        ));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $post->increment('views_count');

        // Bug 2 fix: $categories sekarang diteruskan ke view
        $categories = Post::whereNotNull('category')->distinct()->pluck('category');

        return view('blog.show', compact('post', 'categories'));
    }
}

