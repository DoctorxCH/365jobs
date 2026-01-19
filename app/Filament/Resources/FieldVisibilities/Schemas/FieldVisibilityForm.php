<?php

namespace App\Filament\Resources\FieldVisibilities\Schemas;

use Filament\Schemas\Schema;

class FieldVisibilityForm
{
    public static function make(Schema $schema): Schema
    {
        /**
         * Absichtlich leer.
         * Felder werden ergänzt, sobald Model & Migration final sind.
         */
        return $schema->schema([]);
    }
}
