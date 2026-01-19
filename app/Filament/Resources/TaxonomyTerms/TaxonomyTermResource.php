<?php

namespace App\Filament\Resources\TaxonomyTerms;

use App\Filament\Resources\TaxonomyTerms\TaxonomyTermResource\Pages;
use App\Models\TaxonomyTerm;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class TaxonomyTermResource extends Resource
{
    protected static ?string $model = TaxonomyTerm::class;

    // Filament v5: Parent nutzt Union-Typen bei Navigation-Props -> hier keine falsche Typisierung
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Taxonomy Terms';
    protected static ?string $modelLabel = 'Taxonomy Term';
    protected static ?string $pluralModelLabel = 'Taxonomy Terms';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('General')->schema([
                Grid::make(2)->schema([
                    TextInput::make('type')
                        ->required()
                        ->maxLength(50),

                    TextInput::make('key')
                        ->required()
                        ->maxLength(100),
                ]),

                Grid::make(2)->schema([
                    TextInput::make('label_en')
                        ->label('Label (EN)')
                        ->required(),

                    TextInput::make('label_sk')
                        ->label('Label (SK)')
                        ->required(),
                ]),

                Grid::make(3)->schema([
                    Toggle::make('active')->default(true),

                    TextInput::make('sort')
                        ->numeric()
                        ->default(0),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->sortable()->searchable(),
                TextColumn::make('key')->sortable()->searchable(),
                TextColumn::make('label_en')->label('Label EN')->searchable(),
                IconColumn::make('active')->boolean(),
                TextColumn::make('sort')->sortable(),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTaxonomyTerms::route('/'),
            'create' => Pages\CreateTaxonomyTerm::route('/create'),
            'edit' => Pages\EditTaxonomyTerm::route('/{record}/edit'),
        ];
    }
}
