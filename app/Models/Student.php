<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_card', 'name', 'email', 'phone', 'faculty_id', 'status'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
    
}
