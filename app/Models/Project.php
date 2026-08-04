<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $guarded = [];

    protected $casts = [
        'content'     => 'array',
        'tech_stack'  => 'array',
        'is_featured' => 'boolean',
    ];

    /**
     * Accessor untuk URL thumbnail project
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            return filter_var($this->thumbnail, FILTER_VALIDATE_URL)
                ? $this->thumbnail
                : asset('storage/' . $this->thumbnail);
        }

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

        return 'https://placehold.co/800x600?text=Project+Thumbnail';
    }

    /**
     * Accessor untuk ringkasan deskripsi project
     */
    public function getExcerptAttribute($limit = 120): string
    {
        if (!empty($this->summary)) {
            return Str::limit(strip_tags($this->summary), $limit);
        }

        $blocks = $this->content ?? [];
        if (is_array($blocks)) {
            foreach ($blocks as $block) {
                if (isset($block['type']) && $block['type'] === 'paragraph' && !empty($block['data']['content'])) {
                    return Str::limit(strip_tags($block['data']['content']), $limit);
                }
            }
        }

        return '';
    }
}
