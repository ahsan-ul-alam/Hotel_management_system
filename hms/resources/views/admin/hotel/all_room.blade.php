<x-app-layout>
    <div class="m-4 py-5">
        <h1 class="text-center mb-4">All Rooms</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('hotel.rooms.add') }}" class="btn btn-primary mb-3 float-right">Add New Room</a>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Room Number</th>
                                <th>Type</th>
                                <th>Price (Per Night)</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $room->room_number }}</td>
                                    <td>{{ ucfirst($room->room_type) }}</td>
                                    <td>${{ $room->room_price }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $room->room_status === 'available' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($room->room_status) }}
                                        </span>
                                    </td>
                                    <td>{{ Str::limit($room->room_description ?: 'No Description Available', 100) }}
                                    </td>
                                    <td>
                                        @if ($room->room_image)
                                            @php
                                                $images = json_decode($room->room_image, true);
                                            @endphp
                                            @foreach ($images as $key => $image)
                                                @if ($key === 0)
                                                    <img src="{{ asset($image) }}" alt="Room Image"
                                                        class="img-thumbnail" style="width: 80px; height: 80px;">
                                                @endif
                                            @endforeach
                                        @else
                                            <span>No Images</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal{{ $room->id }}">
                                            Details
                                        </button>
                                        <a href="{{ route('hotel.rooms.edit', $room->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteImageModal{{ $room->id }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <!-- Modal for confirming image deletion -->
                                <div id="deleteImageModal{{ $room->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="deleteImageModalLabel{{ $room->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteImageModalLabel{{ $room->id }}">
                                                    Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this image?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <a href="{{ route('hotel.rooms.delete', $room->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Details Modal -->
                                <div class="modal fade" id="detailsModal{{ $room->id }}" tabindex="-1"
                                    aria-labelledby="detailsModalLabel{{ $room->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailsModalLabel{{ $room->id }}">Room
                                                    Details - {{ $room->room_number }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Room Number:</strong> {{ $room->room_number }}</p>
                                                        <p><strong>Type:</strong> {{ ucfirst($room->room_type) }}</p>
                                                        <p><strong>Price:</strong> ${{ $room->room_price }} per night
                                                        </p>
                                                        <p><strong>Status:</strong>
                                                            <span
                                                                class="badge {{ $room->room_status === 'available' ? 'bg-success' : 'bg-danger' }}">
                                                                {{ ucfirst($room->room_status) }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Description:</strong></p>
                                                        <p>{{ $room->room_description }}</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <strong>Images:</strong>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @if ($room->room_image)
                                                            @foreach (json_decode($room->room_image, true) as $key => $image)
                                                                <img src="{{ asset($image) }}" alt="Room Image"
                                                                    class="img-thumbnail"
                                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                                            @endforeach
                                                        @else
                                                            <p>No Images Available</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No rooms found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
