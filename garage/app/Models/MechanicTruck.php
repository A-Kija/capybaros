<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicTruck extends Model
{
    use HasFactory;

    protected $fillable = [
        'mechanic_id',
        'truck_id',
    ];

    public $timestamps = false;
}
