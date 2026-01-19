<?php

namespace App\Filament\Resources\TaxonomyTerms\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TaxonomyTermsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->sortable()->searchable(),
                TextColumn::make('key')->sortable()->searchable(),
                TextColumn::make('label_en')->label('EN')->sortable()->searchable(),
                TextColumn::make('label_sk')->label('SK')->sortable()->toggleable(),
                ToggleColumn::make('active')->sortable(),
                TextColumn::make('sort')->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'category' => 'Category',
                        'profession' => 'Profession',
                        'experience' => 'Experience',
                        'education' => 'Education',
                        'job_type' => 'Job type',
                        'salary_type' => 'Salary type',
                        'driving_license' => 'Driving license',
                    ]),
                SelectFilter::make('active')->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ])->query(function (Builder $query, array $data) {
                    if (!isset($data['value'])) {
                        return $query;
                    }
                    return $query->where('active', (bool) $data['value']);
                }),
            ])
            ->defaultSort('type');
    }
}
