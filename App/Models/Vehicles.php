<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    public function parkingSpace()
    {
        return $this->hasMany(ParkingSpaces::class);
    }

    protected $table = 'vehicles';

    protected $fillable = [
        'driverName',
        'licensePlate',
        'entryTime',
        'exitTime'
    ];
}
