<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
    ];

    protected static $sorts = [
        'no_sort' => 'Nerūšiuota',
        'name_asc' => 'Pavardė (A-Z)',
        'name_desc' => 'Pavardė (Z-A)',
        'truck_count_asc' => 'Sunkvežimių skaičius (didėjimo tvarka)',
        'truck_count_desc' => 'Sunkvežimių skaičius (mažėjimo tvarka)',
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
    
    public function trucks()
    {
        return $this->belongsToMany(Truck::class, 'mechanic_trucks');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }



    
}
