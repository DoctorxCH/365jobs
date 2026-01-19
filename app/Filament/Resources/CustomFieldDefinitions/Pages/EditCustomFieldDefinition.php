<?php

namespace App\Filament\Resources\CustomFieldDefinitions\Pages;

use App\Filament\Resources\CustomFieldDefinitions\CustomFieldDefinitionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomFieldDefinition extends EditRecord
{
    protected static string $resource = CustomFieldDefinitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
