<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Project & Aplikasi Bagusdev</title>

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

        .prose-content p {
            margin-bottom: 1.25rem;
            line-height: 1.8;
            color: #334155;
        }

        .prose-content ul {
            list-style-type: disc !important;
            padding-left: 1.5rem !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.25rem !important;
        }

        .prose-content ol {
            list-style-type: decimal !important;
            padding-left: 1.5rem !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.25rem !important;
        }

        .prose-content li {
            margin-bottom: 0.5rem !important;
            line-height: 1.7;
        }

        .prose-content code {
            background-color: #f1f5f9;
            color: #4f46e5;
            padding: 0.15rem 0.4rem;
            border-radius: 0.375rem;
            font-family: monospace;
            font-size: 0.875em;
        }

        .prose-content pre {
            background-color: #0f172a;
            color: #e2e8f0;
            padding: 1.25rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
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

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white flex flex-col min-h-screen">

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

            <!-- Right: Back to Project List button -->
            <div class="flex items-center gap-2">
                <a href="{{ route('projects.index') }}" class="flex items-center space-x-1.5 text-xs font-bold text-slate-600 hover:text-indigo-600 bg-slate-100 hover:bg-indigo-50 px-3.5 py-2 rounded-full transition group border border-slate-200/60">
                    <svg class="w-3.5 h-3.5 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Project</span>
                </a>

                <!-- Hamburger (mobile only) -->
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

    <!-- PROJECT HERO HEADER -->
    <div class="bg-white border-b border-slate-200/80 py-10 sm:py-14 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            <!-- Badges & Status -->
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @php
                    $statusClasses = match($project->status) {
                        'Live' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                        'Beta' => 'bg-amber-100 text-amber-800 border-amber-200',
                        'Dalam Pengembangan' => 'bg-blue-100 text-blue-800 border-blue-200',
                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                    };
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $statusClasses }}">
                    ● {{ $project->status }}
                </span>

                <span class="text-slate-400 text-xs font-medium">
                    Dilihat {{ number_format($project->views_count) }}x
                </span>
            </div>

            <!-- Project Title -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-4">
                {{ $project->title }}
            </h1>

            <!-- Summary / Subtitle -->
            @if(!empty($project->summary))
                <p class="text-slate-600 text-base sm:text-lg leading-relaxed mb-6">
                    {{ $project->summary }}
                </p>
            @endif

            <!-- Tech Stack Pills -->
            @if(!empty($project->tech_stack) && is_array($project->tech_stack))
                <div class="flex flex-wrap gap-2 mb-8">
                    @foreach($project->tech_stack as $tech)
                        <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-3 py-1 rounded-lg border border-slate-200">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            @endif

            <!-- Call to Action Buttons -->
            <div class="flex flex-wrap items-center gap-4">
                @if(!empty($project->demo_url))
                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition duration-200">
                        <span>Coba Aplikasi / Live Demo</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                @endif

                @if(!empty($project->github_url))
                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-3 text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-300 rounded-xl shadow-sm transition duration-200">
                        <svg class="w-4 h-4 text-slate-900" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"></path>
                        </svg>
                        <span>Repositori GitHub</span>
                    </a>
                @endif
            </div>

        </div>
    </div>

    <!-- MAIN BODY CONTENT -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full">

        <!-- THUMBNAIL IMAGE SHOWCASE -->
        <div class="mb-10 rounded-2xl overflow-hidden shadow-xl border border-slate-200 bg-slate-900">
            <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}" class="w-full max-h-[500px] object-cover">
        </div>

        <!-- DYNAMIC BUILDER CONTENT -->
        @if(!empty($project->content) && is_array($project->content))
            <article class="bg-white rounded-2xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-8 mb-12">
                @foreach($project->content as $block)
                    @if(isset($block['type']))
                        @switch($block['type'])
                            @case('heading')
                                @if(($block['data']['level'] ?? 'h2') === 'h3')
                                    <h3 class="text-xl font-bold text-slate-900 pt-4 border-b border-slate-100 pb-2">
                                        {{ $block['data']['content'] ?? '' }}
                                    </h3>
                                @else
                                    <h2 class="text-2xl font-black text-slate-900 pt-4 border-b border-slate-100 pb-2">
                                        {{ $block['data']['content'] ?? '' }}
                                    </h2>
                                @endif
                                @break

                            @case('paragraph')
                                <div class="prose-content text-slate-700 leading-relaxed text-sm sm:text-base">
                                    {!! $block['data']['content'] ?? '' !!}
                                </div>
                                @break

                            @case('image')
                                @if(!empty($block['data']['url']))
                                    <figure class="my-6">
                                        <div class="rounded-xl overflow-hidden border border-slate-200 shadow-md">
                                            <img src="{{ filter_var($block['data']['url'], FILTER_VALIDATE_URL) ? $block['data']['url'] : asset('storage/' . $block['data']['url']) }}"
                                                alt="{{ $block['data']['alt'] ?? $project->title }}" class="w-full object-cover">
                                        </div>
                                        @if(!empty($block['data']['alt']))
                                            <figcaption class="text-center text-xs text-slate-500 mt-2">
                                                {{ $block['data']['alt'] }}
                                            </figcaption>
                                        @endif
                                    </figure>
                                @endif
                                @break

                            @case('quote')
                                <blockquote class="border-l-4 border-indigo-600 bg-indigo-50/60 p-5 rounded-r-xl my-6">
                                    <p class="text-slate-800 font-semibold italic text-sm sm:text-base">
                                        "{{ $block['data']['content'] ?? '' }}"
                                    </p>
                                    @if(!empty($block['data']['author']))
                                        <cite class="block text-xs font-bold text-indigo-600 mt-2 not-italic">
                                            — {{ $block['data']['author'] }}
                                        </cite>
                                    @endif
                                </blockquote>
                                @break
                        @endswitch
                    @endif
                @endforeach
            </article>
        @endif

        <!-- OTHER PROJECTS SECTION -->
        @if(isset($otherProjects) && $otherProjects->count() > 0)
            <div class="pt-8 border-t border-slate-200">
                <h3 class="text-xl font-extrabold text-slate-900 mb-6">Project Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($otherProjects as $other)
                        <a href="{{ route('projects.show', $other->slug) }}" class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                            <div class="aspect-video bg-slate-100 overflow-hidden">
                                <img src="{{ $other->thumbnail_url }}" alt="{{ $other->title }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition line-clamp-1">
                                    {{ $other->title }}
                                </h4>
                                <span class="text-[11px] font-semibold text-indigo-600 mt-1 inline-block">
                                    {{ $other->status }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
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
