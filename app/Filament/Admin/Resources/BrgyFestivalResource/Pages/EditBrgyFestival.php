<?php

namespace App\Filament\Admin\Resources\BrgyFestivalResource\Pages;

use App\Filament\Admin\Resources\BrgyFestivalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrgyFestival extends EditRecord
{
    protected static string $resource = BrgyFestivalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
