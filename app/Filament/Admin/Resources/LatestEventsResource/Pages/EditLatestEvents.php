<?php

namespace App\Filament\Admin\Resources\LatestEventsResource\Pages;

use App\Filament\Admin\Resources\LatestEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLatestEvents extends EditRecord
{
    protected static string $resource = LatestEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
