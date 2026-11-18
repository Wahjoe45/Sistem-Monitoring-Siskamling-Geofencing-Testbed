
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Sistem Monitoring Keamanan Lingkungan</title>

    <!-- Font Awesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
          rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">

                        <div class="p-5">

                            <!-- Header -->
                            <div class="text-center mb-4">

                                <div class="mb-3">
                                    <i class="fas fa-book-reader fa-3x text-primary"></i>
                                </div>

                                <h1 class="h4 text-gray-900 mb-2">
                                    Selamat Datang!
                                </h1>

                                <p class="text-gray-600">
                                    Silakan login untuk melanjutkan.
                                </p>

                            </div>

                            <!-- Login Form -->
                            <form action="{{ route('login') }}" method="POST">

                                @csrf

                                <!-- Email -->
                                <div class="form-group mb-3">

                                    <label for="username" class="text-gray-700">
                                        Username
                                    </label>

                                    <input type="username"
                                           name="username"
                                           id="username"
                                           class="form-control form-control-user @error('username') is-invalid @enderror"
                                           placeholder="Masukkan username"
                                           value="{{ old('username') }}"
                                           required autofocus>

                                    @error('username')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">

                                    <label for="password" class="text-gray-700">
                                        Password
                                    </label>

                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="form-control form-control-user @error('password') is-invalid @enderror"
                                           placeholder="Masukkan password"
                                           required>

                                    @error('password')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Login Button -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Login
                                </button>

                            </form>

                            <hr>

                            <!-- Footer -->
                            <div class="text-center">
                                <small class="text-gray-500">
                                    &copy; Sistem Monitoring Keamanan Lingkungan {{ date('Y') }}
                                </small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
