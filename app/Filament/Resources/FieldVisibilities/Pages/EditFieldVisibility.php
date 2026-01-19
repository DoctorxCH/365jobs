<?php

namespace App\Filament\Resources\FieldVisibility\FieldVisibilityResource\Pages;

use App\Filament\Resources\FieldVisibility\FieldVisibilityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFieldVisibility extends EditRecord
{
    protected static string $resource = FieldVisibilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
