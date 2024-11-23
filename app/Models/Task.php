<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'urgent',
        'progress',
        'status',
        'user_id',
        'order_column',

    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
