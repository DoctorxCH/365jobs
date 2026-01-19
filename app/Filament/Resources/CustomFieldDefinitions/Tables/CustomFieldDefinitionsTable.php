<?php

namespace App\Filament\Resources\CustomFieldDefinitions\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CustomFieldDefinitionsTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
            ]);
    }
}
