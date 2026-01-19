<?php

namespace App\Filament\Resources\CustomFieldDefinitions\Pages;

use App\Filament\Resources\CustomFieldDefinitions\CustomFieldDefinitionResource;
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
