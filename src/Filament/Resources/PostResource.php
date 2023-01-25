<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Carbon\Carbon;
use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\PostResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\PostResource\RelationManagers;
use Hup234design\FilamentCms\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Post Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(
                        FilamentCms::globalFormFields(Post::class, true)
                    )
                    ->columnSpan(['lg' => 3]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Select::make('post_category_id')
                            ->label('Category')
                            ->options(PostCategory::all()->pluck('name', 'id'))
                            ->nullable(),
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Published At')
                                    ->default(Carbon::now())
                                    ->required(),
                                Forms\Components\Toggle::make('published')
                                    ->default(true),
                            ]),
                        FilamentCms::seoFormFields()
                    ])
                    ->columnSpan(['lg' => 1])
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('post_category.name')->label('Category'),
                Tables\Columns\IconColumn::make('published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')->label('Published At')->datetime(),
            ])
            ->filters([
                Tables\Filters\Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('published', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
