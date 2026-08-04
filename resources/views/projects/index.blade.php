<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project & Aplikasi Publik - Bagusdev</title>

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

<body class="bg-[#f8fafc] text-slate-800 antialiased selection:bg-indigo-500 selection:text-white flex flex-col min-h-screen">

    <!-- MAIN HEADER -->
    <header class="bg-white/90 border-b border-slate-100 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-3">

            <!-- Branding Logo -->
            <a href="{{ route('blog.index') }}" class="flex items-center group shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Bagusdev Logo" class="h-9 w-auto group-hover:scale-[1.02] transition duration-200">
            </a>

            <!-- Navigation Bar (desktop) -->
            <nav class="hidden md:flex flex-1 justify-center items-center space-x-6 text-sm font-semibold text-slate-600">
                <a href="{{ route('blog.index') }}" class="hover:text-indigo-600 transition duration-200 relative group">
                    Beranda Blog
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('projects.index') }}" class="text-indigo-600 font-bold relative group">
                    Project & Aplikasi
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600"></span>
                </a>
            </nav>

            <!-- Right side: Search & Mobile Menu Button -->
            <div class="flex items-center gap-2">
                <form action="{{ route('projects.index') }}" method="GET" class="relative flex items-center">
                    <input type="text" name="search" value="{{ $searchQuery ?? '' }}" placeholder="Cari project..."
                        class="w-32 sm:w-48 md:w-56 text-xs bg-slate-100 text-slate-700 pl-3 pr-8 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                    <button type="submit" class="absolute right-2 text-slate-400 hover:text-indigo-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>

                <!-- Hamburger button (mobile) -->
                <button id="hamburger-btn" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition" aria-label="Toggle Menu">
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
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-lg">
            <a href="{{ route('blog.index') }}" class="block text-slate-600 hover:text-indigo-600 py-2 font-medium">Beranda Blog</a>
            <a href="{{ route('projects.index') }}" class="block text-indigo-600 font-bold py-2">Project & Aplikasi</a>
        </div>
    </header>

    <!-- HERO BANNER -->
    <section class="bg-gradient-to-br from-indigo-900 via-slate-900 to-indigo-950 text-white py-14 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(99,102,241,0.15),transparent_50%)]"></div>
        <div class="max-w-7xl mx-auto relative z-10 text-center sm:text-left flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    PUBLIC SHOWCASE & TOOLS
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4">
                    Koleksi Project & <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Aplikasi Publik</span>
                </h1>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                    Jelajahi berbagai web app, utilitas, dan project open-source buatan saya yang bisa digunakan langsung secara publik.
                </p>
            </div>

            <!-- Stats Badge -->
            <div class="flex items-center gap-4 bg-white/5 backdrop-blur-md p-4 rounded-2xl border border-white/10 shrink-0">
                <div class="text-center px-4">
                    <div class="text-2xl sm:text-3xl font-black text-indigo-400">{{ $projects->total() }}</div>
                    <div class="text-xs text-slate-400 font-medium">Total Project</div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full">

        <!-- FILTER BAR -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8">
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                <span>Daftar Project</span>
                @if($searchQuery)
                    <span class="text-xs font-semibold text-slate-500 bg-slate-200 px-2.5 py-1 rounded-full">Pencarian: "{{ $searchQuery }}"</span>
                @endif
            </h2>

            <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0">
                <a href="{{ route('projects.index') }}"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition {{ empty($statusFilter) ? 'bg-indigo-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Semua
                </a>
                @foreach(['Live', 'Beta', 'Dalam Pengembangan'] as $st)
                    <a href="{{ route('projects.index', array_filter(['status' => $st, 'search' => $searchQuery ?? null])) }}"
                        class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition whitespace-nowrap {{ ($statusFilter ?? '') === $st ? 'bg-indigo-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                        {{ $st }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- PROJECT GRID -->
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($projects as $project)
                    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                        <div>
                            <!-- Thumbnail & Status Badge -->
                            <div class="relative overflow-hidden aspect-video bg-slate-100">
                                <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                                <div class="absolute top-3 left-3 flex items-center gap-2">
                                    @php
                                        $statusClasses = match($project->status) {
                                            'Live' => 'bg-emerald-500/90 text-white shadow-emerald-500/20',
                                            'Beta' => 'bg-amber-500/90 text-white shadow-amber-500/20',
                                            'Dalam Pengembangan' => 'bg-blue-500/90 text-white shadow-blue-500/20',
                                            default => 'bg-slate-600/90 text-white',
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider shadow-md backdrop-blur-md {{ $statusClasses }}">
                                        {{ $project->status }}
                                    </span>
                                </div>

                                @if($project->is_featured)
                                    <div class="absolute top-3 right-3">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase bg-amber-400 text-slate-900 shadow-md">
                                            ★ Unggulan
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition duration-200 line-clamp-1 mb-2">
                                    <a href="{{ route('projects.show', $project->slug) }}">
                                        {{ $project->title }}
                                    </a>
                                </h3>

                                <p class="text-slate-600 text-xs sm:text-sm line-clamp-3 mb-4 leading-relaxed">
                                    {{ $project->excerpt }}
                                </p>

                                <!-- Tech Stack Badges -->
                                @if(!empty($project->tech_stack) && is_array($project->tech_stack))
                                    <div class="flex flex-wrap gap-1.5 mb-4">
                                        @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                                            <span class="bg-indigo-50 text-indigo-700 text-[11px] font-semibold px-2.5 py-0.5 rounded-md border border-indigo-100">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                        @if(count($project->tech_stack) > 4)
                                            <span class="bg-slate-100 text-slate-500 text-[10px] font-bold px-2 py-0.5 rounded-md">
                                                +{{ count($project->tech_stack) - 4 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Links / Buttons -->
                        <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between gap-3">
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-xs font-bold text-slate-600 hover:text-indigo-600 transition flex items-center gap-1">
                                Detail Info
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <div class="flex items-center gap-2">
                                @if(!empty($project->github_url))
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                        class="p-2 text-slate-500 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-lg transition" title="GitHub Repo">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"></path>
                                        </svg>
                                    </a>
                                @endif

                                @if(!empty($project->demo_url))
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm shadow-indigo-500/30 transition">
                                        <span>Buka App</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="mt-10">
                {{ $projects->links() }}
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto my-8">
                <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Belum Ada Project</h3>
                <p class="text-slate-500 text-xs sm:text-sm mb-6">Belum ada project yang dipublikasikan atau sesuai kata kunci pencarian Anda.</p>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition">
                    Reset Filter
                </a>
            </div>
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-8 px-4 border-t border-slate-800 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div>
                <span class="font-bold text-white">Bagusdev</span> &copy; {{ date('Y') }}. Showcase Project & Aplikasi Publik.
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('blog.index') }}" class="hover:text-white transition">Blog</a>
                <a href="{{ route('projects.index') }}" class="hover:text-white transition">Project</a>
            </div>
        </div>
    </footer>

    <!-- JS untuk Hamburger Mobile Menu -->
    <script>
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                const isOpen = menu.classList.contains('open');
                if (isOpen) {
                    menu.classList.remove('open');
                    menu.classList.add('hidden');
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                } else {
                    menu.classList.remove('hidden');
                    menu.classList.add('open');
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                }
            });
        }
    </script>
</body>
</html>
