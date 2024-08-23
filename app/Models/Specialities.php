<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeSearch(Builder $query, string $value)
    {
        $query->where('speciality_name', 'like', '%'.$value.'%');
    }
}
