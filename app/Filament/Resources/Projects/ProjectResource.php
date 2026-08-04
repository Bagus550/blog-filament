<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Models\Project;
use BackedEnum;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static \UnitEnum|string|null $navigationGroup = 'Portofolio';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Project & Aplikasi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Project / Aplikasi')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required(),

                Textarea::make('summary')
                    ->label('Ringkasan Singkat')
                    ->placeholder('Penjelasan singkat tentang aplikasi ini untuk kartu preview...')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('demo_url')
                    ->label('URL Live Demo / Aplikasi')
                    ->placeholder('https://app.example.com')
                    ->url(),

                TextInput::make('github_url')
                    ->label('URL Repositori GitHub')
                    ->placeholder('https://github.com/username/repo')
                    ->url(),

                TagsInput::make('tech_stack')
                    ->label('Tech Stack (Teknologi)')
                    ->placeholder('Tambah teknologi... (e.g. Laravel, React, Tailwind)')
                    ->suggestions([
                        'Laravel',
                        'Filament',
                        'Vue.js',
                        'React',
                        'TailwindCSS',
                        'PHP',
                        'MySQL',
                        'Docker',
                        'Node.js',
                        'Python',
                        'Flutter'
                    ]),

                Select::make('status')
                    ->label('Status Project')
                    ->options([
                        'Live'               => 'Live (Siap Digunakan)',
                        'Beta'               => 'Beta Testing',
                        'Dalam Pengembangan' => 'Dalam Pengembangan',
                        'Diarsip'            => 'Diarsip',
                    ])
                    ->default('Live')
                    ->required(),

                Toggle::make('is_featured')
                    ->label('Project Unggulan (Tampil di Beranda)')
                    ->default(false),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail / Screenshot Utama')
                    ->image()
                    ->disk('public')
                    ->directory('project-thumbnails')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                // --- BUILDER UNTUK DETAIL KONTEN / DOKUMENTASI PROJECT ---
                Builder::make('content')
                    ->label('Detail & Dokumentasi Project')
                    ->blocks([
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

                        Builder\Block::make('paragraph')
                            ->label('Paragraf Deskripsi')
                            ->icon('heroicon-m-bars-3-bottom-left')
                            ->schema([
                                RichEditor::make('content')->label('Teks Deskripsi')->required(),
                            ]),

                        Builder\Block::make('image')
                            ->label('Screenshot / Gambar Showcase')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Pilih Gambar')
                                    ->image()
                                    ->disk('public')
                                    ->visibility('public')
                                    ->directory('project-images')
                                    ->required(),
                                TextInput::make('alt')->label('Keterangan Gambar'),
                            ]),

                        Builder\Block::make('quote')
                            ->label('Catatan / Highlight Fitur')
                            ->icon('heroicon-m-chat-bubble-bottom-center-text')
                            ->schema([
                                TextInput::make('content')->label('Teks Highlight')->required(),
                                TextInput::make('author')->label('Label / Kategori Highlight'),
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
                    ->label('Thumbnail')
                    ->disk('public'),

                TextColumn::make('title')
                    ->label('Nama Project')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Live'               => 'success',
                        'Beta'               => 'warning',
                        'Dalam Pengembangan' => 'info',
                        'Diarsip'            => 'gray',
                        default              => 'primary',
                    })
                    ->sortable(),

                ToggleColumn::make('is_featured')
                    ->label('Unggulan'),

                TextColumn::make('views_count')
                    ->label('Dilihat')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Live'               => 'Live',
                        'Beta'               => 'Beta',
                        'Dalam Pengembangan' => 'Dalam Pengembangan',
                        'Diarsip'            => 'Diarsip',
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
            'index'  => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit'   => EditProject::route('/{record}/edit'),
        ];
    }
}
