<x-app-layout>
    <!-- Main Content -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Overview</h1>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
            <a href="#" onclick="generatePDF()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        @endif

    </div>

    <!-- Financial Overview Cards -->
    <div class="row">
        <!-- Total Earnings Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Earnings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalEarnings, 2) }} ৳
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spendings (Monthly) Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Spendings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalSpendings, 2) }}
                                ৳</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Benefits</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ number_format($benefitPercentage, 2) }}%
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $benefitPercentage }}%"
                                            aria-valuenow="{{ $benefitPercentage }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Rooms Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Available Rooms
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $availableRooms }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-2x text-gray-300"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Overview Cards -->
    <div class="row">
        <!-- Spa Center Earnings -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Spa Center Earnings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($spaEarnings, 2) }} ৳
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spa fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restaurant Earnings -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Restaurant Earnings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($restaurantEarnings, 2) }} ৳</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Bookings -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Room Booking Request
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newRoomBookings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Count -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employeeCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Room Management Cards -->
    <div class="row">
        <!-- Booked Rooms -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Booked Rooms
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $roomBooked }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bed fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Room Count -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Rooms</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRooms }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-2x text-gray-300"></i> <!-- Relevant icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- report generation --}}
<div id="reportContent" style="display: none;">
    <h1 style="text-align: center;">Financial Report</h1>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" border="1">
        <thead>
            <tr>
                <th style="padding: 10px;">Metric</th>
                <th style="padding: 10px;">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 10px;">Total Earnings</td>
                <td style="padding: 10px;">{{ number_format($totalEarnings, 2) }} ৳</td>
            </tr>
            <tr>
                <td style="padding: 10px;">Total Spendings</td>
                <td style="padding: 10px;">{{ number_format($totalSpendings, 2) }} ৳</td>
            </tr>
            <tr>
                <td style="padding: 10px;">Benefit Percentage</td>
                <td style="padding: 10px;">{{ number_format($benefitPercentage, 2) }}%</td>
            </tr>
            <tr>
                <td style="padding: 10px;">Available Rooms</td>
                <td style="padding: 10px;">{{ $availableRooms }}</td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center; margin-top: 20px;">Generated on: {{ now() }}</p>
</div>
{{-- js  --}}
{{-- js  --}}
{{-- js  --}}
<script>
    function generatePDF() {
        // Clone the report content
        const reportContent = document.getElementById('reportContent').cloneNode(true);

        // Create a new window for the report
        const printWindow = window.open('', '', 'width=800,height=600');

        // Write the content into the new window
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <title>Financial Report</title>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
                        th { background-color: #f4f4f4; }
                    </style>
                </head>
                <body>
                    ${reportContent.innerHTML}
                </body>
            </html>
        `);
        printWindow.document.close();

        // Trigger the print dialog
        printWindow.print();
    }
</script>
