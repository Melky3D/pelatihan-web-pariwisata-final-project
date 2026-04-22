<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attractions extends Model
{
    protected $table = 'attractions';

    protected $fillable = [
        'name',
        'description',
        'ticket_price',
        'image',
        'created_at',
        'updated_at',
    ];
}
