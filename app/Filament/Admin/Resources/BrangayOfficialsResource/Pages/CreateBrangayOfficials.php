<?php

namespace App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;

use App\Filament\Admin\Resources\BrangayOfficialsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrangayOfficials extends CreateRecord
{
    protected static string $resource = BrangayOfficialsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}