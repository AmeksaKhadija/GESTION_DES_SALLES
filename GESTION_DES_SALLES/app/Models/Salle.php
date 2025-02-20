<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status'];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
