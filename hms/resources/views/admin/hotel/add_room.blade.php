<x-app-layout>
    <div class="m-4 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-center mb-4">Add New Room</h1>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hotel.rooms.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <!-- Room Details Column -->
                                <div class="col-md-6">
                                    <!-- Room Number -->
                                    <div class="mb-3">
                                        <label for="room_number" class="form-label">Room Number</label>
                                        <input type="text" name="room_number" id="room_number" class="form-control"
                                            placeholder="E.g., 101A" required>
                                    </div>

                                    <!-- Room Type -->
                                    <div class="mb-3">
                                        <label for="room_type" class="form-label">Room Type</label>
                                        <select name="room_type" id="room_type" class="form-select" required>
                                            <option value="single">Single</option>
                                            <option value="double">Double</option>
                                            <option value="suite">Suite</option>
                                            <option value="deluxe">Deluxe</option>
                                            <option value="penthouse">Penthouse</option>
                                        </select>
                                    </div>

                                    <!-- Room Price -->
                                    <div class="mb-3">
                                        <label for="room_price" class="form-label">Price Per Night (৳)</label>
                                        <input type="number" name="room_price" id="room_price" class="form-control"
                                            placeholder="E.g., 5000" required>
                                    </div>

                                    <!-- Room Status -->
                                    <div class="mb-3">
                                        <label for="room_status" class="form-label">Room Status</label>
                                        <select name="room_status" id="room_status" class="form-select" required>
                                            <option value="available">Available</option>
                                            <option value="booked">Booked</option>
                                        </select>
                                    </div>

                                    <!-- Room Description -->
                                    <div class="mb-3">
                                        <label for="room_description" class="form-label">Room Description</label>
                                        <textarea name="room_description" class="form-control" rows="4" placeholder="Enter room details, features, etc."
                                            required></textarea>
                                    </div>

                                </div>

                                <!-- Room Features Column -->
                                <div class="col-md-6">
                                    <!-- Room Images -->
                                    <div id="imageContainer">
                                        <div class="mb-3">
                                            <label for="room_images" class="form-label">Room Images</label>
                                            <input type="file" name="room_images[]" class="form-control"
                                                onchange="previewMultipleImages(event)" required>
                                        </div>
                                    </div>

                                    <!-- Button to Add More Image Fields -->
                                    <button type="button" class="btn btn-secondary" onclick="addImageField()">Add More
                                        Images</button>

                                    <!-- Images Preview -->
                                    <div id="imagePreviewContainer" class="d-flex flex-wrap gap-2 mt-3"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">Add Room</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Preview Multiple Images -->
    <script>
        function previewMultipleImages(event) {
            const container = document.getElementById('imagePreviewContainer');
            const files = event.target.files;

            if (files) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = "Room Image";
                        img.className = "img-thumbnail";
                        img.style = "width: 100px; height: 100px; object-fit: cover;";
                        container.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        function addImageField() {
            const container = document.getElementById('imageContainer');
            const newField = document.createElement('div');
            newField.classList.add('mb-3');
            newField.innerHTML = `
                <label for="room_images" class="form-label">Room Images</label>
                <input type="file" name="room_images[]" class="form-control" onchange="previewMultipleImages(event)">
            `;
            container.appendChild(newField);
        }
    </script>
</x-app-layout>
