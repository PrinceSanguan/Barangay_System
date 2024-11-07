<?php

namespace App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;

use App\Filament\Admin\Resources\BrangayOfficialsResource;
use App\Models\BrangayOfficials;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBrangayOfficials extends ListRecords
{
    protected static string $resource = BrangayOfficialsResource::class;

    // Override the query method
    public function query(): Builder
    {
        // Get the term_year filter from the request or default to '2023 to 2026'
        $termYear = request()->query('filters.term_year', '2023 to 2026');
        
        // Apply the filter query on the term_year field
        return BrangayOfficials::query()->where('term_year', $termYear);
    }
}
