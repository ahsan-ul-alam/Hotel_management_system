<?php

namespace App\Http\Controllers\Admin_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Food_order;
use App\Models\Room;
use App\Models\Salary;
use App\Models\Spa_booking;

class DashboardController extends Controller
{
    // Method to render the dashboard with dynamic data
    public function index()
    {
        // Total Earnings (sum of relevant income sources)
        $totalEarnings = Booking::sum('total_price') + Food_order::sum('total_price') + Spa_booking::sum('total_price');

        // Total Spendings (sum of paid salaries)
        $totalSpendings = Salary::where('status', 'paid')->sum('salary'); // Only considering paid salaries

        // Calculating Benefits percentage
        $benefitPercentage = ($totalEarnings > 0) ? (($totalEarnings - $totalSpendings) / $totalEarnings) * 100 : 0;

        // Spa Earnings (sum of spa bookings revenue)
        $spaEarnings = Spa_booking::sum('total_price');

        // Restaurant Earnings (sum of restaurant revenue)
        $restaurantEarnings = Food_order::sum('total_price');

        // Room Bookings (count the number of bookings)
        $totalRooms = Room::count();
        $newRoomBookings = Booking::where('status', 'pending')->count();
        $roomBooked = Booking::where('status', 'confirmed')->count();
        $availableRooms = Room::count() - $roomBooked;

        // Employee Count (count of employees)
        $employeeCount = Employee::count();

        // Pass the data to the view
        return view('admin.dashboard', compact(
            'totalEarnings',
            'totalSpendings',
            'benefitPercentage',
            'spaEarnings',
            'restaurantEarnings',
            'totalRooms',
            'availableRooms',
            'newRoomBookings',
            'roomBooked',
            'employeeCount'
        ));
    }
}
