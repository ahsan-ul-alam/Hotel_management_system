<x-frontend-layout>

    <div class="container form-container">
        <h2>Create Your Account</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <!-- Name -->
                <div class="form-col">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        placeholder="Enter your full name" value="{{ old('name') }}">
                </div>

                <!-- Mobile -->
                <div class="form-col">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required
                        placeholder="Enter your mobile number" value="{{ old('mobile') }}">
                </div>
            </div>

            <div class="form-row">
                <!-- Email -->
                <div class="form-col">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        placeholder="Enter your email" value="{{ old('email') }}">
                </div>

                <!-- Address -->
                <div class="form-col-2">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address">{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <!-- Image Upload -->
                <div class="form-col-2">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*"
                        onchange="previewImage(event)">
                    <img id="imgPreview" class="img-preview" src="" alt="Image Preview">
                </div>
            </div>

            <div class="form-row">
                <!-- Password -->
                <div class="form-col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Enter your password">
                </div>

                <!-- Confirm Password -->
                <div class="form-col">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required placeholder="Confirm your password">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-custom w-100 mt-4">Register</button>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                </p>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const imgPreview = document.getElementById('imgPreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        function previewImage(event) {
            const imgPreview = document.getElementById('imgPreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>








    {{-- styling  --}}
    <style>
        .form-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
        }

        .img-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 15px;
            border-radius: 10px;
            object-fit: cover;
            display: none;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-col {
            flex: 1;
            min-width: 250px;
        }

        .form-col-2 {
            flex: 2;
        }

        .form-label {
            font-weight: 600;
        }

        .text-muted {
            color: #888;
        }

        .text-center {
            text-align: center;
        }
    </style>
    {{-- styling ends  --}}
</x-frontend-layout>


@foreach ($errors->all() as $error)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ $error }}'
        });
    </script>
@endforeach
