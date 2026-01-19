<?php

namespace App\Filament\Resources\CustomFieldDefinition\CustomFieldDefinitionResource\Schemas;

use Filament\Schemas\Schema;

class CustomFieldDefinitionForm
{
    public static function make(Schema $schema): Schema
    {
        /**
         * Absichtlich minimal/leer, um keine DB-Spalten anzunehmen.
         * Sobald dein Model/Migration-Felder fix sind, füllen wir hier das Schema sauber auf.
         */
        return $schema->schema([]);
    }
}
