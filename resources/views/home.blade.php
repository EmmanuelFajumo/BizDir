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
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
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

    <!-- CATEGORIES -->
    <section class="section-padding categories-section" aria-label="Categories">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">Categories</span>
                <h2 class="section-title">Browse by Category</h2>
                <p class="section-subtitle mx-auto">Explore thousands of businesses across popular categories.</p>
            </div>

            <div class="row g-3">
                @php
                    $categories = [
                        ['icon' => 'bi-shop', 'name' => 'Restaurants', 'count' => '1,245'],
                        ['icon' => 'bi-building', 'name' => 'Hotels', 'count' => '892'],
                        ['icon' => 'bi-hospital', 'name' => 'Hospitals', 'count' => '567'],
                        ['icon' => 'bi-book', 'name' => 'Schools', 'count' => '423'],
                        ['icon' => 'bi-house-door', 'name' => 'Real Estate', 'count' => '756'],
                        ['icon' => 'bi-tools', 'name' => 'Mechanics', 'count' => '345'],
                        ['icon' => 'bi-briefcase', 'name' => 'Lawyers', 'count' => '289'],
                        ['icon' => 'bi-bag', 'name' => 'Shopping', 'count' => '1,102'],
                        ['icon' => 'bi-scissors', 'name' => 'Beauty', 'count' => '678'],
                        ['icon' => 'bi-cpu', 'name' => 'Technology', 'count' => '934'],
                        ['icon' => 'bi-truck', 'name' => 'Logistics', 'count' => '512'],
                        ['icon' => 'bi-camera', 'name' => 'Photography', 'count' => '387'],
                    ];
                @endphp
                @foreach ($categories as $cat)
                    <div class="col-6 col-md-4 col-lg-2 fade-in-up" style="animation-delay: {{ $loop->index * 0.05 }}s">
                        <a href="#" class="category-item">
                            <div class="icon-box">
                                <i class="bi {{ $cat['icon'] }}"></i>
                            </div>
                            <h6>{{ $cat['name'] }}</h6>
                            <small>{{ $cat['count'] }} listings</small>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FEATURED BUSINESSES -->
    <section class="section-padding featured-section" aria-label="Featured businesses">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-5">
                <div>
                    <span class="section-label"><i class="bi bi-star-fill"></i> Featured</span>
                    <h2 class="section-title">Top <span class="gradient-text">Businesses</span></h2>
                    <p class="section-subtitle">Hand-picked and verified for quality.</p>
                </div>
                <a href="#" class="btn btn-gradient-outline rounded-pill px-4">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse ($businesses as $biz)
                    @php
                        $rating = round($biz->reviews_avg_rating ?? 0, 1);
                        $reviewCount = $biz->reviews_count ?? 0;
                    @endphp
                    <div class="col-md-6 col-lg-4 fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="business-card">
                            <div class="position-relative overflow-hidden">
                                @if ($biz->cover_image)
                                    <img src="{{ Storage::url($biz->cover_image) }}" class="card-img-top" alt="{{ $biz->name }}" loading="lazy" style="height:200px;object-fit:cover;">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height:200px;">
                                        <i class="bi bi-building text-muted" style="font-size:3rem;"></i>
                                    </div>
                                @endif
                                <span class="badge-verified position-absolute top-0 end-0 m-3">
                                    <i class="bi bi-check-circle-fill me-1"></i>Verified
                                </span>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    @if ($biz->logo)
                                        <img src="{{ Storage::url($biz->logo) }}" alt="{{ $biz->name }} logo" class="logo-sm" loading="lazy">
                                    @else
                                        <div class="logo-sm d-flex align-items-center justify-content-center bg-light rounded-circle">
                                            <i class="bi bi-building text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">{{ $biz->name }}</h6>
                                        <div class="d-flex gap-2 small text-muted flex-wrap">
                                            @if ($biz->category)
                                                <span><i class="bi bi-shop me-1"></i>{{ $biz->category->name }}</span>
                                            @endif
                                            @if ($biz->state)
                                                <span><i class="bi bi-geo-alt me-1"></i>{{ $biz->state->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($rating))
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($i - $rating < 1 && $rating > 0)
                                                <i class="bi bi-star-half"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="rating-number">{{ $rating > 0 ? $rating : 'N/A' }}</span>
                                    <span class="review-count">({{ $reviewCount }} {{ Str::plural('review', $reviewCount) }})</span>
                                </div>
                                @if ($biz->description)
                                    <p class="text-muted small mb-3">{{ Str::limit($biz->description, 100) }}</p>
                                @endif
                                <a href="{{ route('view', $biz->id) }}" class="btn btn-gradient w-100 rounded-pill">
                                    View Details <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-building text-muted" style="font-size:3rem;"></i>
                        <p class="text-muted mt-3">No featured businesses yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="section-padding stats-section" aria-label="Statistics">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @php
                    $stats = [
                        ['icon' => 'bi-building', 'number' => '12,500+', 'label' => 'Listed Businesses'],
                        ['icon' => 'bi-people', 'number' => '85,000+', 'label' => 'Active Users'],
                        ['icon' => 'bi-chat-square-text', 'number' => '45,000+', 'label' => 'Total Reviews'],
                        ['icon' => 'bi-geo-alt', 'number' => '250+', 'label' => 'Cities Covered'],
                    ];
                @endphp
                @foreach ($stats as $stat)
                    <div class="col-6 col-lg-3 fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="stat-item">
                            <div class="stat-icon"><i class="bi {{ $stat['icon'] }}"></i></div>
                            <div class="stat-number">{{ $stat['number'] }}</div>
                            <div class="stat-label">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="section-padding steps-section" aria-label="How it works">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label"><i class="bi bi-gear"></i> How It Works</span>
                <h2 class="section-title">Get Started in <span class="gradient-text">3 Steps</span></h2>
                <p class="section-subtitle mx-auto">Join thousands of businesses and customers already using BizDir.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @php
                    $steps = [
                        ['icon' => 'bi-search', 'title' => 'Search', 'desc' => 'Browse thousands of businesses by category, location, or keyword.'],
                        ['icon' => 'bi-star', 'title' => 'Compare', 'desc' => 'Read reviews, check ratings, and find the perfect business.'],
                        ['icon' => 'bi-chat', 'title' => 'Connect', 'desc' => 'Contact businesses directly and get the services you need.'],
                    ];
                @endphp
                @foreach ($steps as $step)
                    <div class="col-md-4 fade-in-up" style="animation-delay: {{ $loop->index * 0.15 }}s">
                        <div class="step-card">
                            <div class="step-number-badge">
                                <i class="bi {{ $step['icon'] }}"></i>
                            </div>
                            <h5>{{ $step['title'] }}</h5>
                            <p>{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section-padding cta-section" aria-label="Call to action">
        <div class="container position-relative z-1">
            <div class="row align-items-center g-4">
                <div class="col-lg-8 text-center text-lg-start">
                    <h2>Ready to Grow Your Business?</h2>
                    <p class="mb-0">Join thousands of successful businesses on BizDir and start reaching more customers today.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="#" class="btn btn-cta btn-lg">
                        Get Started <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
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
                    <p class="copyright mb-0">Built with <i class="bi bi-heart-fill" style="color: var(--biz-danger);"></i> for local businesses</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
