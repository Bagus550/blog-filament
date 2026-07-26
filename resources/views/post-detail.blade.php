<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Magazine Layout</title>
  <!-- CDN Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts (Plus Jakarta Sans) -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

  <!-- 1. ANNOUNCEMENT BAR -->
  <div class="bg-gray-900 text-white text-xs py-2 px-4 flex justify-between items-center">
    <div class="flex items-center space-x-2 truncate">
      <span class="bg-red-600 text-white text-[10px] uppercase font-bold px-1.5 py-0.5 rounded">HOT</span>
      <span class="truncate">Apa Itu k8s-aibom? Pengertian, Cara Kerja, dan Contoh Use Case</span>
    </div>
    <div class="hidden md:block text-gray-400 shrink-0">
      26 Juli 2026
    </div>
  </div>

  <!-- 2. MAIN HEADER / NAVIGATION -->
  <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      <!-- Logo -->
      <a href="#" class="flex items-center space-x-2 font-extrabold text-2xl text-blue-600">
        <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-black">R</div>
        <span>rumahweb</span>
      </a>

      <!-- Navigation Links -->
      <nav class="hidden md:flex space-x-8 text-sm font-semibold text-gray-700">
        <a href="#" class="hover:text-blue-600 flex items-center">Tutorial <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></a>
        <a href="#" class="hover:text-blue-600 flex items-center">Digital Marketing <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></a>
        <a href="#" class="hover:text-blue-600 flex items-center">Web Development <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></a>
        <a href="#" class="hover:text-blue-600">Journal</a>
      </nav>

      <!-- Search Icon -->
      <button class="text-gray-500 hover:text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      </button>
    </div>
  </header>

  <!-- CONTAINER UTAMA -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-12">

    <!-- 3. FEATURED HERO SECTION (ASIMETRIS 3 KOLOM) -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-6">
      
      <!-- Card 1: Featured Utama (Lg: 5/12) -->
      <div class="lg:col-span-5 group cursor-pointer">
        <div class="overflow-hidden rounded-xl mb-4 aspect-[4/3]">
          <img src="https://picsum.photos/600/450?random=1" alt="Featured 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
        </div>
        <h2 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition leading-snug">
          Cara Menentukan Produk Etsy Agar Laku Tanpa Perang Harga
        </h2>
        <p class="text-gray-500 text-sm mt-2 line-clamp-2">
          Langkah-langkah strategis berbasis data untuk menemukan produk bernilai tinggi di marketplace Etsy...
        </p>
      </div>

      <!-- Card 2: Highlight Quote Box / Top Stories (Lg: 3/12) -->
      <div class="lg:col-span-3 bg-blue-900 text-white p-6 rounded-xl relative flex flex-col justify-between overflow-hidden">
        <span class="absolute -top-3 -right-3 bg-yellow-400 text-gray-900 font-extrabold text-[10px] tracking-wider px-6 py-2 rotate-45">TOP STORIES</span>
        <div>
          <div class="text-blue-300 text-5xl font-serif mb-2">“</div>
          <h3 class="text-xl font-bold leading-tight mb-4">
            Apa Itu k8s-aibom? Pengertian, Cara Kerja, dan Contoh Use Case
          </h3>
          <p class="text-blue-200 text-xs line-clamp-4">
            Semakin banyak Anda menjalankan AI di Kubernetes, semakin besar pula tantangan dalam mengelola workload yang aktif di dalam cluster...
          </p>
        </div>
        <div class="text-xs text-blue-300 mt-6">July 24, 2026</div>
      </div>

      <!-- Card 3: Secondary Highlight (Lg: 4/12) -->
      <div class="lg:col-span-4 group cursor-pointer flex flex-col justify-between">
        <div>
          <div class="overflow-hidden rounded-xl mb-4 aspect-[16/9]">
            <img src="https://picsum.photos/600/350?random=2" alt="Featured 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          </div>
          <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">SEO</span>
          <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition mt-1 leading-snug">
            Cara Membedakan Trafik Bot dan Pengunjung Asli di Website
          </h3>
        </div>
        <div class="text-xs text-gray-400 mt-4 flex items-center space-x-2">
          <span>Adellia Luluk</span>
          <span>•</span>
          <span>July 24, 2026</span>
        </div>
      </div>

    </section>

    <hr class="border-gray-200">

    <!-- 4. MAIN CONTENT & SIDEBAR SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      
      <!-- KANAN ATAS / MAIN CONTENT AREA (70% = Lg: 8/12) -->
      <div class="lg:col-span-8 space-y-10">
        
        <!-- SECTION: TUTORIAL -->
        <section>
          <!-- Header Section -->
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-extrabold text-gray-900">Tutorial</h2>
            <a href="#" class="text-sm font-bold text-blue-600 hover:underline flex items-center">View All &rarr;</a>
          </div>

          <!-- 3-Column Grid Artikel -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Article Item 1 -->
            <article class="group cursor-pointer">
              <div class="overflow-hidden rounded-lg mb-3 aspect-[16/10]">
                <img src="https://picsum.photos/400/250?random=3" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition">
              </div>
              <div class="text-xs text-gray-400 mb-1">July 15, 2026</div>
              <h3 class="font-bold text-gray-900 text-sm group-hover:text-blue-600 leading-snug mb-2">
                Gibiru Search Engine: Cara Kerja dan Kapan Sebaiknya Digunakan
              </h3>
              <p class="text-xs text-gray-500 line-clamp-3">
                Google memang menjadi mesin pencari utama, namun Gibiru menawarkan privasi lebih baik...
              </p>
            </article>

            <!-- Article Item 2 -->
            <article class="group cursor-pointer">
              <div class="overflow-hidden rounded-lg mb-3 aspect-[16/10]">
                <img src="https://picsum.photos/400/250?random=4" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition">
              </div>
              <div class="text-xs text-gray-400 mb-1">July 14, 2026</div>
              <h3 class="font-bold text-gray-900 text-sm group-hover:text-blue-600 leading-snug mb-2">
                Proxmox: Pengertian, Fungsi, Fitur, hingga Kelebihannya
              </h3>
              <p class="text-xs text-gray-500 line-clamp-3">
                Kebutuhan menjalankan banyak server dalam satu perangkat fisik semakin mudah dengan Proxmox...
              </p>
            </article>

            <!-- Article Item 3 -->
            <article class="group cursor-pointer">
              <div class="overflow-hidden rounded-lg mb-3 aspect-[16/10]">
                <img src="https://picsum.photos/400/250?random=5" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition">
              </div>
              <div class="text-xs text-gray-400 mb-1">July 13, 2026</div>
              <h3 class="font-bold text-gray-900 text-sm group-hover:text-blue-600 leading-snug mb-2">
                Cherokee Web Server: Pengertian, Fitur, dan Kapan Dipakai
              </h3>
              <p class="text-xs text-gray-500 line-clamp-3">
                Saat membangun sebuah aplikasi, memilih web server yang ringan dan cepat adalah kunci utama...
              </p>
            </article>

          </div>
        </section>

      </div>

      <!-- SIDEBAR AREA (30% = Lg: 4/12) -->
      <aside class="lg:col-span-4 space-y-6">
        
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
          <h2 class="text-xl font-extrabold text-gray-900 mb-6">Latest Post</h2>
          
          <div class="space-y-4">
            
            <!-- Compact Sidebar Item 1 -->
            <a href="#" class="flex items-center space-x-3 group">
              <img src="https://picsum.photos/100/100?random=6" class="w-16 h-16 rounded-lg object-cover shrink-0 group-hover:opacity-80 transition">
              <div>
                <h4 class="text-xs font-bold text-gray-900 group-hover:text-blue-600 leading-snug line-clamp-2">
                  Cara Riset Produk Etsy agar Laku Tanpa Perang Harga
                </h4>
                <span class="text-[10px] text-gray-400 block mt-1">July 24, 2026</span>
              </div>
            </a>

            <!-- Compact Sidebar Item 2 -->
            <a href="#" class="flex items-center space-x-3 group">
              <img src="https://picsum.photos/100/100?random=7" class="w-16 h-16 rounded-lg object-cover shrink-0 group-hover:opacity-80 transition">
              <div>
                <h4 class="text-xs font-bold text-gray-900 group-hover:text-blue-600 leading-snug line-clamp-2">
                  Cara Membedakan Trafik Bot dan Pengunjung Asli di Website
                </h4>
                <span class="text-[10px] text-gray-400 block mt-1">July 24, 2026</span>
              </div>
            </a>

            <!-- Compact Sidebar Item 3 -->
            <a href="#" class="flex items-center space-x-3 group">
              <img src="https://picsum.photos/100/100?random=8" class="w-16 h-16 rounded-lg object-cover shrink-0 group-hover:opacity-80 transition">
              <div>
                <h4 class="text-xs font-bold text-gray-900 group-hover:text-blue-600 leading-snug line-clamp-2">
                  NVIDIA NemoClaw: Pengertian, Cara Kerja, dan Kapan Digunakan
                </h4>
                <span class="text-[10px] text-gray-400 block mt-1">July 23, 2026</span>
              </div>
            </a>

            <!-- Compact Sidebar Item 4 -->
            <a href="#" class="flex items-center space-x-3 group">
              <img src="https://picsum.photos/100/100?random=9" class="w-16 h-16 rounded-lg object-cover shrink-0 group-hover:opacity-80 transition">
              <div>
                <h4 class="text-xs font-bold text-gray-900 group-hover:text-blue-600 leading-snug line-clamp-2">
                  Infrastruktur Agentic AI: Panduan Membangun Sistem AI Modern
                </h4>
                <span class="text-[10px] text-gray-400 block mt-1">July 23, 2026</span>
              </div>
            </a>

          </div>
        </div>

      </aside>

    </div>

  </main>

  <!-- FLOATING THEME SWITCHER (Kiri Bawah) -->
  <div class="fixed bottom-4 left-4 bg-white border border-gray-200 rounded-full p-1 shadow-lg flex text-xs font-medium z-50">
    <button class="px-3 py-1 bg-gray-100 text-gray-900 rounded-full font-bold">Light</button>
    <button class="px-3 py-1 text-gray-500 hover:text-gray-900">Dark</button>
  </div>

</body>
</html>