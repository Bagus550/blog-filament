<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bagusdev',
            'email' => 'admin@bagus.dev',
            'password' => bcrypt('password'),
        ]);

        $posts = [
            [
                'title' => 'Membangun RESTful API Modern dengan Laravel 11 dan Sanctum',
                'slug' => 'membangun-restful-api-modern-dengan-laravel-11-dan-sanctum',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>RESTful API adalah tulang punggung dari aplikasi modern masa kini. Dengan rilisnya Laravel 11, membuat API berkinerja tinggi kini menjadi lebih sederhana dan efisien berkat struktur aplikasi yang dirampingkan.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Kenapa Laravel 11?',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Laravel 11 mereduksi konfigurasi boilerplate secara masif. Folder <code>config</code> default kini disembunyikan dan routing API dipisahkan ke dalam instalasi tersendiri via perintah artisan. Mari kita lihat cara tercepat mengamankan endpoint menggunakan Laravel Sanctum.</p>'
                        ]
                    ],
                    [
                        'type' => 'quote',
                        'data' => [
                            'content' => 'Keamanan dan performa adalah fondasi utama dari setiap API yang andal di industri.',
                            'author' => 'Taylor Otwell'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Langkah Instalasi Sanctum',
                            'level' => 'h3'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Cukup jalankan perintah <code>php artisan install:api</code> untuk secara otomatis menginstal Sanctum, menerbitkan file migrasi token personal, serta mengonfigurasi middleware API. Pastikan Anda mengaktifkan trait <code>HasApiTokens</code> pada model User Anda.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Panduan Lengkap Tailwind CSS: Menguasai Responsive Grid & Flexbox',
                'slug' => 'panduan-lengkap-tailwind-css-menguasai-responsive-grid-flexbox',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Tailwind CSS telah mengubah cara developer membangun antarmuka web. Tidak perlu lagi menulis stylesheet ribet; cukup gunakan utility classes langsung pada file HTML/Blade Anda.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Memahami CSS Grid vs Flexbox',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Flexbox sangat cocok untuk layout satu dimensi (seperti baris navigasi atau daftar item sejajar). Sedangkan CSS Grid dirancang untuk tata letak dua dimensi yang lebih kompleks (seperti layout majalah atau dasbor admin).</p>'
                        ]
                    ],
                    [
                        'type' => 'quote',
                        'data' => [
                            'content' => 'Desain responsif bukan lagi fitur opsional, melainkan kebutuhan wajib bagi setiap aplikasi web modern.',
                            'author' => 'Steve Schoger'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Mengapa Anda Harus Menggunakan Filament PHP untuk Admin Panel',
                'slug' => 'mengapa-anda-harus-menggunakan-filament-php-untuk-admin-panel',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Membuat admin panel dari nol memakan waktu berhari-hari bahkan berminggu-minggu. Filament PHP hadir sebagai solusi elegan berbasis TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) untuk membangun CMS super canggih dalam hitungan menit.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Fitur Unggulan Filament v3',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Filament tidak hanya menyediakan form input dan tabel data dasar. Versi terbaru memiliki fitur Block Builder kustom, skema multi-kolom yang dinamis, widget grafik interaktif, dan sistem otorisasi peran (Role-Based Access Control) yang sangat rapi.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Dockerisasi Aplikasi Laravel untuk Staging dan Produksi',
                'slug' => 'dockerisasi-aplikasi-laravel-untuk-staging-dan-produksi',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Pernahkah Anda mendengar keluhan \"Tapi di lokal saya jalan\"? Docker memecahkan masalah ini dengan membungkus aplikasi Laravel beserta PHP, Nginx, dan MySQL ke dalam container yang identik di mana pun ia dijalankan.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Konfigurasi Docker Compose Sederhana',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Dengan mendefinisikan file <code>docker-compose.yml</code>, Anda dapat menjalankan seluruh service yang dibutuhkan hanya dengan satu perintah: <code>docker-compose up -d</code>. Ini sangat menghemat waktu onboarding developer baru.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Optimasi Query Database di Eloquent ORM Laravel',
                'slug' => 'optimasi-query-database-di-eloquent-orm-laravel',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Eloquent adalah ORM yang sangat user-friendly, tetapi di balik kemudahannya, terdapat jebakan performa seperti query N+1 yang dapat memperlambat loading website Anda secara signifikan saat data membesar.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Mengatasi Query N+1 dengan Eager Loading',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Gunakan method <code>with()</code> untuk memuat relasi dari awal. Misalnya, dibanding memanggil relasi user di dalam loop postingan, panggillah <code>Post::with(\'user\')->get()</code> untuk memangkas ratusan query menjadi hanya dua query saja.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Mengenal Clean Architecture dalam Pengembangan Software Modern',
                'slug' => 'mengenal-clean-architecture-dalam-pengembangan-software-modern',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Clean Architecture menempatkan logika bisnis inti di pusat aplikasi, terisolasi penuh dari framework, database, dan UI. Pendekatan ini membuat kode Anda lebih mudah diuji (testable) dan dirawat dalam jangka panjang.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Prinsip Ketergantungan (Dependency Rule)',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Aturan utama Clean Architecture menyatakan bahwa dependensi source code hanya boleh mengarah ke dalam (ke arah logika bisnis). Logika bisnis tidak boleh mengetahui apa database yang digunakan, apakah SQL atau MongoDB.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Tips Meningkatkan Core Web Vitals untuk SEO Website Anda',
                'slug' => 'tips-meningkatkan-core-web-vitals-untuk-seo-website-anda',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Core Web Vitals kini menjadi salah satu faktor penentu peringkat pencarian Google. Website yang lambat dan bergeser saat loading akan ditinggalkan oleh pengunjung dan dinilai buruk oleh robot perayap.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Fokus pada LCP, FID, dan CLS',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Optimalkan Largest Contentful Paint (LCP) dengan mengompres gambar dan menggunakan format modern seperti WebP. Kurangi Cumulative Layout Shift (CLS) dengan selalu memberikan dimensi lebar dan tinggi yang pasti pada tag image Anda.</p>'
                        ]
                    ]
                ]
            ]
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'content' => $post['content'],
            ]);
        }
    }
}

