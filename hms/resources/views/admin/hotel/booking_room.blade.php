<x-app-layout>
    <div class="m-4 py-5">
        <h1 class="text-center mb-4">Manage Bookings</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Room</th>
                                <th>User</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                @if ($booking->status == 'pending')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->room->room_number }}</td>
                                        @php
                                            $user = DB::table('users')
                                                ->where('id', $booking->user_id)
                                                ->first();
                                        @endphp
                                        <td>{{ $user->name ?? 'No user assigned' }}</td>

                                        <td>{{ $booking->check_in }}</td>
                                        <td>{{ $booking->check_out }}</td>
                                        <td>${{ $booking->total_price }}</td>
                                        <td>
                                            <span
                                                class="badge 
                                            @if ($booking->status === 'pending') bg-warning 
                                            @elseif($booking->status === 'confirmed') bg-success 
                                            @else bg-danger @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($booking->status === 'pending')
                                                <form action="{{ route('hotel.bookings.update', $booking->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="confirmed">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success">Confirm</button>
                                                </form>
                                                <form action="{{ route('hotel.bookings.update', $booking->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                                </form>
                                            @elseif($booking->status === 'confirmed')
                                                <span class="text-success">Confirmed</span>
                                            @else
                                                <span class="text-danger">Cancelled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">No bookings found</td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
