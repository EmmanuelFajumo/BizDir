@extends("layouts.main")

@section("register form")
    <!-- REGISTER FORM SECTION -->
    <section class="section-padding d-flex align-items-center justify-content-center" style="min-height: 80vh;" aria-label="Register form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <!-- Header -->
                            <div class="text-center mb-4">
                                <i class="bi bi-person-plus fs-1 text-primary mb-3 d-block"></i>
                                <h3 class="fw-bold mb-1">Create Account</h3>
                                <p class="text-muted small">Join BizDir today — it's free</p>
                            </div>

                            <!-- Registration Form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="firstname" class="form-label fw-medium small">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0 @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" placeholder="John" required autocomplete="firstname" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- LastName --}}
                                <div class="mb-3">
                                    <label for="lastname" class="form-label fw-medium small">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0 @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Doe" required autocomplete="lastname" autofocus>
                                        @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-medium small">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope text-muted"></i>
                                        </span>
                                        <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autocomplete="email">
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
                                        <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Min. 8 characters" required autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-medium small">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-lock-fill text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control border-start-0" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Terms & Conditions -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="terms">
                                        I agree to the
                                        <a href="#" class="text-decoration-none">Terms of Service</a>
                                        and
                                        <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                    @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold mb-3">
                                    <i class="bi bi-person-plus me-2"></i>Create Account
                                </button>

                                <!-- Login Link -->
                                @if (Route::has('login'))
                                    <p class="text-center text-muted small mb-0">
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="text-decoration-none fw-medium">Sign in</a>
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
