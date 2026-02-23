<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table='weather';
    protected $fillable=['city_id','temperature'];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id'); //belongsTo Cities table with foreign key city_id -> city=>id
    }




}
