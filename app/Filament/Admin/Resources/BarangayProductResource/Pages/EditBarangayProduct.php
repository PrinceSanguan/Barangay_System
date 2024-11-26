<?php

namespace App\Filament\Admin\Resources\BarangayProductResource\Pages;

use App\Filament\Admin\Resources\BarangayProductResource;
use Filament\Resources\Pages\EditRecord;

class EditBarangayProduct extends EditRecord
{
    protected static string $resource = BarangayProductResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
