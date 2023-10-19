<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpaces extends Model
{
    use HasFactory;

    public function vehicles()
    {
        return $this->belongTo(Vehicles::class);
    }
}
