<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   protected $fillable = ['from_city','to_city','travel_date','departure_time','company','bus_type','price'];

}
