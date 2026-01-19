<?php

namespace App\Filament\Resources\Purchases\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PurchaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_id')
                    ->required()
                    ->numeric(),
                TextInput::make('package_id')
                    ->required()
                    ->numeric(),
                TextInput::make('job_credits_total')
                    ->required()
                    ->numeric(),
                TextInput::make('job_credits_remaining')
                    ->required()
                    ->numeric(),
                TextInput::make('provider'),
                TextInput::make('provider_ref'),
                DateTimePicker::make('purchased_at'),
            ]);
    }
}
