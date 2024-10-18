<?php

namespace App\Filament\Admin\Resources\ChurchResource\Pages;

use App\Filament\Admin\Resources\ChurchResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChurch extends CreateRecord
{
    protected static string $resource = ChurchResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}