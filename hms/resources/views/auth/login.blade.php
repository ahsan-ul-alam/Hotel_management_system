<x-frontend-layout>

    <style>
        body {
            background-color: #f7f7f7;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 50px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-4 bg-white p-5 rounded shadow-lg">
            <h2 class="text-center text-dark mb-4">Login to Your Account</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-4">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label text-muted">Remember me</label>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-right mb-4">
                    @if (Route::has('password.request'))
                        <a class="text-muted" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom w-100 btn-lg">Log in</button>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-4">
                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}"
                            class="text-primary">Register</a></p>
                </div>
            </form>
        </div>
    </div>
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
