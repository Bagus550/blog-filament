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

    public function getExcerptAttribute($limit = 120)
    {
        $blocks = is_array($this->content) ? $this->content : json_decode($this->content, true);

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
