<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Register Card -->
                <div class="card shadow-lg border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('register.create.user') }}" method="POST">
                            <!-- Full Name -->  
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name <i class="bi bi-person-fill"></i></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                            </div>
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address <i class="bi bi-envelope-fill"></i></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
                            </div>
                            <!-- alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Address <i class="bi bi-envelope-fill"></i></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter your alamat">
                                <div id="alamatHelp" class="form-text text-muted">We'll never share your alamat with anyone else.</div>
                            </div>                            

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <i class="bi bi-lock-fill"></i></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>

                            <!-- Confirm Password -->
                            {{-- <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password <i class="bi bi-lock-fill"></i></label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                            </div> --}}

                            <!-- Terms and Conditions -->
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck">
                                <label class="form-check-label" for="termsCheck">I agree to the <a href="#">terms and conditions</a></label>
                            </div> --}}

                            <!-- Register Button -->
                            <button type="submit" class="btn btn-primary w-100">Register <i class="bi bi-person-plus-fill"></i></button>
                        </form>
                    </div>
                </div>
                <!-- End Register Card -->
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
