<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    protected $fillable = ['name', 'faculty_id', 'location', 'image', 'capacity', 'current_capacity'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
