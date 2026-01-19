<?php

namespace App\Filament\Resources\Jobs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_id')
                    ->required()
                    ->numeric(),
                TextInput::make('category_term_id')
                    ->numeric(),
                TextInput::make('profession_term_id')
                    ->numeric(),
                TextInput::make('experience_term_id')
                    ->numeric(),
                TextInput::make('education_term_id')
                    ->numeric(),
                TextInput::make('job_type_term_id')
                    ->numeric(),
                TextInput::make('salary_type_term_id')
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('reference_number'),
                TextInput::make('seniority'),
                TextInput::make('short_description'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('driving_licenses'),
                Toggle::make('requires_own_vehicle')
                    ->required(),
                TextInput::make('company_car_policy'),
                Toggle::make('is_graduate_friendly')
                    ->required(),
                Toggle::make('is_disability_friendly')
                    ->required(),
                Toggle::make('requires_travel')
                    ->required(),
                Toggle::make('is_remote')
                    ->required(),
                TextInput::make('workplace_type'),
                TextInput::make('home_office_percent')
                    ->numeric(),
                TextInput::make('min_salary')
                    ->numeric(),
                TextInput::make('max_salary')
                    ->numeric(),
                DatePicker::make('job_start'),
                TextInput::make('apply_on'),
                TextInput::make('apply_email')
                    ->email(),
                TextInput::make('apply_url')
                    ->url(),
                TextInput::make('address'),
                TextInput::make('lat')
                    ->numeric(),
                TextInput::make('lng')
                    ->numeric(),
                Toggle::make('featured')
                    ->required(),
                DateTimePicker::make('featured_until'),
                Toggle::make('highlight')
                    ->required(),
                DateTimePicker::make('highlight_until'),
                TextInput::make('status')
                    ->required()
                    ->default('waiting_approval_create'),
                TextInput::make('total_views')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
