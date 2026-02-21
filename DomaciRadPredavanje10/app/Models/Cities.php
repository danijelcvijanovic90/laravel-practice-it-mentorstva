<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table='cities';

    protected $fillable=['name'];

    public function weather()
    {
        return $this->hasOne(Weather::class, 'city_id'); //has one record for every city=>id
    }

    public function forecast()
    {
        return $this->hasMany(Forecast::class,'city_id')
            ->orderBy('date')->take(5); // has many records for every city=>id
    }
}
