<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BizDir - Discover and connect with top local businesses in your area.">
    <title>BizDir - Local Business Directory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Home CSS -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top glass" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-building me-2"></i>BizDir
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Locations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-gradient-outline btn-sm rounded-pill px-4">Login</a>
                    <a href="#" class="btn btn-gradient btn-sm rounded-pill px-4">
                        <i class="bi bi-plus-lg me-1"></i>Add Business
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <!-- HERO - Full-Width Banner -->
    <section class="hero-section" aria-label="Hero" style="background-image: url(/assets/hero.jfif);">
        <div class="hero-content">
            <div class="hero-badge">
                Trusted by 5000+ businesses
            </div>
            <h1 class="hero-title">
                Discover the Best<br>
                <span class="gradient-text">Local Businesses</span><br>
                Near You
            </h1>
            <p class="hero-description">
                Find trusted local services, read authentic reviews, and connect with top-rated businesses in your area.
            </p>
        </div>
    </section>

    <!-- SEARCH - Below Hero -->
    <section class="search-section" aria-label="Search businesses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="search-box">
                        <form  method="POST" action={{ route('browse') }} class="row g-2 g-lg-3 align-items-center">
                            @csrf
                            <div class="col-12 col-md-5">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Search businesses...">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <select class="form-select">
                                    <option selected disabled>Category</option>
                                    @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-2">
                                <select class="form-select">
                                    <option selected disabled>Location</option>
                                    @foreach ($states as $state)
                                    <option value={{ $state->id }}> {{ $state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-gradient w-100" type="submit">
                                    <i class="bi bi-search me-1"></i>Search
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="tags-wrapper">
                        <span class="tag-label">Popular:</span>
                        <a href="#" class="tag-pill">Restaurants</a>
                        <a href="#" class="tag-pill">Hotels</a>
                        <a href="#" class="tag-pill">Doctors</a>
                        <a href="#" class="tag-pill">Plumbers</a>
                        <a href="#" class="tag-pill">Mechanics</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES - From Database -->
    <section class="section-padding categories-section" aria-label="Categories">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">Categories</span>
                <h2 class="section-title">Browse by Category</h2>
                <p class="section-subtitle mx-auto">Explore businesses across all categories.</p>
            </div>

            <div class="row g-3">
                @forelse ($categories as $category)
                    @php
                        $businessCount = $category->businesses()->count();
                    @endphp
                    <div class="col-6 col-md-4 col-lg-2 fade-in-up" style="animation-delay: {{ $loop->index * 0.05 }}s">
                        <a href="{{ route('browse', ['category_id' => $category->id]) }}" class="category-item">
                            <div class="icon-box">
                                @if ($category->icon)
                                    <i class="bi {{ $category->icon }}"></i>
                                @else
                                    <i class="bi bi-shop"></i>
                                @endif
                            </div>
                            <h6>{{ $category->name }}</h6>
                            <small>{{ $businessCount }} {{ Str::plural('listing', $businessCount) }}</small>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-grid-3x3-gap text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-3">No categories available yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer" aria-label="Footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand mb-3">
                        <i class="bi bi-building me-2"></i>BizDir
                    </div>
                    <p class="footer-desc">Your trusted local business directory. Discover, connect, and grow with thousands of businesses in your area.</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6>Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Restaurants</a></li>
                        <li><a href="#">Hotels</a></li>
                        <li><a href="#">Hospitals</a></li>
                        <li><a href="#">Schools</a></li>
                        <li><a href="#">Real Estate</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6>Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">Report</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6>Contact</h6>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="bi bi-geo-alt me-1"></i> Lagos, Nigeria</a></li>
                        <li><a href="mailto:info@bizdir.com"><i class="bi bi-envelope me-1"></i> info@bizdir.com</a></li>
                        <li><a href="tel:+2348000000000"><i class="bi bi-telephone me-1"></i> +234 800 000 0000</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="copyright mb-0">&copy; {{ date('Y') }} BizDir. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="copyright mb-0">Built with <i class="bi bi-heart-fill" style="color: var(--biz-danger);"></i> by <a href='https://www.linkedin.com/in/emmanuel-fajumo-5799b8223/' target="_blank">Emmanuel Fajumo</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
