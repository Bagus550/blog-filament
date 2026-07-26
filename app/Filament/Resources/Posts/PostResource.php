<?php

namespace App\Filament\Resources\Posts;

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Filament\Resources\Posts\Schemas\PostForm;
use App\Filament\Resources\Posts\Tables\PostsTable;
use App\Models\Post;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

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
                        'Teknologi' => 'Teknologi',
                        'Gaya Hidup' => 'Gaya Hidup',
                        'Edukasi' => 'Edukasi',
                        'Bisnis' => 'Bisnis',
                        'Kreatif' => 'Kreatif',
                    ])
                    ->default('Teknologi')
                    ->required(),

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
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug'),
                TextColumn::make('category')->label('Kategori')->sortable(),
                TextColumn::make('created_at')->label('Dibuat Pada')->dateTime()->sortable(),
            ])
            ->filters([
                //
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
