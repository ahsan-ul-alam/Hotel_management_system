<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'room_price',
        'room_status',
        'room_image',
        'room_description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
