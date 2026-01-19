<?php

namespace App\Filament\Resources\FieldVisibility\FieldVisibilityResource\Pages;

use App\Filament\Resources\FieldVisibility\FieldVisibilityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFieldVisibilities extends ListRecords
{
    protected static string $resource = FieldVisibilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
