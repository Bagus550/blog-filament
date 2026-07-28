<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Bug 5 fix: Accessor untuk mendapatkan URL thumbnail.
     * Menggantikan fungsi getPostThumbnail() di Blade agar tidak ada risiko redeclaration.
     * Gunakan: $post->thumbnail_url
     */
    public function getThumbnailUrlAttribute(): string
    {
        // 1. Cek apakah ada file thumbnail di kolom database
        if (!empty($this->thumbnail)) {
            return filter_var($this->thumbnail, FILTER_VALIDATE_URL)
                ? $this->thumbnail
                : asset('storage/' . $this->thumbnail);
        }

        // 2. Fallback: Cari gambar pertama dari builder content jika thumbnail kosong
        // Cast 'array' di $casts sudah menjamin $this->content bertipe array, tidak perlu json_decode
        $content = $this->content ?? [];
        if (is_array($content)) {
            foreach ($content as $block) {
                if (isset($block['type']) && $block['type'] === 'image' && !empty($block['data']['url'])) {
                    $imageUrl = $block['data']['url'];
                    return filter_var($imageUrl, FILTER_VALIDATE_URL)
                        ? $imageUrl
                        : asset('storage/' . $imageUrl);
                }
            }
        }

        // 3. Fallback terakhir jika tidak ada gambar sama sekali
        return 'https://placehold.co/800x600?text=No+Image';
    }

    public function getExcerptAttribute($limit = 120)
    {
        // Cast 'array' di $casts sudah menjamin $this->content bertipe array, tidak perlu json_decode
        $blocks = $this->content ?? [];

        if (!is_array($blocks)) {
            return '';
        }

        // Cari block yang tipe-nya 'paragraph'
        foreach ($blocks as $block) {
            if (isset($block['type']) && $block['type'] === 'paragraph' && !empty($block['data']['content'])) {
                return Str::limit(strip_tags($block['data']['content']), $limit);
            }
        }

        // Jika tidak ada block paragraph, ambil block heading/apapun yang punya isi
        foreach ($blocks as $block) {
            if (!empty($block['data']['content'])) {
                return Str::limit(strip_tags($block['data']['content']), $limit);
            }
        }

        return '';
    }
}

