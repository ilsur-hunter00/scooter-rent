<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['scooter_id', 'manager_id', 'user_id', 'is_accepted'];

    public function scooter() {
        return $this->hasOne(Scooter::class);
    }
}
