<?php

namespace App\Models;

use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Model;

class brgyActivity extends Model
{
    use HasPanelShield;
    protected $guarded = [];
}
