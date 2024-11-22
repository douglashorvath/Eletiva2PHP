<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date', 'time', 'capacity']; // Campos preenchíveis

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
