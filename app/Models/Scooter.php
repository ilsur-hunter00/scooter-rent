<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scooter extends Model
{
    use HasFactory;

    protected $guarded = [  ];

    public function scooterKind() {
        return $this->belongsTo(Scooter_kind::class);
    }

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function manager() {
        return $this->hasOne(User::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}