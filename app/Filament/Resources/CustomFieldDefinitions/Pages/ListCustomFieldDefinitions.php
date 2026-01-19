<?php

namespace App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Pages;

use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomFieldDefinitions extends ListRecords
{
    protected static string $resource = CustomFieldDefinitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
