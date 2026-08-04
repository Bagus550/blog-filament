<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - BagusdevBlog</title>
    <meta name="description" content="{{ $post->excerpt }}">

    <!-- Open Graph / Facebook / WhatsApp / Telegram -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta property="og:image" content="{{ $post->thumbnail_url }}">
    <meta property="og:site_name" content="BagusdevBlog">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->excerpt }}">
    <meta name="twitter:image" content="{{ $post->thumbnail_url }}">

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

        /* ==============================================
           PROSE CONTENT — Full styling for Filament
           RichEditor HTML output (tables, blockquotes,
           headings, links, etc.)
           ============================================== */

        /* --- Base text --- */
        .prose-content {
            font-size: 1.0625rem;
            line-height: 1.85;
            color: #334155;
        }

        .prose-content > *:first-child {
            margin-top: 0;
        }

        .prose-content p {
            margin-bottom: 1.25rem;
            line-height: 1.85;
            color: #334155;
        }

        /* --- Headings (from RichEditor toolbar) --- */
        .prose-content h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.3;
            letter-spacing: -0.025em;
        }

        .prose-content h2 {
            font-size: 1.625rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 2.25rem;
            margin-bottom: 0.875rem;
            line-height: 1.35;
            letter-spacing: -0.02em;
        }

        .prose-content h3 {
            font-size: 1.375rem;
            font-weight: 700;
            color: #1e293b;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .prose-content h4 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
            margin-top: 1.75rem;
            margin-bottom: 0.625rem;
            line-height: 1.45;
        }

        .prose-content h5,
        .prose-content h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #334155;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        /* --- Links --- */
        .prose-content a {
            color: #4f46e5;
            text-decoration: underline;
            text-underline-offset: 3px;
            text-decoration-color: #a5b4fc;
            font-weight: 500;
            transition: color 0.15s, text-decoration-color 0.15s;
        }

        .prose-content a:hover {
            color: #3730a3;
            text-decoration-color: #4f46e5;
        }

        /* --- Bold / Italic / Strikethrough --- */
        .prose-content strong {
            font-weight: 700;
            color: #0f172a;
        }

        .prose-content em {
            font-style: italic;
        }

        .prose-content s,
        .prose-content del {
            text-decoration: line-through;
            color: #94a3b8;
        }

        /* --- Lists --- */
        .prose-content ul {
            list-style-type: disc !important;
            padding-left: 1.625rem !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.25rem !important;
        }

        .prose-content ol {
            list-style-type: decimal !important;
            padding-left: 1.625rem !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.25rem !important;
        }

        .prose-content li {
            margin-bottom: 0.5rem !important;
            line-height: 1.75;
            color: #334155;
        }

        .prose-content li > ul,
        .prose-content li > ol {
            margin-top: 0.375rem !important;
            margin-bottom: 0.375rem !important;
        }

        .prose-content ul ul {
            list-style-type: circle !important;
        }

        .prose-content ul ul ul {
            list-style-type: square !important;
        }

        /* --- Blockquote (from RichEditor) --- */
        .prose-content blockquote {
            border-left: 4px solid #6366f1;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 100%);
            border-radius: 0 0.75rem 0.75rem 0;
            padding: 1.25rem 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #475569;
            position: relative;
        }

        .prose-content blockquote::before {
            content: '\201C';
            font-family: Georgia, serif;
            font-size: 3.5rem;
            color: #c7d2fe;
            position: absolute;
            top: -0.25rem;
            left: 0.5rem;
            line-height: 1;
            pointer-events: none;
        }

        .prose-content blockquote p {
            margin-bottom: 0.5rem;
            color: #475569;
        }

        .prose-content blockquote p:last-child {
            margin-bottom: 0;
        }

        /* --- Tables --- */
        .prose-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            font-size: 0.9375rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .prose-content thead {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .prose-content thead th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 700;
            font-size: 0.8125rem;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 1px solid #cbd5e1;
        }

        .prose-content tbody td {
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            color: #475569;
            vertical-align: top;
        }

        .prose-content tbody tr:last-child td {
            border-bottom: none;
        }

        .prose-content tbody tr:hover {
            background-color: #f8fafc;
        }

        .prose-content tbody tr:nth-child(even) {
            background-color: #fafbfd;
        }

        .prose-content tbody tr:nth-child(even):hover {
            background-color: #f1f5f9;
        }

        /* --- Horizontal Rule --- */
        .prose-content hr {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, #cbd5e1 20%, #cbd5e1 80%, transparent);
            margin: 2rem 0;
        }

        /* --- Inline Code --- */
        .prose-content code {
            background-color: #f1f5f9;
            color: #4f46e5;
            padding: 0.2rem 0.45rem;
            border-radius: 0.375rem;
            font-family: 'JetBrains Mono', 'Fira Code', 'Cascadia Code', monospace;
            font-size: 0.85em;
            border: 1px solid #e2e8f0;
            font-weight: 500;
        }

        /* --- Code Blocks --- */
        .prose-content pre {
            background-color: #0f172a;
            color: #e2e8f0;
            padding: 1.25rem 1.5rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            border: 1px solid #1e293b;
            line-height: 1.7;
        }

        .prose-content pre code {
            background-color: transparent;
            color: inherit;
            padding: 0;
            border-radius: 0;
            font-size: 0.875em;
            border: none;
            font-weight: 400;
        }

        /* --- Images inside RichEditor content --- */
        .prose-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.75rem;
            margin: 1.25rem 0;
            box-shadow: 0 1px 3px rgb(0 0 0 / 0.08);
        }

        /* --- Subscript / Superscript --- */
        .prose-content sub {
            font-size: 0.75em;
            vertical-align: sub;
        }

        .prose-content sup {
            font-size: 0.75em;
            vertical-align: super;
        }

        /* --- Responsive table scroll on mobile --- */
        @media (max-width: 640px) {
            .prose-content table {
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                white-space: nowrap;
            }

            .prose-content blockquote {
                padding: 1rem 1.25rem;
            }

            .prose-content h1 { font-size: 1.625rem; }
            .prose-content h2 { font-size: 1.375rem; }
            .prose-content h3 { font-size: 1.1875rem; }
        }

        /* Mobile menu transition */
        #mobile-menu-show {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        #mobile-menu-show.hidden {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }
        #mobile-menu-show.open {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- READING PROGRESS BAR -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-indigo-600 z-[99] transition-all duration-100" style="width: 0%"></div>

    <!-- MAIN HEADER -->
    <header class="bg-white/90 border-b border-slate-100 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-3">
            <!-- Branding Logo -->
            <a href="{{ route('blog.index') }}" class="flex items-center group shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="BagusdevBlog Logo" class="h-9 w-auto group-hover:scale-[1.02] transition duration-200">
            </a>

            <!-- Navigation Bar (desktop) -->
            <nav class="hidden md:flex flex-1 justify-center items-center space-x-6 text-sm font-semibold text-slate-600">
                <a href="{{ route('blog.index') }}" class="hover:text-indigo-600 transition duration-200 relative group">
                    Beranda
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('projects.index') }}" class="hover:text-indigo-600 transition duration-200 relative group">
                    Project & Aplikasi
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>

                @if(isset($categories))
                @foreach($categories as $categoryName)
                <a href="{{ route('blog.index', ['category' => $categoryName]) }}"
                    class="hover:text-indigo-600 transition duration-200 relative group {{ $post->category === $categoryName ? 'text-indigo-600 font-bold' : '' }}">
                    {{ $categoryName }}
                    <span class="absolute bottom-0 left-0 {{ $post->category === $categoryName ? 'w-full' : 'w-0' }} h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
                </a>
                @endforeach
                @endif
            </nav>

            <!-- Right: Back button + Hamburger -->
            <div class="flex items-center gap-2">
                <a href="{{ route('blog.index') }}" class="flex items-center space-x-1.5 text-xs font-bold text-slate-600 hover:text-indigo-600 bg-slate-100 hover:bg-indigo-50 px-3 py-2 rounded-full transition group border border-slate-200/60">
                    <svg class="w-3.5 h-3.5 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="hidden sm:inline">Beranda</span>
                </a>

                <!-- Hamburger (mobile only) -->
                <button id="hamburger-btn-show" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition" aria-label="Toggle menu">
                    <svg id="icon-open-show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="icon-close-show" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu-show" class="hidden md:hidden bg-white border-t border-slate-100 px-4 pb-4 pt-2 space-y-1">
            <a href="{{ route('blog.index') }}"
                class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
                Beranda
            </a>
            @if(isset($categories))
            @foreach($categories as $categoryName)
            <a href="{{ route('blog.index', ['category' => $categoryName]) }}"
                class="block py-2.5 px-3 rounded-xl text-sm font-semibold {{ $post->category === $categoryName ? 'text-indigo-600 bg-indigo-50' : 'text-slate-700 hover:bg-slate-50' }} transition">
                {{ $categoryName }}
            </a>
            @endforeach
            @endif
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-16">

        <!-- ARTICLE HEADER -->
        <header class="mb-8 sm:mb-10">
            <!-- Meta Category Badge -->
            <a href="{{ route('blog.index', ['category' => $post->category]) }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-indigo-50 text-indigo-700 mb-4 uppercase tracking-wider hover:bg-indigo-100 transition">
                {{ $post->category }}
            </a>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight mb-5 sm:mb-6">
                {{ $post->title }}
            </h1>

            <!-- Meta Row: Author + Date/Views/Share -->
            <div class="flex flex-col gap-3 border-y border-slate-100 py-4">
                <!-- Author Info -->
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white border border-slate-100 shadow-sm flex items-center justify-center overflow-hidden shrink-0">
                        <img src="{{ asset('images/logo.png') }}" alt="Bagusdev Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <span class="text-sm font-bold text-slate-900 block">Bagusdev</span>
                        <span class="text-xs text-slate-500">Full Stack Developer</span>
                    </div>
                </div>

                <!-- Date, Views & Share -->
                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-xs text-slate-500 font-medium">
                    <span>{{ $post->created_at->format('d M Y') }}</span>
                    <span class="text-slate-300">•</span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ number_format($post->views_count ?? 0) }} Dibaca
                    </span>
                    <span class="text-slate-300">•</span>
                    <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan artikel berhasil disalin!')"
                        class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 text-slate-600 rounded-full transition font-semibold text-[11px] border border-slate-200/60 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        <span>Salin Tautan</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- MAIN POST CONTENT -->
        <article class="prose-content min-h-[400px]">
            @if($post->content && is_array($post->content))
            @foreach ($post->content as $block)
            @if ($block['type'] === 'heading')
            @if (($block['data']['level'] ?? 'h2') === 'h3')
            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mt-8 mb-4 tracking-tight leading-snug">
                {{ $block['data']['content'] }}
            </h3>
            @else
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-10 mb-5 tracking-tight leading-snug">
                {{ $block['data']['content'] }}
            </h2>
            @endif
            @elseif ($block['type'] === 'paragraph')
            <div class="mb-6">
                {!! $block['data']['content'] !!}
            </div>
            @elseif ($block['type'] === 'image')
            <figure class="my-6 sm:my-8">
                <div class="overflow-hidden rounded-xl sm:rounded-2xl shadow-md border border-slate-100">
                    <img src="{{ filter_var($block['data']['url'], FILTER_VALIDATE_URL) ? $block['data']['url'] : '/storage/' . $block['data']['url'] }}"
                        alt="{{ $block['data']['alt'] ?? '' }}"
                        class="w-full object-cover">
                </div>
                @if(!empty($block['data']['alt']))
                <figcaption class="text-center text-xs text-slate-500 mt-3 italic">
                    {{ $block['data']['alt'] }}
                </figcaption>
                @endif
            </figure>
            @elseif ($block['type'] === 'grid_images')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 my-6 sm:my-8 items-start">

                {{-- ITEM 1: Gambar Kiri + Caption --}}
                @if(!empty($block['data']['image_left']))
                <div class="flex flex-col">
                    <div class="overflow-hidden rounded-xl sm:rounded-2xl shadow-md border border-slate-100 aspect-[4/3] w-full">
                        <img src="{{ filter_var($block['data']['image_left'], FILTER_VALIDATE_URL) ? $block['data']['image_left'] : '/storage/' . $block['data']['image_left'] }}"
                            alt="{{ $block['data']['caption_left'] ?? '' }}"
                            class="w-full h-full object-cover">
                    </div>
                    @if(!empty($block['data']['caption_left']))
                    <p class="text-center text-xs text-slate-500 mt-2.5 italic">
                        {{ $block['data']['caption_left'] }}
                    </p>
                    @endif
                </div>
                @endif

                {{-- ITEM 2: Gambar Kanan + Caption --}}
                @if(!empty($block['data']['image_right']))
                <div class="flex flex-col">
                    <div class="overflow-hidden rounded-xl sm:rounded-2xl shadow-md border border-slate-100 aspect-[4/3] w-full">
                        <img src="{{ filter_var($block['data']['image_right'], FILTER_VALIDATE_URL) ? $block['data']['image_right'] : '/storage/' . $block['data']['image_right'] }}"
                            alt="{{ $block['data']['caption_right'] ?? '' }}"
                            class="w-full h-full object-cover">
                    </div>
                    @if(!empty($block['data']['caption_right']))
                    <p class="text-center text-xs text-slate-500 mt-2.5 italic">
                        {{ $block['data']['caption_right'] }}
                    </p>
                    @endif
                </div>
                @endif

            </div>
            @elseif ($block['type'] === 'quote')
            <blockquote class="border-l-4 border-indigo-600 bg-indigo-50/40 rounded-r-xl sm:rounded-r-2xl p-4 sm:p-6 my-6 sm:my-8 italic text-slate-800 text-base sm:text-lg relative">
                <span class="text-indigo-200 text-6xl sm:text-7xl font-serif absolute -top-2 left-2 pointer-events-none select-none leading-none">"</span>
                <div class="relative z-10">
                    <p class="leading-relaxed mb-0">"{{ $block['data']['content'] }}"</p>
                    @if(!empty($block['data']['author']))
                    <cite class="block text-xs font-bold text-indigo-600 mt-3 not-italic">
                        — {{ $block['data']['author'] }}
                    </cite>
                    @endif
                </div>
            </blockquote>
            @endif
            @endforeach
            @else
            <p class="text-slate-500 italic">Konten artikel kosong atau tidak terformat dengan benar.</p>
            @endif
        </article>

        <!-- AUTHOR BIO FOOTER -->
        <div class="mt-12 sm:mt-16 p-5 sm:p-8 bg-slate-100 rounded-2xl sm:rounded-3xl border border-slate-200/60 flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-center overflow-hidden shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Bagusdev Logo" class="w-full h-full object-contain">
            </div>
            <div class="text-center sm:text-left">
                <h4 class="text-base sm:text-lg font-bold text-slate-900">Ditulis oleh Bagusdev</h4>
                <p class="text-sm text-slate-600 mt-1 leading-relaxed">
                    Seorang antusias teknologi dan pengembang web. Membagikan wawasan mendalam seputar dunia pengetahuan, fakta unik, serta perkembangan sains dan teknologi.
                </p>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-8 sm:mt-0 py-8 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <div class="flex justify-center items-center">
                <img src="{{ asset('images/logo.png') }}" alt="BagusdevBlog Logo" class="h-8 w-auto">
            </div>
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} BagusdevBlog. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- SCROLL PROGRESS INDICATOR SCRIPT -->
    <script>
        // Progress bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progress-bar').style.width = scrolled + '%';
        });

        // Mobile menu
        const btn = document.getElementById('hamburger-btn-show');
        const menu = document.getElementById('mobile-menu-show');
        const iconOpen = document.getElementById('icon-open-show');
        const iconClose = document.getElementById('icon-close-show');
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