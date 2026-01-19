<?php

namespace App\Filament\Resources\FieldVisibilities\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FieldVisibilitiesTable
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
