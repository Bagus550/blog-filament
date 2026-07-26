<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - BagusdevBlog</title>

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
        /* Custom styles for rich editor output inside paragraph blocks */
        .prose-content p {
            margin-bottom: 1.25rem;
            line-height: 1.8;
            color: #374151; /* gray-700 */
        }
        .prose-content code {
            background-color: #f3f4f6;
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
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        .prose-content pre code {
            background-color: transparent;
            color: inherit;
            padding: 0;
            border-radius: 0;
            font-size: 0.9em;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- READING PROGRESS BAR -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-indigo-600 z-[99] transition-all duration-100" style="width: 0%"></div>

    <!-- MAIN HEADER -->
    <header class="bg-white/95 border-b border-gray-100 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Branding -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center font-black text-xl shadow-md shadow-indigo-200 group-hover:scale-105 transition">
                    B
                </div>
                <span class="text-xl font-extrabold tracking-tight text-gray-900">
                    Bagusdev<span class="text-indigo-600">Blog</span>
                </span>
            </a>

            <!-- Back to Home Button -->
            <a href="/" class="flex items-center space-x-2 text-sm font-semibold text-gray-600 hover:text-indigo-600 transition group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-10 lg:py-16">

        <!-- ARTICLE HEADER -->
        <header class="mb-10 text-center sm:text-left">
            <!-- Meta Tag -->
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 mb-4">
                Tutorial
            </span>
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                {{ $post->title }}
            </h1>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-y border-gray-100 py-4 gap-4">
                <!-- Author Info -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                        BD
                    </div>
                    <div>
                        <span class="text-sm font-bold text-gray-900 block">Bagusdev</span>
                        <span class="text-xs text-gray-500">Full Stack Developer</span>
                    </div>
                </div>

                <!-- Date & Social Share -->
                <div class="flex items-center space-x-4 text-xs text-gray-500">
                    <span>{{ $post->created_at->format('d M Y') }}</span>
                    <span>•</span>
                    <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link berhasil disalin!')" 
                        class="flex items-center space-x-1 hover:text-indigo-600 transition font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 10.742l4.885 2.502m0 0l4.885-2.502m-4.885 2.502v5.792M12 14a3 3 0 110-6 3 3 0 010 6z"></path>
                        </svg>
                        <span>Bagikan</span>
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
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-8 mb-4 tracking-tight leading-snug">
                                {{ $block['data']['content'] }}
                            </h3>
                        @else
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-10 mb-5 tracking-tight leading-snug">
                                {{ $block['data']['content'] }}
                            </h2>
                        @endif
                    @elseif ($block['type'] === 'paragraph')
                        <div class="mb-6">
                            {!! $block['data']['content'] !!}
                        </div>
                    @elseif ($block['type'] === 'image')
                        <figure class="my-8">
                            <div class="overflow-hidden rounded-2xl shadow-md border border-gray-100">
                                <img src="{{ filter_var($block['data']['url'], FILTER_VALIDATE_URL) ? $block['data']['url'] : Storage::url($block['data']['url']) }}" 
                                    alt="{{ $block['data']['alt'] ?? '' }}" 
                                    class="w-full object-cover">
                            </div>
                            @if(!empty($block['data']['alt']))
                                <figcaption class="text-center text-xs text-gray-500 mt-3 italic">
                                    {{ $block['data']['alt'] }}
                                </figcaption>
                            @endif
                        </figure>
                    @elseif ($block['type'] === 'quote')
                        <blockquote class="border-l-4 border-indigo-600 bg-indigo-50/40 rounded-r-2xl p-6 my-8 italic text-gray-800 text-base sm:text-lg relative">
                            <span class="text-indigo-200 text-7xl font-serif absolute -top-2 left-2 pointer-events-none select-none leading-none">“</span>
                            <div class="relative z-10">
                                <p class="leading-relaxed mb-0">“{{ $block['data']['content'] }}”</p>
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
                <p class="text-gray-500 italic">Konten artikel kosong atau tidak terformat dengan benar.</p>
            @endif
        </article>

        <!-- AUTHOR BIO FOOTER -->
        <div class="mt-16 p-6 sm:p-8 bg-gray-100 rounded-3xl border border-gray-200/50 flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
            <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black text-2xl shrink-0 shadow-md">
                B
            </div>
            <div class="text-center sm:text-left">
                <h4 class="text-lg font-bold text-gray-900">Ditulis oleh Bagusdev</h4>
                <p class="text-sm text-gray-600 mt-1 leading-relaxed">
                    Seorang antusias teknologi dan pengembang web. Membagikan wawasan mendalam seputar Laravel, JavaScript, desain sistem database, dan tren rekayasa perangkat lunak modern.
                </p>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <div class="flex justify-center items-center space-x-2 font-extrabold text-lg text-gray-900">
                <div class="w-6 h-6 bg-indigo-600 text-white rounded-md flex items-center justify-center font-black text-xs">B</div>
                <span>Bagusdev<span class="text-indigo-600">Blog</span></span>
            </div>
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} BagusdevBlog. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- SCROLL PROGRESS INDICATOR SCRIPT -->
    <script>
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progress-bar').style.width = scrolled + '%';
        });
    </script>
</body>

</html>
