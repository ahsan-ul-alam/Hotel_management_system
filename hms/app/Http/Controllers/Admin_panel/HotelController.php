<?php

namespace App\Http\Controllers\Admin_panel;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    // Display all rooms
    public function index()
    {
        $rooms = Room::all(); // Fetch all rooms from the database
        return view('admin.hotel.all_room', compact('rooms'));
    }

    // Show page to add a new room
    public function addRoomPage()
    {
        return view('admin.hotel.add_room');
    }

    // Store new room
    public function storeRoom(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'room_number' => 'required|string',
            'room_type' => 'required|in:single,double,suite,deluxe,penthouse',
            'room_price' => 'required|numeric',
            'room_status' => 'required|in:available,booked',
            'room_description' => 'nullable|string',
            'room_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Process images
        $imagePaths = [];
        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $image) {
                $path = $image->store('uploads/rooms', 'public');
                $imagePaths[] = 'storage/' . $path;
            }
        }

        // Save room data
        Room::create([
            'room_number' => $validated['room_number'],
            'room_type' => $validated['room_type'],
            'room_price' => $validated['room_price'],
            'room_status' => $validated['room_status'],
            'room_description' => $validated['room_description'],
            'room_image' => json_encode($imagePaths), // Store image paths as JSON
        ]);

        // Redirect with success message
        return redirect()->route('hotel.rooms.all')->with('success', 'Room added successfully!');
    }

    // Show edit page for a specific room
    public function editRoom($id)
    {
        $room = Room::findOrFail($id); // Find room by ID or fail
        return view('admin.hotel.edit_room', compact('room'));
    }

    // Update room details
    public function updateRoom(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'room_number' => 'required|string',
            'room_type' => 'required|in:single,double,suite,deluxe,penthouse',
            'room_price' => 'required|numeric',
            'room_status' => 'required|in:available,booked',
            'room_description' => 'nullable|string',
            'room_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the room
        $room = Room::findOrFail($id);

        // Process new images if any
        $imagePaths = json_decode($room->room_image, true) ?? [];
        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $image) {
                $path = $image->store('uploads/rooms', 'public');
                $imagePaths[] = 'storage/' . $path;
            }
        }

        // Update room data
        $room->update([
            'room_number' => $validated['room_number'],
            'room_type' => $validated['room_type'],
            'room_price' => $validated['room_price'],
            'room_status' => $validated['room_status'],
            'room_description' => $validated['room_description'],
            'room_image' => json_encode($imagePaths), // Store updated image paths as JSON
        ]);

        // Redirect with success message
        return redirect()->route('hotel.rooms.all')->with('success', 'Room updated successfully!');
    }

    // Delete a room
    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);

        // Delete associated images from storage
        $images = json_decode($room->room_image, true);
        if ($images) {
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image)); // Delete image files from storage
                }
            }
        }

        // Delete the room record
        $room->delete();

        // Redirect with success message
        return redirect()->route('hotel.rooms.all')->with('success', 'Room deleted successfully!');
    }
}
