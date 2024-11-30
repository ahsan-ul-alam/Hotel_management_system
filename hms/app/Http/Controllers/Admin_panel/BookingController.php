<?php

namespace App\Http\Controllers\Admin_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('admin.hotel.booking_room', compact('bookings'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($validated);
        return redirect()->route('hotel.bookings.index')->with('success', 'Booking status updated.');
    }

    // guest assign 

    public function assignGuestPage()
    {
        $rooms = Room::where('room_status', 'available')->get();
        $users = User::all();
        return view('admin.hotel.assign_guest', compact('rooms', 'users'));
    }

    public function storeBookingsForGuest(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|string',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('guest-assign.create')->with('success', 'Room successfully booked for the guest!');
    }
}
