<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BizDir - Browse business categories to find what you need.">
    <title>Categories - BizDir</title>

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
        /* ── Categories Page Specific ── */
        .categories-header {
            padding: 8rem 0 3rem;
            background: var(--gradient-hero);
            text-align: center;
        }

        .categories-header h1 {
            font-family: var(--font-heading);
            font-weight: 700;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            color: var(--biz-dark);
            margin-bottom: 0.75rem;
        }

        .categories-header p {
            color: var(--biz-gray-500);
            font-size: 1.05rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .categories-section {
            padding: 3rem 0 5rem;
            background: #fff;
        }

        .category-card {
            display: block;
            text-decoration: none;
            background: var(--biz-gray-50);
            border: 1px solid transparent;
            border-radius: 20px;
            padding: 1.75rem 1.5rem;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
        }

        .category-card:hover {
            background: var(--gradient-primary);
            border-color: transparent;
            transform: translateY(-6px);
            box-shadow: 0 15px 40px rgba(68, 118, 4, 0.2);
        }

        .category-card .icon-box {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-primary-soft);
            border-radius: 16px;
            margin: 0 auto 1rem;
            transition: all 0.4s ease;
        }

        .category-card:hover .icon-box {
            background: rgba(255, 255, 255, 0.2);
        }

        .category-card .icon-box i {
            font-size: 1.5rem;
            color: var(--biz-primary);
            transition: all 0.4s ease;
        }

        .category-card:hover .icon-box i {
            color: #fff;
        }

        .category-card h6 {
            font-family: var(--font-heading);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--biz-dark);
            margin-bottom: 0.25rem;
            transition: all 0.4s ease;
        }

        .category-card:hover h6 {
            color: #fff;
        }

        .category-card .count {
            font-size: 0.8rem;
            color: var(--biz-gray-400);
            transition: all 0.4s ease;
        }

        .category-card:hover .count {
            color: rgba(255, 255, 255, 0.8);
        }

        .category-card .description {
            font-size: 0.85rem;
            color: var(--biz-gray-500);
            line-height: 1.5;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .category-card:hover .description {
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 1rem;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--biz-gray-300);
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state p {
            color: var(--biz-gray-400);
            font-size: 0.95rem;
        }

        @media (max-width: 767.98px) {
            .categories-header {
                padding: 6rem 0 2rem;
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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('browse') }}">Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                </ul>
                <div class="d-flex gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-gradient-outline btn-sm rounded-pill px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gradient-outline btn-sm rounded-pill px-4">Login</a>
                        <a href="#" class="btn btn-gradient btn-sm rounded-pill px-4">
                            <i class="bi bi-plus-lg me-1"></i>Add Business
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- ─── Page Header ─── -->
    <div class="categories-header">
        <div class="container">
            <span class="section-label"><i class="bi bi-grid"></i> Browse</span>
            <h1>All Categories</h1>
            <p>Browse businesses by category to find exactly what you're looking for.</p>
        </div>
    </div>

    <!-- ─── Categories Grid ─── -->
    <section class="categories-section" aria-label="Categories">
        <div class="container">
            @if($categories->count() > 0)
                <div class="row g-3">
                    @foreach($categories as $category)
                        <div class="col-6 col-md-4 col-lg-3 fade-in-up" style="animation-delay: {{ $loop->index * 0.05 }}s">
                            <a href="{{ route('category.show', $category) }}" class="category-card">
                                <div class="icon-box">
                                    @if($category->icon)
                                        <i class="bi {{ $category->icon }}"></i>
                                    @else
                                        <i class="bi bi-grid"></i>
                                    @endif
                                </div>
                                <h6>{{ $category->name }}</h6>
                                @if($category->description)
                                    <div class="description">{{ $category->description }}</div>
                                @endif
                                <div class="count">
                                    <i class="bi bi-building me-1"></i>
                                    {{ $category->businesses_count ?? $category->businesses()->count() }} businesses
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state fade-in-up">
                    <i class="bi bi-grid-3x3-gap"></i>
                    <p>No categories available yet.</p>
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
