<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Browse businesses on BizDir - Find local businesses by category, location, or keyword.">
    <title>Browse Businesses - BizDir</title>

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

    <style>
        /* Browse page overrides */
        .browse-hero {
            height: 450px;
        }

        .results-count {
            font-size: 0.95rem;
            color: var(--biz-gray-500);
        }

        .results-count strong {
            color: var(--biz-dark);
        }

        .filter-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid rgba(68, 118, 4, 0.08);
            padding: 1.5rem;
            position: sticky;
            top: 100px;
        }

        .filter-card h6 {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--biz-gray-500);
            margin-bottom: 1rem;
        }

        .filter-card .form-check-label {
            font-size: 0.9rem;
            color: var(--biz-gray-600);
        }

        .filter-card .form-check-input:checked {
            background-color: var(--biz-primary);
            border-color: var(--biz-primary);
        }

        .clear-filter {
            font-size: 0.85rem;
            color: var(--biz-gray-400);
            text-decoration: none;
        }

        .clear-filter:hover {
            color: var(--biz-danger);
        }

        .no-results {
            padding: 4rem 2rem;
            text-align: center;
        }

        .no-results i {
            font-size: 3.5rem;
            color: var(--biz-gray-300);
            margin-bottom: 1rem;
        }

        .no-results h5 {
            color: var(--biz-gray-600);
        }

        .no-results p {
            color: var(--biz-gray-400);
            max-width: 400px;
            margin: 0 auto;
        }

        .pagination .page-link {
            border: none;
            color: var(--biz-gray-600);
            border-radius: 10px !important;
            margin: 0 2px;
            font-size: 0.9rem;
            padding: 0.5rem 0.85rem;
        }

        .pagination .page-link:hover {
            background: var(--biz-primary-light);
            color: var(--biz-primary);
        }

        .pagination .page-item.active .page-link {
            background: var(--gradient-primary);
            color: #fff;
            box-shadow: 0 4px 12px rgba(68, 118, 4, 0.25);
        }

        @media (max-width: 767.98px) {
            .browse-hero {
                height: 350px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top glass" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-building me-2"></i>BizDir
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('browse') }}">Browse</a></li>
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

    <!-- HERO - Browse Banner -->
    <section class="hero-section browse-hero" aria-label="Browse" style="background-image: url('https://picsum.photos/seed/browse-bizdir/1920/900');">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="bi bi-search"></i>
                Find the Right Business
            </div>
            <h1 class="hero-title" style="font-size: clamp(2rem, 4vw, 3rem);">
                Browse <span class="gradient-text">Businesses</span>
            </h1>
            <p class="hero-description">
                Search by category, location, or keyword to find exactly what you need.
            </p>
        </div>
    </section>

    <!-- SEARCH FORM -->
    <section class="search-section" aria-label="Search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <form method="GET" action="{{ route('browse') }}" class="search-box">
                        <div class="row g-2 g-lg-3 align-items-center">
                            <div class="col-12 col-md-5">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search text-muted"></i></span>
                                    <input type="text" name="keyword" class="form-control" placeholder="Search businesses..." value="{{ request('keyword') }}">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <select name="category_id" class="form-select">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-2">
                                <select name="state_id" class="form-select">
                                    <option value="">All Locations</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-gradient w-100" type="submit">
                                    <i class="bi bi-search me-1"></i>Search
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="tags-wrapper">
                        <span class="tag-label">Popular:</span>
                        @foreach ($categories->take(6) as $cat)
                            <a href="{{ route('browse', ['category_id' => $cat->id]) }}" class="tag-pill">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RESULTS -->
    <section class="section-padding" style="padding-top: 2rem; background: #fff;" aria-label="Search results">
        <div class="container">
            <!-- Results Header -->
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div class="results-count">
                    @if ($businesses->total() > 0)
                        <strong>{{ $businesses->total() }}</strong> business{{ $businesses->total() !== 1 ? 'es' : '' }} found
                        @if (request('keyword'))
                            for "<strong>{{ request('keyword') }}</strong>"
                        @endif
                    @else
                        No businesses found
                    @endif
                </div>
                @if (request('category_id') || request('state_id') || request('keyword'))
                    <a href="{{ route('browse') }}" class="clear-filter">
                        <i class="bi bi-x-circle me-1"></i>Clear filters
                    </a>
                @endif
            </div>

            @if ($businesses->count() > 0)
                <div class="row g-4">
                    @foreach ($businesses as $business)
                        <div class="col-md-6 col-lg-4 fade-in-up">
                            <div class="business-card">
                                <div class="position-relative overflow-hidden">
                                    @if ($business->cover_image)
                                        <img src="{{ Storage::url($business->cover_image) }}" alt="{{ $business->name }}" class="card-img-top" loading="lazy">
                                    @else
                                        <img src="https://picsum.photos/seed/biz-{{ $business->id }}/600/300" alt="{{ $business->name }}" class="card-img-top" loading="lazy">
                                    @endif
                                    <span class="badge-verified position-absolute top-0 end-0 m-3">
                                        <i class="bi bi-check-circle-fill me-1"></i>Verified
                                    </span>
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start gap-3 mb-3">
                                        @if ($business->logo)
                                            <img src="{{ Storage::url($business->logo) }}" alt="Logo" class="logo-sm" loading="lazy">
                                        @else
                                            <div class="logo-sm d-flex align-items-center justify-content-center" style="background: var(--biz-primary-light);">
                                                <i class="bi bi-building" style="color: var(--biz-primary);"></i>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-1">{{ $business->name }}</h6>
                                            <div class="d-flex gap-2 small text-muted">
                                                <span><i class="bi bi-shop me-1"></i>{{ $business->category->name ?? 'Uncategorized' }}</span>
                                                <span><i class="bi bi-geo-alt me-1"></i>{{ $business->state->name ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted small mb-3">{{ Str::limit($business->description, 100) }}</p>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-gradient w-100 rounded-pill btn-sm">
                                            View Details <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                        <a href="tel:{{ $business->phone }}" class="btn btn-gradient-outline rounded-pill btn-sm" style="flex-shrink: 0;">
                                            <i class="bi bi-telephone"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $businesses->links() }}
                </div>
            @else
                <!-- No Results -->
                <div class="no-results">
                    <i class="bi bi-search"></i>
                    <h5>No businesses found</h5>
                    <p>Try adjusting your search filters or browsing a different category or location.</p>
                    <a href="{{ route('browse') }}" class="btn btn-gradient rounded-pill px-4 mt-3">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset Filters
                    </a>
                </div>
            @endif
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
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('browse') }}">Browse</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6>Categories</h6>
                    <ul class="list-unstyled">
                        @foreach ($categories->take(5) as $cat)
                            <li><a href="{{ route('browse', ['category_id' => $cat->id]) }}">{{ $cat->name }}</a></li>
                        @endforeach
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
                    <p class="copyright mb-0">Built with <i class="bi bi-heart-fill" style="color: var(--biz-danger);"></i> for local businesses</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
