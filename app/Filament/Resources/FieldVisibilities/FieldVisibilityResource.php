<?php

namespace App\Filament\Resources\FieldVisibilities;

use App\Filament\Resources\FieldVisibilities\Pages\CreateFieldVisibility;
use App\Filament\Resources\FieldVisibilities\Pages\EditFieldVisibility;
use App\Filament\Resources\FieldVisibilities\Pages\ListFieldVisibilities;
use App\Filament\Resources\FieldVisibilities\Schemas\FieldVisibilityForm;
use App\Filament\Resources\FieldVisibilities\Tables\FieldVisibilitiesTable;
use App\Models\FieldVisibility;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class FieldVisibilityResource extends Resource
{
    protected static ?string $model = FieldVisibility::class;

    protected static ?string $navigationLabel = 'Field Visibility';
    protected static ?string $modelLabel = 'Field Visibility';
    protected static ?string $pluralModelLabel = 'Field Visibilities';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-eye';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return FieldVisibilityForm::make($schema);
    }

    public static function table(Table $table): Table
    {
        return FieldVisibilitiesTable::make($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListFieldVisibilities::route('/'),
            'create' => CreateFieldVisibility::route('/create'),
            'edit'   => EditFieldVisibility::route('/{record}/edit'),
        ];
    }
}
