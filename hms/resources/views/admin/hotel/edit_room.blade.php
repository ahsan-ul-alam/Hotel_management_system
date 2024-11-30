<x-app-layout>
    <div class="m-4 py-5">
        <h1 class="text-center mb-4">Edit Room - {{ $room->room_number }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('hotel.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Room Number -->
                    <div class="mb-3">
                        <label for="room_number" class="form-label">Room Number</label>
                        <input type="text" name="room_number" id="room_number" class="form-control"
                            value="{{ $room->room_number }}" required>
                    </div>

                    <!-- Room Type -->
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Room Type</label>
                        <select name="room_type" id="room_type" class="form-select" required>
                            <option value="single" {{ $room->room_type == 'single' ? 'selected' : '' }}>Single</option>
                            <option value="double" {{ $room->room_type == 'double' ? 'selected' : '' }}>Double</option>
                            <option value="suite" {{ $room->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
                            <option value="deluxe" {{ $room->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="penthouse" {{ $room->room_type == 'penthouse' ? 'selected' : '' }}>Penthouse
                            </option>
                        </select>
                    </div>

                    <!-- Room Price -->
                    <div class="mb-3">
                        <label for="room_price" class="form-label">Room Price (Per Night)</label>
                        <input type="number" name="room_price" id="room_price" class="form-control"
                            value="{{ $room->room_price }}" required>
                    </div>

                    <!-- Room Status -->
                    <div class="mb-3">
                        <label for="room_status" class="form-label">Room Status</label>
                        <select name="room_status" id="room_status" class="form-select" required>
                            <option value="available" {{ $room->room_status == 'available' ? 'selected' : '' }}>
                                Available</option>
                            <option value="booked" {{ $room->room_status == 'booked' ? 'selected' : '' }}>Booked
                            </option>
                        </select>
                    </div>

                    <!-- Room Description -->
                    <div class="mb-3">
                        <label for="room_description" class="form-label">Room Description</label>
                        <textarea name="room_description" id="room_description" class="form-control" rows="4">{{ $room->room_description }}</textarea>
                    </div>

                    <!-- Room Images -->
                    <div class="mb-3">
                        <label for="room_images" class="form-label">Room Images</label>
                        <input type="file" name="room_images[]" id="room_images" class="form-control" multiple>
                        <small class="text-muted">Upload new images if you want to replace the existing ones.</small>
                        <div class="mt-3">
                            <strong>Current Images:</strong>
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @if ($room->room_image)
                                    @foreach (json_decode($room->room_image, true) as $image)
                                        <div class="position-relative">
                                            <img src="{{ asset($image) }}" alt="Room Image" class="img-thumbnail"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <!-- Delete Image Button -->
                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                onclick="deleteImage('{{ $image }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Room</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for confirming image deletion -->
    <div id="deleteImageModal" class="modal fade" tabindex="-1" aria-labelledby="deleteImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteImageModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this image?
                </div>
                <div class="modal-footer">
                    <form id="deleteImageForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="image" id="deleteImagePath">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function deleteImage(imagePath) {
        const form = document.getElementById('deleteImageForm');
        const imagePathInput = document.getElementById('deleteImagePath');
        imagePathInput.value = imagePath;
        const deleteImageModal = new bootstrap.Modal(document.getElementById('deleteImageModal'));
        deleteImageModal.show();
    }
</script>
