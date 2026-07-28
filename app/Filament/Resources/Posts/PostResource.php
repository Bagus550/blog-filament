<?php

namespace App\Filament\Resources\Posts;

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Models\Post;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Artikel')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required(),

                Select::make('category')
                    ->label('Jenis Artikel / Kategori')
                    ->options([
                        'Ensiklopedia' => 'Ensiklopedia',
                        'Fakta Unik'   => 'Fakta Unik',
                        'Info Menarik' => 'Info Menarik',
                    ])
                    ->default('Ensiklopedia')
                    ->required(),

                FileUpload::make('thumbnail')
                    ->label('Gambar Sampul / Thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('thumbnails')
                    ->visibility('public')
                    ->imageEditor() // (Opsional) Mengizinkan crop/edit gambar di Filament
                    ->columnSpanFull(),

                // --- BLOCK BUILDER UNTUK LAYOUT BEBAS ---
                Builder::make('content')
                    ->label('Isi Konten Blog')
                    ->blocks([

                        // 1. Sub-judul
                        Builder\Block::make('heading')
                            ->label('Sub Judul')
                            ->icon('heroicon-m-hashtag')
                            ->schema([
                                TextInput::make('content')->label('Teks Sub-Judul')->required(),
                                Select::make('level')
                                    ->options([
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                    ])->default('h2'),
                            ]),

                        // 2. Paragraf
                        Builder\Block::make('paragraph')
                            ->label('Paragraf Teks')
                            ->icon('heroicon-m-bars-3-bottom-left')
                            ->schema([
                                RichEditor::make('content')->label('Teks')->required(),
                            ]),

                        // 3. Gambar Kustom (Kiri, Kanan, Tengah)
                        Builder\Block::make('image')
                            ->label('Gambar')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Pilih Gambar')
                                    ->image()
                                    ->disk('public')
                                    ->visibility('public')
                                    ->directory('blog-images')
                                    ->required(),
                                TextInput::make('alt')->label('Keterangan Gambar (Alt)'),
                                Select::make('position')
                                    ->label('Posisi Gambar')
                                    ->options([
                                        'center' => 'Tengah (Full Width)',
                                        'left'   => 'Rata Kiri (Text Wrapping)',
                                        'right'  => 'Rata Kanan (Text Wrapping)',
                                    ])
                                    ->default('center'),
                            ]),

                        Builder\Block::make('grid_images')
                            ->label('Gambar Grid')
                            ->icon('heroicon-m-squares-2x2')
                            ->schema([
                                FileUpload::make('image_left')
                                    ->label('Gambar Kiri')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blog-images'),
                                TextInput::make('caption_left')
                                    ->label('Caption Gambar Kiri'),

                                FileUpload::make('image_right')
                                    ->label('Gambar Kanan')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blog-images'),
                                TextInput::make('caption_right')
                                    ->label('Caption Gambar Kanan'),
                            ]),

                        // 4. Kutipan
                        Builder\Block::make('quote')
                            ->label('Kutipan')
                            ->icon('heroicon-m-chat-bubble-bottom-center-text')
                            ->schema([
                                TextInput::make('content')->label('Teks Kutipan')->required(),
                                TextInput::make('author')->label('Penulis / Sumber'),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->collapsible()
                    ->cloneable()
                    ->blockNumbers(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Sampul')
                    ->disk('public'),
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug'),
                TextColumn::make('category')->label('Kategori')->sortable(),
                TextColumn::make('views_count')
                    ->label('Dibaca')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')->label('Dibuat Pada')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'Ensiklopedia' => 'Ensiklopedia',
                        'Fakta Unik'   => 'Fakta Unik',
                        'Info Menarik' => 'Info Menarik',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
