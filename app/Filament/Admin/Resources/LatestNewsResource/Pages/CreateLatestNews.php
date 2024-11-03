<?php

namespace App\Filament\Admin\Resources\LatestNewsResource\Pages;

use App\Filament\Admin\Resources\LatestNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLatestNews extends CreateRecord
{
    protected static string $resource = LatestNewsResource::class;
}
