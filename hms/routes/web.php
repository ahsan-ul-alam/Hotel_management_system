<?php

use App\Http\Controllers\Admin_panel\BookingController;
use App\Http\Controllers\Admin_panel\DashboardController;
use App\Http\Controllers\Admin_panel\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user_panel.index');
});







// |=========================================================================|
// |========================== Admin Routes Below ===========================|
// |=========================================================================|
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //========================
    // Hotel management routes
    //========================
    Route::get('admin/hotel/all_rooms', [HotelController::class, 'index'])->name('hotel.rooms.all');
    Route::get('admin/hotel', [HotelController::class, 'addRoomPage'])->name('hotel.rooms.add');
    Route::post('admin/hotel', [HotelController::class, 'storeRoom'])->name('hotel.rooms.store');
    Route::get('admin/room/edit/{id}', [HotelController::class, 'editRoom'])->name('hotel.rooms.edit'); // Edit room page
    Route::put('admin/room/update/{id}', [HotelController::class, 'updateRoom'])->name('hotel.rooms.update'); // Update room
    Route::get('admin/room/delete/{id}', [HotelController::class, 'deleteRoom'])->name('hotel.rooms.delete'); // Delete room

    // room booking processes routes
    Route::get('admin/hotel/bookings', [BookingController::class, 'index'])->name('hotel.bookings.index');
    Route::post('admin/hotel/bookings/update/{booking}', [BookingController::class, 'update'])->name('hotel.bookings.update');

    //guest assingnment routes
    Route::get('admin/hotel/assign_guest', [BookingController::class, 'assignGuestPage'])->name('hotel.guest.assign');
    Route::post('admin/hotel/assign_guest', [BookingController::class, 'storeBookingsForGuest'])->name('hotel.guest.store');
});
require __DIR__ . '/auth.php';
// |=========================================================================|
// |======================== Admin Routes ends here =========================|
// |=========================================================================|