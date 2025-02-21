<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date_debut', 'date_fin', 'status', 'user_id', 'salle_id'];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
}
