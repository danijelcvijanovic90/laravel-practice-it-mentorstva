<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table='forecasts';

    protected $fillable=['city_id','temperature','date'];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id'); //belongsTo Cities table with foreign key city_id -> city=>id
    }
}
