<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingEntry extends Model
{
    protected $fillable = ['student_card', 'parking_lot_id', 'entry_time', 'exit_time', 'status'];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class);
    }

    protected function casts(): array
    {
        return [
            'entry_time' => 'datetime',
            'exit_time' => 'datetime',
            'status' => 'boolean',
        ];
    }
}
