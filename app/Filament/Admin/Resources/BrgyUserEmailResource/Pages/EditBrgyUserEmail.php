<?php

namespace App\Filament\Admin\Resources\BrgyUserEmailResource\Pages;

use App\Filament\Admin\Resources\BrgyUserEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrgyUserEmail extends EditRecord
{
    protected static string $resource = BrgyUserEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
