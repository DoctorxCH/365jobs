<?php

namespace App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Pages;

use App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource;
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
