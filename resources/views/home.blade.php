<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="BizDir - Discover and connect with top local businesses. Find restaurants, hotels, services and more in your area.">
    <meta name="keywords" content="business directory, local businesses, find services, business listings">
    <meta name="author" content="BizDir">
    <meta property="og:title" content="BizDir - Your Local Business Directory">
    <meta property="og:description" content="Discover and connect with top local businesses in your area.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bizdir.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>BizDir - Your Local Business Directory</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Google Fonts: Poppins + Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body>

    <!-- ============================================================ -->
    <!-- 1. STICKY NAVIGATION -->
    <!-- ============================================================ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" id="mainNav" aria-label="Main navigation">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-building text-primary me-2"></i>BizDir
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route("login") }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Login</a>
                    <a href="{{ route("register") }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3 d-none d-md-inline-block">Register</a>
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-3">
                        <i class="bi bi-plus-lg me-1"></i>Post Business
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ============================================================ -->
    <!-- 2. HERO SECTION -->
    <!-- ============================================================ -->
    <section class="hero-section position-relative overflow-hidden" aria-label="Hero">
        <div class="container position-relative z-1">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">
                        <i class="bi bi-star-fill me-1"></i> Trusted by 10,000+ businesses
                    </span>
                    <h1 class="display-4 fw-bold mb-3">
                        Discover the Best <span class="text-primary">Local Businesses</span> Near You
                    </h1>
                    <p class="lead text-muted mb-4">
                        Find trusted local services, read reviews, and connect with top-rated businesses in your area. Your search for quality services ends here.
                    </p>

                    <!-- Search Bar -->
                    <div class="search-wrapper bg-white rounded-4 shadow-lg p-3">
                        <form class="row g-2 g-lg-3" role="search" aria-label="Business search">
                            <div class="col-12 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-end-0">
                                        <i class="bi bi-search text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Search businesses..." aria-label="Search by keyword">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <select class="form-select" aria-label="Select category">
                                    <option value="" selected disabled>All Categories</option>
                                    <option value="restaurants">Restaurants</option>
                                    <option value="hotels">Hotels</option>
                                    <option value="hospitals">Hospitals</option>
                                    <option value="schools">Schools</option>
                                    <option value="real-estate">Real Estate</option>
                                    <option value="mechanics">Mechanics</option>
                                    <option value="lawyers">Lawyers</option>
                                    <option value="shopping">Shopping</option>
                                    <option value="beauty">Beauty</option>
                                    <option value="technology">Technology</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <select class="form-select" aria-label="Select location">
                                    <option value="" selected disabled>All Locations</option>
                                    <option value="new-york">New York</option>
                                    <option value="los-angeles">Los Angeles</option>
                                    <option value="chicago">Chicago</option>
                                    <option value="houston">Houston</option>
                                    <option value="miami">Miami</option>
                                    <option value="san-francisco">San Francisco</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-search"></i>
                                    <span>Search</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Popular Tags -->
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-4">
                        <span class="text-muted small fw-medium">Popular:</span>
                        <a href="#" class="badge bg-light text-dark text-decoration-none rounded-pill px-3 py-2">Restaurants</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none rounded-pill px-3 py-2">Hotels</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none rounded-pill px-3 py-2">Doctors</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none rounded-pill px-3 py-2">Plumbers</a>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-illustration position-relative text-center">
                        <img src="https://picsum.photos/seed/hero/600/500" alt="Business directory illustration" class="img-fluid rounded-4 shadow-lg" loading="lazy">
                        <!-- Floating badges -->
                        <div class="floating-badge position-absolute top-0 start-0 bg-white rounded-3 shadow p-3 d-none d-md-block">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                <div>
                                    <small class="fw-bold d-block">4.8 Rating</small>
                                    <small class="text-muted">2.5k reviews</small>
                                </div>
                            </div>
                        </div>
                        <div class="floating-badge position-absolute bottom-0 end-0 bg-white rounded-3 shadow p-3 d-none d-md-block">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-building text-primary fs-5"></i>
                                <div>
                                    <small class="fw-bold d-block">10,000+</small>
                                    <small class="text-muted">Businesses</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background decoration -->
        <div class="hero-bg-shape position-absolute top-0 end-0 w-50 h-100 bg-primary bg-opacity-5 rounded-start-5 d-none d-lg-block" aria-hidden="true"></div>
    </section>

    <!-- ============================================================ -->
    <!-- 3. POPULAR CATEGORIES -->
    <!-- ============================================================ -->
    <section class="section-padding bg-white" aria-label="Popular categories">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Categories</span>
                <h2 class="display-6 fw-bold mb-3">Browse by <span class="text-primary">Category</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Explore thousands of businesses across popular categories in your area.</p>
            </div>

            <div class="row g-4">
                <!-- Category 1 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="0">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-shop fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Restaurants</h6>
                            <small class="text-muted">1,245 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 2 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="50">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-building fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Hotels</h6>
                            <small class="text-muted">892 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 3 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-hospital fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Hospitals</h6>
                            <small class="text-muted">567 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 4 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="150">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-book fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Schools</h6>
                            <small class="text-muted">423 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 5 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-house-door fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Real Estate</h6>
                            <small class="text-muted">756 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 6 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="250">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-tools fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Mechanics</h6>
                            <small class="text-muted">345 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 7 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-briefcase fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Lawyers</h6>
                            <small class="text-muted">289 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 8 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="350">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-bag fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Shopping</h6>
                            <small class="text-muted">1,102 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 9 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-scissors fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Beauty</h6>
                            <small class="text-muted">678 listings</small>
                        </div>
                    </a>
                </div>

                <!-- Category 10 -->
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="450">
                    <a href="#" class="category-card text-decoration-none d-block">
                        <div class="card border-0 bg-light rounded-4 text-center p-4 h-100 transition-hover">
                            <div class="category-icon mx-auto mb-3">
                                <i class="bi bi-cpu fs-1 text-primary"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Technology</h6>
                            <small class="text-muted">934 listings</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 4. FEATURED BUSINESSES -->
    <!-- ============================================================ -->
    <section class="section-padding bg-light" aria-label="Featured businesses">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-5" data-aos="fade-up">
                <div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Featured</span>
                    <h2 class="display-6 fw-bold mb-2">Featured <span class="text-primary">Businesses</span></h2>
                    <p class="text-muted mb-0">Hand-picked top-rated businesses for you.</p>
                </div>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 mt-3 mt-md-0">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                <!-- Business Card 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden business-card">
                        <div class="position-relative">
                            <img src="https://picsum.photos/seed/biz1/600/300" alt="The Golden Dragon Restaurant" class="card-img-top business-img" loading="lazy">
                            <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>Verified
                            </span>
                            <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark rounded-pill px-3 py-2">
                                <i class="bi bi-clock me-1"></i>Open Now
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="https://picsum.photos/seed/logo1/60/60" alt="The Golden Dragon logo" class="rounded-3 border" width="50" height="50" loading="lazy">
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1">The Golden Dragon</h5>
                                    <div class="d-flex flex-wrap align-items-center gap-2 small text-muted">
                                        <span><i class="bi bi-shop me-1"></i>Restaurant</span>
                                        <span><i class="bi bi-geo-alt me-1"></i>New York</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <span class="fw-semibold">4.5</span>
                                <span class="text-muted">(128 reviews)</span>
                            </div>
                            <p class="text-muted small mb-3">Authentic Chinese cuisine with a modern twist. Family-owned since 1995.</p>
                            <a href="#" class="btn btn-primary w-100 rounded-pill">View Details <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Business Card 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden business-card">
                        <div class="position-relative">
                            <img src="https://picsum.photos/seed/biz2/600/300" alt="Grand Plaza Hotel" class="card-img-top business-img" loading="lazy">
                            <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>Verified
                            </span>
                            <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark rounded-pill px-3 py-2">
                                <i class="bi bi-clock me-1"></i>Open Now
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="https://picsum.photos/seed/logo2/60/60" alt="Grand Plaza Hotel logo" class="rounded-3 border" width="50" height="50" loading="lazy">
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1">Grand Plaza Hotel</h5>
                                    <div class="d-flex flex-wrap align-items-center gap-2 small text-muted">
                                        <span><i class="bi bi-building me-1"></i>Hotel</span>
                                        <span><i class="bi bi-geo-alt me-1"></i>Los Angeles</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="fw-semibold">5.0</span>
                                <span class="text-muted">(342 reviews)</span>
                            </div>
                            <p class="text-muted small mb-3">Luxury 5-star hotel offering premium accommodations and world-class amenities.</p>
                            <a href="#" class="btn btn-primary w-100 rounded-pill">View Details <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Business Card 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden business-card">
                        <div class="position-relative">
                            <img src="https://picsum.photos/seed/biz3/600/300" alt="City Medical Center" class="card-img-top business-img" loading="lazy">
                            <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>Verified
                            </span>
                            <span class="position-absolute top-0 start-0 m-3 badge bg-secondary rounded-pill px-3 py-2">
                                <i class="bi bi-clock me-1"></i>Closed Now
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="https://picsum.photos/seed/logo3/60/60" alt="City Medical Center logo" class="rounded-3 border" width="50" height="50" loading="lazy">
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1">City Medical Center</h5>
                                    <div class="d-flex flex-wrap align-items-center gap-2 small text-muted">
                                        <span><i class="bi bi-hospital me-1"></i>Hospital</span>
                                        <span><i class="bi bi-geo-alt me-1"></i>Chicago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                                <span class="fw-semibold">4.0</span>
                                <span class="text-muted">(89 reviews)</span>
                            </div>
                            <p class="text-muted small mb-3">Comprehensive healthcare services with state-of-the-art medical facilities.</p>
                            <a href="#" class="btn btn-primary w-100 rounded-pill">View Details <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 5. WHY CHOOSE US -->
    <!-- ============================================================ -->
    <section class="section-padding bg-white" aria-label="Why choose us">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Why Choose Us</span>
                <h2 class="display-6 fw-bold mb-3">Why BizDir is the <span class="text-primary">Best Choice</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">We make it easy to find, connect, and grow your business with powerful tools and features.</p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-card bg-light rounded-4 p-4 h-100 text-center text-md-start">
                        <div class="feature-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-search-heart fs-3 text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Easy Discovery</h5>
                        <p class="text-muted small mb-0">Find exactly what you need with our powerful search and smart filtering system.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card bg-light rounded-4 p-4 h-100 text-center text-md-start">
                        <div class="feature-icon bg-success bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-shield-check fs-3 text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Verified Listings</h5>
                        <p class="text-muted small mb-0">Every business is verified to ensure you get authentic and reliable services.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card bg-light rounded-4 p-4 h-100 text-center text-md-start">
                        <div class="feature-icon bg-warning bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-star fs-3 text-warning"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Real Reviews</h5>
                        <p class="text-muted small mb-0">Honest feedback from real customers helps you make informed decisions.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card bg-light rounded-4 p-4 h-100 text-center text-md-start">
                        <div class="feature-icon bg-info bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-phone fs-3 text-info"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Mobile Friendly</h5>
                        <p class="text-muted small mb-0">Access the directory anytime, anywhere with our fully responsive design.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 6. HOW IT WORKS -->
    <!-- ============================================================ -->
    <section class="section-padding bg-light" aria-label="How it works">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">How It Works</span>
                <h2 class="display-6 fw-bold mb-3">Get Started in <span class="text-primary">3 Simple Steps</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Join thousands of businesses and customers already using BizDir.</p>
            </div>

            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="text-center">
                        <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <span class="fs-3 fw-bold">1</span>
                        </div>
                        <img src="https://picsum.photos/seed/step1/200/150" alt="Search for businesses" class="img-fluid rounded-3 mb-3 shadow-sm" loading="lazy">
                        <h5 class="fw-bold mb-2">Search</h5>
                        <p class="text-muted small">Browse through thousands of businesses by category, location, or keyword.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="text-center">
                        <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <span class="fs-3 fw-bold">2</span>
                        </div>
                        <img src="https://picsum.photos/seed/step2/200/150" alt="Compare businesses" class="img-fluid rounded-3 mb-3 shadow-sm" loading="lazy">
                        <h5 class="fw-bold mb-2">Compare</h5>
                        <p class="text-muted small">Read reviews, check ratings, and compare businesses side by side.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <span class="fs-3 fw-bold">3</span>
                        </div>
                        <img src="https://picsum.photos/seed/step3/200/150" alt="Connect with businesses" class="img-fluid rounded-3 mb-3 shadow-sm" loading="lazy">
                        <h5 class="fw-bold mb-2">Connect</h5>
                        <p class="text-muted small">Contact businesses directly and get the services you need.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 7. STATISTICS -->
    <!-- ============================================================ -->
    <section class="section-padding bg-primary text-white" aria-label="Statistics">
        <div class="container">
            <div class="row g-4 text-center">
                <!-- Stat 1 -->
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-item">
                        <i class="bi bi-building fs-1 mb-2 d-block"></i>
                        <span class="display-5 fw-bold counter" data-target="12500">0</span>
                        <p class="mb-0 opacity-75">Listed Businesses</p>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <i class="bi bi-people fs-1 mb-2 d-block"></i>
                        <span class="display-5 fw-bold counter" data-target="85000">0</span>
                        <p class="mb-0 opacity-75">Active Users</p>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <i class="bi bi-chat-square-text fs-1 mb-2 d-block"></i>
                        <span class="display-5 fw-bold counter" data-target="45000">0</span>
                        <p class="mb-0 opacity-75">Total Reviews</p>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <i class="bi bi-geo-alt fs-1 mb-2 d-block"></i>
                        <span class="display-5 fw-bold counter" data-target="250">0</span>
                        <p class="mb-0 opacity-75">Cities Covered</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 8. TESTIMONIALS -->
    <!-- ============================================================ -->
    <section class="section-padding bg-white" aria-label="Testimonials">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Testimonials</span>
                <h2 class="display-6 fw-bold mb-3">What Our <span class="text-primary">Users Say</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Hear from business owners and customers who love using BizDir.</p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center bg-light rounded-4 p-5">
                                    <img src="https://picsum.photos/seed/avatar1/100/100" alt="Sarah Johnson" class="rounded-circle mb-4 shadow-sm" width="80" height="80" loading="lazy">
                                    <i class="bi bi-quote fs-1 text-primary opacity-25 d-block mb-3"></i>
                                    <p class="lead fw-medium mb-4">"BizDir completely transformed how I find local services. The verified listings and real reviews give me confidence in every choice I make. Highly recommended!"</p>
                                    <h6 class="fw-bold mb-1">Sarah Johnson</h6>
                                    <small class="text-muted">Small Business Owner</small>
                                    <div class="text-warning mt-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center bg-light rounded-4 p-5">
                                    <img src="https://picsum.photos/seed/avatar2/100/100" alt="Michael Chen" class="rounded-circle mb-4 shadow-sm" width="80" height="80" loading="lazy">
                                    <i class="bi bi-quote fs-1 text-primary opacity-25 d-block mb-3"></i>
                                    <p class="lead fw-medium mb-4">"As a business owner, listing on BizDir was the best decision. I've seen a 40% increase in customer inquiries since joining. The platform is incredibly user-friendly."</p>
                                    <h6 class="fw-bold mb-1">Michael Chen</h6>
                                    <small class="text-muted">Restaurant Owner</small>
                                    <div class="text-warning mt-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center bg-light rounded-4 p-5">
                                    <img src="https://picsum.photos/seed/avatar3/100/100" alt="Emily Rodriguez" class="rounded-circle mb-4 shadow-sm" width="80" height="80" loading="lazy">
                                    <i class="bi bi-quote fs-1 text-primary opacity-25 d-block mb-3"></i>
                                    <p class="lead fw-medium mb-4">"I love how easy it is to find exactly what I need. The category filters and location search save me so much time. This is my go-to directory for everything!"</p>
                                    <h6 class="fw-bold mb-1">Emily Rodriguez</h6>
                                    <small class="text-muted">Freelance Designer</small>
                                    <div class="text-warning mt-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

                <!-- Carousel Indicators -->
                <div class="carousel-indicators position-static mt-4">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active bg-primary" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" class="bg-primary" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" class="bg-primary" aria-label="Slide 3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 9. PRICING PLANS -->
    <!-- ============================================================ -->
    <section class="section-padding bg-light" aria-label="Pricing plans">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Pricing</span>
                <h2 class="display-6 fw-bold mb-3">Simple, <span class="text-primary">Transparent</span> Pricing</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Choose the perfect plan for your business. No hidden fees, no surprises.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Free Plan -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <i class="bi bi-gem fs-1 text-muted mb-3 d-block"></i>
                            <h4 class="fw-bold mb-1">Free</h4>
                            <p class="text-muted small mb-3">Perfect for getting started</p>
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-primary">$0</span>
                                <span class="text-muted">/month</span>
                            </div>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>1 Business Listing</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Basic Analytics</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Standard Support</li>
                                <li class="mb-2 text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Featured Badge</li>
                                <li class="mb-2 text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Priority Listing</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100 rounded-pill">Get Started</a>
                        </div>
                    </div>
                </div>

                <!-- Premium Plan (Featured) -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-2 border-primary shadow-lg rounded-4 h-100 position-relative">
                        <span class="position-absolute top-0 start-50 translate-middle badge bg-primary rounded-pill px-4 py-2">
                            Most Popular
                        </span>
                        <div class="card-body p-4 text-center pt-5">
                            <i class="bi bi-star-fill fs-1 text-warning mb-3 d-block"></i>
                            <h4 class="fw-bold mb-1">Premium</h4>
                            <p class="text-muted small mb-3">Best for growing businesses</p>
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-primary">$29</span>
                                <span class="text-muted">/month</span>
                            </div>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>5 Business Listings</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Advanced Analytics</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Priority Support</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Featured Badge</li>
                                <li class="mb-2 text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Priority Listing</li>
                            </ul>
                            <a href="#" class="btn btn-primary w-100 rounded-pill">Choose Premium</a>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <i class="bi bi-building fs-1 text-primary mb-3 d-block"></i>
                            <h4 class="fw-bold mb-1">Enterprise</h4>
                            <p class="text-muted small mb-3">For large organizations</p>
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-primary">$99</span>
                                <span class="text-muted">/month</span>
                            </div>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited Listings</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Full Analytics Suite</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>24/7 Dedicated Support</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Featured Badge</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Priority Listing</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100 rounded-pill">Contact Sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 10. CTA BANNER -->
    <!-- ============================================================ -->
    <section class="section-padding cta-section bg-primary text-white position-relative overflow-hidden" aria-label="Call to action">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0" data-aos="fade-right">
                    <h2 class="display-6 fw-bold mb-3">Ready to Grow Your Business?</h2>
                    <p class="lead mb-0 opacity-90">Join thousands of successful businesses on BizDir and start reaching more customers today.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
                    <a href="#" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">
                        Get Started Now <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative circles -->
        <div class="position-absolute top-0 end-0 w-25 h-25 bg-white bg-opacity-10 rounded-circle translate-middle" aria-hidden="true"></div>
        <div class="position-absolute bottom-0 start-0 w-25 h-25 bg-white bg-opacity-10 rounded-circle translate-middle" aria-hidden="true"></div>
    </section>

    <!-- ============================================================ -->
    <!-- 11. LATEST BLOG POSTS -->
    <!-- ============================================================ -->
    <section class="section-padding bg-white" aria-label="Latest blog posts">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-5" data-aos="fade-up">
                <div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3">Blog</span>
                    <h2 class="display-6 fw-bold mb-2">Latest <span class="text-primary">Articles</span></h2>
                    <p class="text-muted mb-0">Tips, insights, and news for business owners.</p>
                </div>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 mt-3 mt-md-0">
                    View All Posts <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                <!-- Blog Post 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <article class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden blog-card">
                        <img src="https://picsum.photos/seed/blog1/600/350" alt="10 Tips for Growing Your Small Business" class="card-img-top" loading="lazy">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 small text-muted mb-3">
                                <span><i class="bi bi-calendar3 me-1"></i>Jan 15, 2026</span>
                                <span><i class="bi bi-clock me-1"></i>5 min read</span>
                            </div>
                            <h5 class="fw-bold mb-2">
                                <a href="#" class="text-dark text-decoration-none stretched-link">10 Tips for Growing Your Small Business in 2026</a>
                            </h5>
                            <p class="text-muted small mb-0">Discover proven strategies to take your small business to the next level this year.</p>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <article class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden blog-card">
                        <img src="https://picsum.photos/seed/blog2/600/350" alt="Digital Marketing Guide" class="card-img-top" loading="lazy">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 small text-muted mb-3">
                                <span><i class="bi bi-calendar3 me-1"></i>Jan 10, 2026</span>
                                <span><i class="bi bi-clock me-1"></i>7 min read</span>
                            </div>
                            <h5 class="fw-bold mb-2">
                                <a href="#" class="text-dark text-decoration-none stretched-link">The Ultimate Guide to Digital Marketing for Local Businesses</a>
                            </h5>
                            <p class="text-muted small mb-0">Learn how to leverage digital marketing to attract more local customers.</p>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <article class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden blog-card">
                        <img src="https://picsum.photos/seed/blog3/600/350" alt="Customer Reviews Importance" class="card-img-top" loading="lazy">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 small text-muted mb-3">
                                <span><i class="bi bi-calendar3 me-1"></i>Jan 5, 2026</span>
                                <span><i class="bi bi-clock me-1"></i>4 min read</span>
                            </div>
                            <h5 class="fw-bold mb-2">
                                <a href="#" class="text-dark text-decoration-none stretched-link">Why Customer Reviews Matter More Than Ever</a>
                            </h5>
                            <p class="text-muted small mb-0">Understand the impact of customer reviews on your business reputation and growth.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 12. NEWSLETTER -->
    <!-- ============================================================ -->
    <section class="section-padding bg-light" aria-label="Newsletter signup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="newsletter-card bg-white rounded-4 shadow-sm p-5 text-center" data-aos="fade-up">
                        <i class="bi bi-envelope-paper fs-1 text-primary mb-3 d-block"></i>
                        <h3 class="fw-bold mb-2">Stay in the Loop</h3>
                        <p class="text-muted mb-4">Subscribe to our newsletter and get the latest business tips, trends, and updates delivered to your inbox.</p>
                        <form class="row g-2 justify-content-center" onsubmit="event.preventDefault();">
                            <div class="col-sm-8 col-md-6">
                                <label for="newsletterEmail" class="visually-hidden">Email address</label>
                                <input type="email" class="form-control form-control-lg" id="newsletterEmail" placeholder="Enter your email address" required>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">Subscribe</button>
                            </div>
                        </form>
                        <small class="text-muted d-block mt-3">
                            <i class="bi bi-shield-check me-1"></i>No spam. Unsubscribe anytime.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 13. FOOTER -->
    <!-- ============================================================ -->
    <footer class="bg-dark text-white pt-5 pb-3" aria-label="Site footer">
        <div class="container">
            <div class="row g-4">
                <!-- Brand -->
                <div class="col-lg-4">
                    <a class="navbar-brand fw-bold fs-4 text-white mb-3 d-inline-block" href="#">
                        <i class="bi bi-building text-primary me-2"></i>BizDir
                    </a>
                    <p class="text-white-50 small mb-3">Your trusted local business directory. Discover, connect, and grow with thousands of businesses in your area.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">FAQ</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Categories</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Restaurants</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Hotels</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Hospitals</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Schools</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Real Estate</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Support</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Help Center</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Cookie Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">Report Issue</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Contact</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2 text-white-50">
                            <i class="bi bi-geo-alt me-1"></i> 123 Business Ave, NY
                        </li>
                        <li class="mb-2">
                            <a href="mailto:info@bizdir.com" class="text-white-50 text-decoration-none hover-white">
                                <i class="bi bi-envelope me-1"></i> info@bizdir.com
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="tel:+1234567890" class="text-white-50 text-decoration-none hover-white">
                                <i class="bi bi-telephone me-1"></i> +1 (234) 567-890
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-white-10 my-4">

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-white-50 mb-0">&copy; 2026 BizDir. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <p class="small text-white-50 mb-0">Made with <i class="bi bi-heart-fill text-danger"></i> for local businesses</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================================ -->
    <!-- BACK TO TOP BUTTON -->
    <!-- ============================================================ -->
    <button id="backToTop" class="btn btn-primary rounded-circle shadow-lg position-fixed" aria-label="Back to top" style="bottom: 30px; right: 30px; width: 50px; height: 50px; display: none; z-index: 1050;">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/home.js') }}"></script>

</body>
</html>
