<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public $timestamps = false;

    protected static $sorts = [
        'no_sort' => 'Nerūšiuota',
        'name_asc' => 'Įmonė (A-Z)',
        'name_desc' => 'Įmonė (Z-A)',
    ];

    public static function getSorts()
    {
        return self::$sorts;
    } 
}
