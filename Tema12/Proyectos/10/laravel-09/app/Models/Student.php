<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'birth_date',
        'phone',
        'city',
        'dni',
        'email'
    ];

    public function students():HasMany {
        return $this->hasMany(Student::class);
    }
}
