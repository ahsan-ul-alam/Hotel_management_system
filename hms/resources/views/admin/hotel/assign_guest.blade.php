<x-app-layout>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Assign a Room to a Guest</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('hotel.guest.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
            @csrf

            <!-- Select Room -->
            <div class="form-group mb-3">
                <label for="room_id" class="form-label">Select Room</label>
                <select name="room_id" id="room_id" class="form-control" required>
                    <option value="" disabled selected>Select a Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" data-price="{{ $room->room_price }}">
                            Room {{ $room->room_number }} (Price: {{ $room->room_price }}/day)
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Select Guest -->
            <div class="form-group mb-3">
                <label for="user_id" class="form-label">Select Guest</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" disabled selected>Select a Guest</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Check-In Date -->
            <div class="form-group mb-3">
                <label for="check_in" class="form-label">Check-In Date</label>
                <input type="date" name="check_in" id="check_in" class="form-control" min="{{ date('Y-m-d') }}"
                    required>
            </div>

            <!-- Check-Out Date -->
            <div class="form-group mb-3">
                <label for="check_out" class="form-label">Check-Out Date</label>
                <input type="date" name="check_out" id="check_out" class="form-control" min="{{ date('Y-m-d') }}"
                    required>
            </div>

            <!-- Total Price -->
            <div class="form-group mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Total Price"
                    value="{{ old('total_price', '0.00') }}" readonly>
            </div>

            <!-- Booking Status -->
            <div class="form-group mb-4">
                <label for="status" class="form-label">Booking Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" selected>Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Book Room</button>
        </form>
    </div>

    <!-- JavaScript for Dynamic Price Calculation -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const roomSelect = document.getElementById('room_id');
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');
            const totalPriceInput = document.getElementById('total_price');

            function calculateTotalPrice() {
                const selectedRoom = roomSelect.options[roomSelect.selectedIndex];
                const roomPrice = selectedRoom?.getAttribute('data-price');
                const checkInDate = new Date(checkInInput.value);
                const checkOutDate = new Date(checkOutInput.value);

                if (roomPrice && checkInDate && checkOutDate && checkOutDate > checkInDate) {
                    const dayCount = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);
                    totalPriceInput.value = (dayCount * roomPrice).toFixed(2);
                } else {
                    totalPriceInput.value = '0.00';
                }
            }

            roomSelect.addEventListener('change', calculateTotalPrice);
            checkInInput.addEventListener('input', calculateTotalPrice);
            checkOutInput.addEventListener('input', calculateTotalPrice);
        });
    </script>

    <!-- SweetAlert for Error and Success Messages -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: '{!! implode('<br>', $errors->all()) !!}'
            });
        </script>
    @endif

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
</x-app-layout>
