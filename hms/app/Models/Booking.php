<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'room_bookings';

    protected $fillable = [
        'room_id',
        'user_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Define the relationship with the Room model
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
