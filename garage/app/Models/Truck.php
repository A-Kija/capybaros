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

    protected static $sorts = [
        'no_sort' => 'Nerūšiuota',
        'model_asc' => 'Modelis (A-Z)',
        'model_desc' => 'Modelis (Z-A)',
    ];

    protected static $perPageSelect = [
        0 => 'Visi',
        3 => 3,
        11 => 11,
        13 => 13,
        29 => 29,
    ];

    public static function getSorts()
    {
        return self::$sorts;
    } 
    
    public static function getPerPageSelect()
    {
        return self::$perPageSelect;
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
