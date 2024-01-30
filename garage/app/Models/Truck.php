<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'plate',
        'mechanic_id',
    ];

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
