<?php

namespace App\Filament\Resources\TaxonomyTerms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TaxonomyTermForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Term')->schema([
                Grid::make(2)->schema([
                    Select::make('type')
                        ->required()
                        ->options([
                            'category' => 'Category',
                            'profession' => 'Profession',
                            'experience' => 'Experience',
                            'education' => 'Education',
                            'job_type' => 'Job type',
                            'salary_type' => 'Salary type',
                            'driving_license' => 'Driving license',
                        ])
                        ->searchable(),

                    TextInput::make('key')
                        ->required()
                        ->maxLength(100)
                        ->helperText('Stable key, e.g. it, construction, junior, full_time'),
                ]),

                Grid::make(2)->schema([
                    TextInput::make('label_en')
                        ->label('Label (EN)')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('label_sk')
                        ->label('Label (SK)')
                        ->maxLength(255),
                ]),

                Grid::make(3)->schema([
                    Toggle::make('active')->default(true),
                    TextInput::make('sort')->numeric()->default(0),
                ]),
            ]),
        ]);
    }
}
