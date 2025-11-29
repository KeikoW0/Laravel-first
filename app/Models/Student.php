<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'brithday',
        'classroom_id',
        'email',
        'address',
    ];

    protected $with = ['classroom'];

    // added: cast birthday to date so ->format() works in Blade
    protected $casts = [
        'brithday' => 'date',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
