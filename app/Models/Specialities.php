<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_name'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'speciality_id')->where('is_featured', 1); 
    }
}
