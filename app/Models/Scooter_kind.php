<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scooter_kind extends Model
{
    use HasFactory;

    public function scooter() {
        return $this->hasMany(Scooter::class);
    }
}
