<?php

namespace App\Filament\Resources\CustomFieldDefinition;

use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Pages\CreateCustomFieldDefinition;
use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Pages\EditCustomFieldDefinition;
use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Pages\ListCustomFieldDefinitions;
use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Schemas\CustomFieldDefinitionForm;
use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Tables\CustomFieldDefinitionsTable;
use App\Models\CustomFieldDefinition;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CustomFieldDefinitionResource extends Resource
{
    protected static ?string $model = CustomFieldDefinition::class;

    protected static ?string $navigationLabel = 'Custom Fields';
    protected static ?string $modelLabel = 'Custom Field';
    protected static ?string $pluralModelLabel = 'Custom Fields';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return CustomFieldDefinitionForm::make($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomFieldDefinitionsTable::make($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomFieldDefinitions::route('/'),
            'create' => CreateCustomFieldDefinition::route('/create'),
            'edit' => EditCustomFieldDefinition::route('/{record}/edit'),
        ];
    }
}
