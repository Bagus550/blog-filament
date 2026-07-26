<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagusdevBlog - Insight, Web Dev & Tech Tutorials</title>

    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- TOP ANNOUNCEMENT BAR -->
    @if($featuredPost)
    <div class="bg-slate-900 text-white text-xs py-2.5 px-4 shadow-inner">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2 truncate">
                <span class="bg-indigo-600 text-white text-[9px] uppercase font-extrabold px-2.5 py-0.5 rounded-full tracking-wider animate-pulse">LATEST STORY</span>
                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="hover:text-indigo-400 transition truncate text-slate-200 font-medium">
                    {{ $featuredPost->title }}
                </a>
            </div>
            <div class="hidden sm:block text-slate-400 shrink-0 text-[11px] font-medium">
                {{ $featuredPost->created_at->format('d M Y') }}
            </div>
        </div>
    </div>
    @endif

    <!-- MAIN HEADER -->
    <header class="bg-white/90 border-b border-slate-100 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            <!-- Branding BagusdevBlog -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center font-black text-xl shadow-md shadow-indigo-200 group-hover:scale-105 transition">
                    B
                </div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">
                    Bagusdev<span class="text-indigo-600">Blog</span>
                </span>
            </a>

            <!-- Navigation Bar -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-600">
                <a href="#" class="hover:text-indigo-600 transition duration-200 relative group">
                    Tutorial
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="hover:text-indigo-600 transition duration-200 relative group">
                    Web Development
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="hover:text-indigo-600 transition duration-200 relative group">
                    Backend
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="hover:text-indigo-600 transition duration-200 relative group">
                    Architecture
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
            </nav>

            <!-- Search Icon -->
            <div class="flex items-center space-x-3">
                <button class="p-2 text-slate-500 hover:text-indigo-600 hover:bg-slate-100 rounded-full transition duration-200" aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- CONTAINER UTAMA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">

        <!-- CATEGORIES SECTION -->
        <div class="flex items-center space-x-3 overflow-x-auto pb-4 scrollbar-none">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Topik:</span>
            <a href="#" class="px-4 py-1.5 bg-indigo-600 text-white text-xs font-bold rounded-full shadow-sm hover:shadow-md transition">Semua</a>
            <a href="#" class="px-4 py-1.5 bg-white text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 text-xs font-semibold rounded-full border border-slate-200 transition">Laravel</a>
            <a href="#" class="px-4 py-1.5 bg-white text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 text-xs font-semibold rounded-full border border-slate-200 transition">Tailwind CSS</a>
            <a href="#" class="px-4 py-1.5 bg-white text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 text-xs font-semibold rounded-full border border-slate-200 transition">Filament PHP</a>
            <a href="#" class="px-4 py-1.5 bg-white text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 text-xs font-semibold rounded-full border border-slate-200 transition">Docker</a>
        </div>

        <!-- 1. HERO FEATURED SECTION (GAYA MAGAZINE 3 KOLOM) -->
        @if($featuredPost)
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

            <!-- Card 1: Featured Utama (Lg: 5/12) -->
            <div class="lg:col-span-5 flex flex-col justify-between bg-white p-5 rounded-3xl border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="block flex-grow">
                    <div class="overflow-hidden rounded-2xl mb-5 aspect-[4/3] bg-slate-100 relative shadow-sm">
                        <img src="https://picsum.photos/700/525?random={{ $featuredPost->id }}"
                            alt="{{ $featuredPost->title }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/10 to-transparent"></div>
                    </div>
                    <span class="text-[10px] font-extrabold text-indigo-600 uppercase tracking-widest bg-indigo-50 px-2.5 py-1 rounded-md">FEATURED STORY</span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 group-hover:text-indigo-600 transition duration-200 leading-snug mt-4">
                        {{ $featuredPost->title }}
                    </h1>

                    @php
                    $content = is_string($featuredPost->content) ? json_decode($featuredPost->content, true) : $featuredPost->content;
                    $excerpt = '';
                    if (is_array($content)) {
                        foreach ($content as $block) {
                            if (isset($block['type']) && $block['type'] === 'paragraph') {
                                $excerpt = Str::limit(strip_tags($block['data']['content']), 140);
                                break;
                            }
                        }
                    }
                    @endphp
                    <p class="text-slate-500 text-sm mt-3 line-clamp-3 leading-relaxed">
                        {{ $excerpt }}
                    </p>
                </a>
                <div class="text-xs text-slate-400 mt-6 pt-4 border-t border-slate-50 flex items-center space-x-2">
                    <span class="font-bold text-slate-700">Bagusdev</span>
                    <span>•</span>
                    <span>{{ $featuredPost->created_at->format('d M Y') }}</span>
                </div>
            </div>

            <!-- Card 2: Highlight Quote Box / Top Story (Lg: 3/12) -->
            @if($highlightPost)
            <div class="lg:col-span-3 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 text-white p-7 sm:p-8 rounded-3xl relative flex flex-col justify-between overflow-hidden shadow-lg hover:shadow-xl hover:scale-[1.01] transition-all duration-300">
                <span class="absolute -top-1 -right-1 bg-indigo-600 text-white font-extrabold text-[8px] tracking-widest uppercase px-6 py-2 rotate-45 shadow-sm">
                    HIGHLIGHT
                </span>
                <div>
                    <div class="text-indigo-400 text-6xl font-serif leading-none mb-3 pointer-events-none select-none">“</div>
                    <a href="{{ route('blog.show', $highlightPost->slug) }}">
                        <h2 class="text-xl font-bold leading-snug hover:text-indigo-300 transition duration-200">
                            {{ $highlightPost->title }}
                        </h2>
                    </a>
                </div>
                <div class="pt-6 border-t border-indigo-900/60 mt-6 flex justify-between items-center text-xs text-indigo-300 font-medium">
                    <span>BagusdevBlog</span>
                    <span>{{ $highlightPost->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @endif

            <!-- Card 3: Secondary Highlight (Lg: 4/12) -->
            @if($secondaryPost)
            <div class="lg:col-span-4 flex flex-col justify-between bg-white p-5 rounded-3xl border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                <a href="{{ route('blog.show', $secondaryPost->slug) }}" class="block flex-grow">
                    <div class="overflow-hidden rounded-2xl mb-5 aspect-[16/9] bg-slate-100 relative shadow-sm">
                        <img src="https://picsum.photos/600/338?random={{ $secondaryPost->id }}"
                            alt="{{ $secondaryPost->title }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <span class="text-[10px] font-extrabold text-amber-600 uppercase tracking-widest bg-amber-50 px-2.5 py-1 rounded-md">TRENDING</span>
                    <h2 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition duration-200 mt-4 leading-snug">
                        {{ $secondaryPost->title }}
                    </h2>
                </a>
                <div class="text-xs text-slate-400 mt-6 pt-4 border-t border-slate-50">
                    {{ $secondaryPost->created_at->format('d M Y') }}
                </div>
            </div>
            @endif

        </section>
        @endif

        <!-- 2. MAIN CONTENT AREA & SIDEBAR -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- MAIN CONTENT / TUTORIAL GRID (70% = Lg: 8/12) -->
            <div class="lg:col-span-8 space-y-8">

                <div class="flex justify-between items-center border-b border-slate-200 pb-4">
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Artikel Terbaru</h2>
                    <span class="text-xs text-slate-400 font-semibold">Menampilkan tutorial dev terbaik</span>
                </div>

                <!-- Grid Artikel -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($tutorialPosts as $post)
                    <article class="group bg-white p-4 rounded-2xl border border-slate-100 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <a href="{{ route('blog.show', $post->slug) }}" class="block flex-grow">
                            <div class="overflow-hidden rounded-xl mb-4 aspect-[16/10] bg-slate-100">
                                <img src="https://picsum.photos/400/250?random={{ $post->id }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300">
                            </div>
                            <div class="text-[11px] font-semibold text-indigo-600 mb-2 uppercase tracking-wider">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                            <h3 class="font-bold text-slate-900 text-base group-hover:text-indigo-600 transition duration-200 leading-snug line-clamp-2">
                                {{ $post->title }}
                            </h3>
                        </a>
                    </article>
                    @empty
                    <p class="text-slate-500 text-sm col-span-2 italic">Belum ada artikel tutorial tambahan.</p>
                    @endforelse
                </div>

            </div>

            <!-- SIDEBAR AREA (30% = Lg: 4/12) -->
            <aside class="lg:col-span-4 space-y-6">

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm space-y-6">
                    <h3 class="text-lg font-extrabold text-slate-900 pb-3 border-b border-slate-100">
                        Populer Minggu Ini
                    </h3>

                    <div class="space-y-6">
                        @foreach($sidebarPosts as $post)
                        <a href="{{ route('blog.show', $post->slug) }}" class="flex items-center space-x-4 group">
                            <div class="w-16 h-16 rounded-xl bg-slate-100 shrink-0 overflow-hidden shadow-inner">
                                <img src="https://picsum.photos/120/120?random={{ $post->id }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 group-hover:text-indigo-600 transition duration-200 leading-snug line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <span class="text-[10px] text-slate-400 block mt-1.5 font-medium">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </aside>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-100 mt-28 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="flex justify-center items-center space-x-2 font-extrabold text-lg text-slate-900">
                <div class="w-6 h-6 bg-indigo-600 text-white rounded-md flex items-center justify-center font-black text-xs shadow-sm">B</div>
                <span>Bagusdev<span class="text-indigo-600">Blog</span></span>
            </div>
            <p class="text-xs text-slate-400 font-medium">
                &copy; {{ date('Y') }} BagusdevBlog. All rights reserved. Built with Tailwind CSS & Laravel.
            </p>
        </div>
    </footer>

</body>

</html>