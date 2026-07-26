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
                'category' => 'Teknologi',
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
                    ]
                ]
            ],
            [
                'title' => 'Panduan Lengkap Tailwind CSS: Menguasai Responsive Grid & Flexbox',
                'slug' => 'panduan-lengkap-tailwind-css-menguasai-responsive-grid-flexbox',
                'category' => 'Teknologi',
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
                    ]
                ]
            ],
            [
                'title' => 'Mengapa Anda Harus Menggunakan Filament PHP untuk Admin Panel',
                'slug' => 'mengapa-anda-harus-menggunakan-filament-php-untuk-admin-panel',
                'category' => 'Teknologi',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Membuat admin panel dari nol memakan waktu berhari-hari bahkan berminggu-minggu. Filament PHP hadir sebagai solusi elegan berbasis TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) untuk membangun CMS super canggih dalam hitungan menit.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => '5 Tips Menjaga Work-Life Balance untuk Pekerja Kreatif',
                'slug' => '5-tips-menjaga-work-life-balance-untuk-pekerja-kreatif',
                'category' => 'Gaya Hidup',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Di era digital saat ini, batasan antara pekerjaan dan kehidupan pribadi seringkali kabur, terutama bagi pekerja kreatif yang bekerja dari rumah (WFH) atau sebagai freelancer.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Tetapkan Jam Kerja yang Tegas',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Meskipun Anda memiliki waktu yang fleksibel, menentukan kapan Anda mulai bekerja dan kapan Anda berhenti sangat krusial untuk mencegah kelelahan mental (burnout).</p>'
                        ]
                    ],
                    [
                        'type' => 'quote',
                        'data' => [
                            'content' => 'Istirahat bukanlah tanda kemalasan, melainkan bahan bakar untuk kreativitas berikutnya.',
                            'author' => 'Arianna Huffington'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Cara Memulai Bisnis Digital dari Rumah dengan Modal Kecil',
                'slug' => 'cara-memulai-bisnis-digital-dari-rumah-dengan-modal-kecil',
                'category' => 'Bisnis',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Teknologi internet membuka peluang bisnis yang sangat luas bagi siapa saja. Kini, Anda bisa menjual produk fisik maupun digital langsung dari kamar tidur Anda.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Langkah Pertama: Temukan Niche Pasar',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Jangan mencoba menjual segalanya kepada semua orang. Pilih satu kategori khusus yang Anda kuasai, misalnya aksesoris meja kerja minimalis atau template desain digital.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Panduan Menulis Kreatif untuk Pemula: Menemukan Suara Unik Anda',
                'slug' => 'panduan-menulis-kreatif-untuk-pemula-menemukan-suara-unik-anda',
                'category' => 'Kreatif',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Menulis bukan hanya tentang merangkai tata bahasa yang benar, melainkan menyalurkan ide dan emosi ke dalam bentuk tulisan yang hidup dan membekas di hati pembaca.</p>'
                        ]
                    ],
                    [
                        'type' => 'heading',
                        'data' => [
                            'content' => 'Mulai dengan Menulis Setiap Hari',
                            'level' => 'h2'
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Konsistensi mengalahkan bakat alami. Dedikasikan waktu 15 menit setiap pagi untuk menulis apa pun yang terlintas di pikiran Anda tanpa diedit terlebih dahulu.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Mengenal Clean Architecture dalam Pengembangan Software Modern',
                'slug' => 'mengenal-clean-architecture-dalam-pengembangan-software-modern',
                'category' => 'Edukasi',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Clean Architecture menempatkan logika bisnis inti di pusat aplikasi, terisolasi penuh dari framework, database, dan UI. Pendekatan ini membuat kode Anda lebih mudah diuji (testable) dan dirawat dalam jangka panjang.</p>'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Tips Meningkatkan Core Web Vitals untuk SEO Website Anda',
                'slug' => 'tips-meningkatkan-core-web-vitals-untuk-seo-website-anda',
                'category' => 'Edukasi',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'content' => '<p>Core Web Vitals kini menjadi salah satu faktor penentu peringkat pencarian Google. Website yang lambat dan bergeser saat loading akan ditinggalkan oleh pengunjung dan dinilai buruk oleh robot perayap.</p>'
                        ]
                    ]
                ]
            ]
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'category' => $post['category'],
                'content' => $post['content'],
            ]);
        }
    }
}

