<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Post;

class BlogOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel', Post::count())
                ->description('Jumlah seluruh tulisan blog')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
            Stat::make('Kategori Aktif', Post::distinct('category')->count('category'))
                ->description('Kategori yang memiliki tulisan')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
            Stat::make('Artikel Terbaru', \Illuminate\Support\Str::limit(Post::latest()->first()?->title ?? 'Belum ada', 30))
                ->description('Update artikel terakhir')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
