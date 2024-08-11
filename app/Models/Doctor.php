<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'hospital_name',
        'experience',
        'twitter',
        'instagram',
        'speciality_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Specialities::class, 'speciality_id'); 
    }

}
