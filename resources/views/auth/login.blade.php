@extends("layouts.main")

@section("login form")
    <!-- LOGIN FORM SECTION -->
    <section class="section-padding d-flex align-items-center justify-content-center" style="min-height: 80vh;" aria-label="Login form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <!-- Header -->
                            <div class="text-center mb-4">
                                <i class="bi bi-box-arrow-in-right fs-1 text-primary mb-3 d-block"></i>
                                <h3 class="fw-bold mb-1">Welcome Back</h3>
                                <p class="text-muted small">Sign in to your BizDir account</p>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-medium small">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope text-muted"></i>
                                        </span>
                                        <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autocomplete="email" autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-medium small">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="small text-decoration-none">Forgot password?</a>
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold mb-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                                </button>

                                <!-- Register Link -->
                                @if (Route::has('register'))
                                    <p class="text-center text-muted small mb-0">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-decoration-none fw-medium">Create one</a>
                                    </p>
                                @endif
                            </form>
                        </div>
                    </div>

                    <!-- Back to Home -->
                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}" class="text-muted small text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i>Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
