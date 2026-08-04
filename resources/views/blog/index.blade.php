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

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Mobile menu drawer transition */
        #mobile-menu {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        #mobile-menu.hidden {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }
        #mobile-menu.open {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    {{-- Bug 5 fix: Fungsi getPostThumbnail() telah dipindahkan ke Model Post sebagai accessor thumbnail_url --}}

    <!-- TOP ANNOUNCEMENT BAR -->
    @if($featuredPost)
    <div class="bg-slate-900 text-white text-xs py-2.5 px-4 shadow-inner">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2 truncate">
                <span class="bg-indigo-600 text-white text-[9px] uppercase font-extrabold px-2.5 py-0.5 rounded-full tracking-wider animate-pulse shrink-0">LATEST</span>
                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="hover:text-indigo-400 transition truncate text-slate-200 font-medium">
                    {{ $featuredPost->title }}
                </a>
            </div>
            <div class="hidden sm:block text-slate-400 shrink-0 text-[11px] font-medium ml-4">
                {{ $featuredPost->created_at->format('d M Y') }}
            </div>
        </div>
    </div>
    @endif

    <!-- MAIN HEADER -->
    <header class="bg-white/90 border-b border-slate-100 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-3">

            <!-- Branding BagusdevBlog -->
            <a href="/" class="flex items-center group shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="BagusdevBlog Logo" class="h-9 w-auto group-hover:scale-[1.02] transition duration-200">
            </a>

            <!-- Navigation Bar (desktop) -->
            <nav class="hidden md:flex flex-1 justify-center items-center space-x-6 text-sm font-semibold text-slate-600">
                <a href="{{ route('blog.index', array_filter(['search' => $searchQuery ?? null])) }}"
                    class="hover:text-indigo-600 transition duration-200 relative group {{ empty($selectedCategory) ? 'text-indigo-600' : '' }}">
                    Beranda
                    <span class="absolute bottom-0 left-0 {{ empty($selectedCategory) ? 'w-full' : 'w-0' }} h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('projects.index') }}"
                    class="hover:text-indigo-600 transition duration-200 relative group">
                    Project & Aplikasi
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>

                @php
                $catList = $categories ?? ['Ensiklopedia', 'Fakta Unik', 'Info Menarik'];
                @endphp

                @foreach($catList as $categoryName)
                <a href="{{ route('blog.index', array_filter(['category' => $categoryName, 'search' => $searchQuery ?? null])) }}"
                    class="hover:text-indigo-600 transition duration-200 relative group {{ ($selectedCategory ?? '') === $categoryName ? 'text-indigo-600 font-bold' : '' }}">
                    {{ $categoryName }}
                    <span class="absolute bottom-0 left-0 {{ ($selectedCategory ?? '') === $categoryName ? 'w-full' : 'w-0' }} h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
                @endforeach
            </nav>

            <!-- Right side: Search + Hamburger -->
            <div class="flex items-center gap-2">
                <!-- Search Form -->
                <form action="{{ route('blog.index') }}" method="GET" class="relative flex items-center">
                    @if(!empty($selectedCategory))
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif
                    <input type="text" name="search" value="{{ $searchQuery ?? '' }}" placeholder="Cari artikel..."
                        class="w-32 sm:w-48 md:w-56 text-xs bg-slate-100 text-slate-700 pl-3 pr-8 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                    <button type="submit" class="absolute right-2 text-slate-400 hover:text-indigo-600" aria-label="Search">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>

                <!-- Hamburger Button (mobile only) -->
                <button id="hamburger-btn" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition" aria-label="Toggle menu">
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 px-4 pb-4 pt-2 space-y-1">
            @php $catList = $categories ?? ['Ensiklopedia', 'Fakta Unik', 'Info Menarik']; @endphp
            <a href="{{ route('blog.index') }}"
                class="block py-2.5 px-3 rounded-xl text-sm font-semibold {{ empty($selectedCategory) ? 'text-indigo-600 bg-indigo-50' : 'text-slate-700 hover:bg-slate-50' }} transition">
                Beranda
            </a>
            <a href="{{ route('projects.index') }}"
                class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
                Project & Aplikasi
            </a>
            @foreach($catList as $categoryName)
            <a href="{{ route('blog.index', array_filter(['category' => $categoryName])) }}"
                class="block py-2.5 px-3 rounded-xl text-sm font-semibold {{ ($selectedCategory ?? '') === $categoryName ? 'text-indigo-600 bg-indigo-50' : 'text-slate-700 hover:bg-slate-50' }} transition">
                {{ $categoryName }}
            </a>
            @endforeach
        </div>
    </header>

    <!-- CONTAINER UTAMA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 space-y-12 sm:space-y-16">

        <!-- 1. HERO FEATURED SECTION (GAYA MAGAZINE 3 KOLOM) -->
        @if(empty($searchQuery) && empty($selectedCategory) && isset($featuredPost) && $featuredPost)
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">

            <!-- Card 1: Featured Utama -->
            <div class="lg:col-span-5 flex flex-col justify-between bg-white p-4 sm:p-5 rounded-3xl border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="block flex-grow">
                    <div class="overflow-hidden rounded-2xl mb-4 sm:mb-5 aspect-[4/3] bg-slate-100 relative shadow-sm">
                        <img src="{{ $featuredPost->thumbnail_url }}"
                            alt="{{ $featuredPost->title }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/10 to-transparent"></div>
                    </div>
                    <span class="text-[10px] font-extrabold text-indigo-600 uppercase tracking-widest bg-indigo-50 px-2.5 py-1 rounded-md">FEATURED STORY</span>
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 group-hover:text-indigo-600 transition duration-200 leading-snug mt-3 sm:mt-4">
                        {{ $featuredPost->title }}
                    </h1>

                    @php
                    $content = is_string($featuredPost->content) ? json_decode($featuredPost->content, true) : $featuredPost->content;
                    $excerpt = '';
                    if (is_array($content)) {
                    foreach ($content as $block) {
                    if (isset($block['type']) && $block['type'] === 'paragraph') {
                    // Bug 4 fix: Ganti Str:: dengan fully-qualified namespace
                    $excerpt = \Illuminate\Support\Str::limit(strip_tags($block['data']['content']), 140);
                    break;
                    }
                    }
                    }
                    @endphp
                    <p class="text-slate-500 text-sm mt-3 line-clamp-3 leading-relaxed">
                        {{ $excerpt }}
                    </p>
                </a>
                <div class="text-xs text-slate-400 mt-4 sm:mt-6 pt-4 border-t border-slate-50 flex items-center space-x-2">
                    <span class="font-bold text-slate-700">Bagusdev</span>
                    <span>•</span>
                    <span>{{ $featuredPost->created_at->format('d M Y') }}</span>
                </div>
            </div>

            <!-- Card 2: Highlight Quote Box -->
            @if(isset($highlightPost) && $highlightPost)
            <div class="lg:col-span-3 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 text-white p-6 sm:p-8 rounded-3xl relative flex flex-col justify-between overflow-hidden shadow-lg hover:shadow-xl hover:scale-[1.01] transition-all duration-300">
                <span class="absolute top-4 right-4 bg-indigo-600 text-white font-extrabold text-[10px] tracking-wider uppercase px-3 py-1 rounded-full shadow-sm">
                    HIGHLIGHT
                </span>
                <div>
                    <div class="text-indigo-400 text-6xl font-serif leading-none mb-3 pointer-events-none select-none">"</div>
                    <a href="{{ route('blog.show', $highlightPost->slug) }}">
                        <h2 class="text-lg sm:text-xl font-bold leading-snug hover:text-indigo-300 transition duration-200">
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

            <!-- Card 3: Secondary Highlight -->
            @if(isset($secondaryPost) && $secondaryPost)
            <div class="lg:col-span-4 flex flex-col justify-between bg-white p-4 sm:p-5 rounded-3xl border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                <a href="{{ route('blog.show', $secondaryPost->slug) }}" class="block flex-grow">
                    <div class="overflow-hidden rounded-2xl mb-4 sm:mb-5 aspect-[16/9] bg-slate-100 relative shadow-sm">
                        <img src="{{ $secondaryPost->thumbnail_url }}"
                            alt="{{ $secondaryPost->title }}"
                            class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <span class="text-[10px] font-extrabold text-amber-600 uppercase tracking-widest bg-amber-50 px-2.5 py-1 rounded-md">TRENDING</span>
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition duration-200 mt-3 sm:mt-4 leading-snug">
                        {{ $secondaryPost->title }}
                    </h2>
                </a>
                <div class="text-xs text-slate-400 mt-4 sm:mt-6 pt-4 border-t border-slate-50">
                    {{ $secondaryPost->created_at->format('d M Y') }}
                </div>
            </div>
            @endif

        </section>
        @endif

        <!-- FEATURED PROJECTS SHOWCASE SECTION (SEKSI PROJECT & APLIKASI) -->
        @if(isset($featuredProjects) && $featuredProjects->count() > 0)
        <section class="bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 relative z-10 border-b border-slate-800 pb-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span class="text-indigo-400 text-xs font-bold uppercase tracking-wider">Public Tools & Showcase</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-white mt-1">Project & Aplikasi Publik</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-300 hover:text-white bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full transition border border-white/10 shrink-0">
                    <span>Lihat Semua Project</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                @foreach($featuredProjects as $project)
                <div class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700/70 rounded-2xl p-4 flex flex-col justify-between transition duration-300 hover:-translate-y-1 group">
                    <div>
                        <div class="overflow-hidden rounded-xl aspect-video bg-slate-900 relative mb-3">
                            <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-black uppercase tracking-wider bg-emerald-500 text-white shadow">
                                {{ $project->status }}
                            </span>
                        </div>
                        <h3 class="font-bold text-white group-hover:text-indigo-300 transition text-base line-clamp-1 mb-1">
                            <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                        </h3>
                        <p class="text-slate-400 text-xs line-clamp-2 mb-3">
                            {{ $project->excerpt }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-slate-700/50 text-xs">
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-indigo-300 hover:text-white font-semibold">
                            Detail →
                        </a>
                        @if(!empty($project->demo_url))
                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-bold px-3 py-1 rounded-lg transition">
                            Coba App
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- 2. MAIN CONTENT AREA & SIDEBAR -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12">

            <!-- MAIN CONTENT / TUTORIAL GRID -->
            <div class="lg:col-span-8 space-y-6 sm:space-y-8">

                <div class="flex justify-between items-center border-b border-slate-200 pb-4">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                            {{ $selectedCategory ? 'Kategori: ' . $selectedCategory : 'Artikel Terbaru' }}
                        </h2>
                        @if(!empty($searchQuery))
                        <p class="text-xs text-indigo-600 font-medium mt-1">
                            Hasil pencarian: "<span class="font-bold">{{ $searchQuery }}</span>"
                            <a href="{{ route('blog.index', array_filter(['category' => $selectedCategory])) }}" class="text-red-500 underline ml-2">hapus</a>
                        </p>
                        @endif
                    </div>
                    <span class="text-xs text-slate-400 font-semibold shrink-0 ml-2">{{ count($tutorialPosts) }} Artikel</span>
                </div>

                <!-- Grid Artikel -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-8">
                    @forelse($tutorialPosts as $post)
                    <article class="group bg-white p-4 rounded-2xl border border-slate-100 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <a href="{{ route('blog.show', $post->slug) }}" class="block flex-grow">
                            <div class="overflow-hidden rounded-xl mb-4 aspect-[16/10] bg-slate-100">
                                <img src="{{ $post->thumbnail_url }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300">
                            </div>
                            <div class="flex items-center space-x-2 text-[11px] font-semibold text-indigo-600 mb-2 uppercase tracking-wider">
                                <span class="bg-indigo-50 px-2 py-0.5 rounded">{{ $post->category }}</span>
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-400 font-medium">{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base group-hover:text-indigo-600 transition duration-200 leading-snug line-clamp-2">
                                {{ $post->title }}
                            </h3>
                        </a>
                    </article>
                    @empty
                    <p class="text-slate-500 text-sm col-span-2 italic">Belum ada artikel yang di upload.</p>
                    @endforelse
                </div>

            </div>

            <!-- SIDEBAR AREA -->
            <aside class="lg:col-span-4 space-y-6">

                <div class="bg-white p-5 sm:p-6 rounded-3xl border border-slate-100 shadow-sm space-y-5 sm:space-y-6">
                    <h3 class="text-base sm:text-lg font-extrabold text-slate-900 pb-3 border-b border-slate-100">
                        Populer Minggu Ini
                    </h3>

                    <div class="space-y-4 sm:space-y-6">
                        @foreach($sidebarPosts ?? [] as $post)
                        {{-- @var $post \App\Models\Post --}}
                        <a href="{{ route('blog.show', $post->slug) }}" class="flex items-center space-x-3 sm:space-x-4 group">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-slate-100 shrink-0 overflow-hidden shadow-inner">
                                <img src="{{ $post->thumbnail_url }}"
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
    <footer class="bg-white border-t border-slate-100 mt-16 sm:mt-28 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="flex justify-center items-center">
                <img src="{{ asset('images/logo.png') }}" alt="BagusdevBlog Logo" class="h-8 w-auto">
            </div>
            <p class="text-xs text-slate-400 font-medium">
                &copy; {{ date('Y') }} BagusDev. All rights reserved. Built with Tailwind CSS & Laravel.
            </p>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        let isOpen = false;

        btn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                menu.classList.remove('hidden');
                requestAnimationFrame(() => menu.classList.add('open'));
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                menu.classList.remove('open');
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        });
    </script>

</body>

</html>