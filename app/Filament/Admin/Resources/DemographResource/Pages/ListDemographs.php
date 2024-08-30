<?php

namespace App\Filament\Admin\Resources\DemographResource\Pages;

use App\Filament\Admin\Resources\DemographResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemographs extends ListRecords
{
    protected static string $resource = DemographResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
