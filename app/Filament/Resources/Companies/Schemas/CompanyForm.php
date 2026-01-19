<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Company')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                // slug nur setzen, wenn noch leer oder wenn slug = alter slug vom alten name
                                $currentSlug = (string) ($get('slug') ?? '');
                                if ($currentSlug === '') {
                                    $set('slug', Str::slug((string) $state));
                                }
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Auto from name; editable.')
                            ->dehydrateStateUsing(fn ($state) => Str::slug((string) $state)),
                    ]),

                    Grid::make(2)->schema([
                        TextInput::make('category')
                            ->maxLength(120),

                        Toggle::make('active')
                            ->default(true),
                    ]),

                    Textarea::make('description')
                        ->columnSpanFull(),
                ]),

            Section::make('Identifiers (SK)')
                ->schema([
                    Grid::make(3)->schema([
                        TextInput::make('ico')
                            ->label('ICO')
                            ->maxLength(20),

                        TextInput::make('dic')
                            ->label('DIC')
                            ->maxLength(20),

                        TextInput::make('ic_dph')
                            ->label('IC DPH')
                            ->maxLength(20),
                    ]),
                ])
                ->collapsible(),

            Section::make('Contact')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('contact_name')
                            ->label('Contact person')
                            ->maxLength(120),

                        TextInput::make('contact_email')
                            ->email()
                            ->maxLength(190),
                    ]),

                    Grid::make(2)->schema([
                        TextInput::make('contact_phone')
                            ->tel()
                            ->maxLength(50),

                        TextInput::make('phone')
                            ->label('Phone (central)')
                            ->tel()
                            ->maxLength(50),
                    ]),

                    TextInput::make('website')
                        ->url()
                        ->maxLength(190),

                    TextInput::make('logo_path')
                        ->label('Logo path')
                        ->maxLength(255)
                        ->helperText('MVP: store path/URL. Upload later.'),
                ])
                ->collapsible(),

            Section::make('Address')
                ->schema([
                    TextInput::make('company_address')
                        ->label('Company address')
                        ->maxLength(255),

                    TextInput::make('contact_address')
                        ->label('Contact address')
                        ->maxLength(255),

                    Grid::make(2)->schema([
                        TextInput::make('country')
                            ->maxLength(80),

                        TextInput::make('city')
                            ->maxLength(120),
                    ]),
                ])
                ->collapsible(),

            Section::make('Limits')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('employees_count')
                            ->numeric()
                            ->minValue(0),

                        TextInput::make('team_seat_limit')
                            ->numeric()
                            ->minValue(0)
                            ->default(10),
                    ]),

                    DateTimePicker::make('verified_at')
                        ->seconds(false)
                        ->helperText('Optional.'),
                ])
                ->collapsible(),
        ]);
    }
}
