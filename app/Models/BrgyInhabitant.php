<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgyInhabitant extends Model
{
    use HasFactory;

    protected $guarded = [];
   


     public function scopeApproved($query)
     {
         return $query->where('is_approved', true);
     }
 
     public function scopePendingApproval($query)
     {
         return $query->where('is_approved', false);
     }
     public function user()
{
    return $this->belongsTo(User::class);
}
}
