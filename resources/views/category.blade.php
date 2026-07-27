<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BizDir - {{ $category->name }} businesses in your area.">
    <title>{{ $category->name }} - BizDir</title>

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
        /* ── Category Page Specific ── */
        .category-header {
            padding: 8rem 0 3rem;
            background: var(--gradient-hero);
            text-align: center;
        }

        .category-header .icon-wrap {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-primary-soft);
            border-radius: 18px;
            margin: 0 auto 1rem;
            font-size: 1.75rem;
            color: var(--biz-primary);
        }

        .category-header h1 {
            font-family: var(--font-heading);
            font-weight: 700;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            color: var(--biz-dark);
            margin-bottom: 0.5rem;
        }

        .category-header .breadcrumb-nav {
            font-size: 0.85rem;
            color: var(--biz-gray-400);
            margin-bottom: 0.5rem;
        }

        .category-header .breadcrumb-nav a {
            color: var(--biz-primary);
            text-decoration: none;
        }

        .category-header .breadcrumb-nav a:hover {
            text-decoration: underline;
        }

        .category-header .count-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: var(--gradient-primary-soft);
            color: var(--biz-primary);
            padding: 0.35rem 1.1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .category-header p {
            color: var(--biz-gray-500);
            font-size: 1rem;
            max-width: 500px;
            margin: 1rem auto 0;
        }

        .businesses-section {
            padding: 3rem 0 5rem;
            background: var(--biz-gray-50);
        }

        .business-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid rgba(68, 118, 4, 0.06);
        }

        .business-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(68, 118, 4, 0.1);
        }

        .business-card .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .business-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .business-card .badge-verified {
            background: var(--gradient-primary);
            color: #fff;
            border-radius: 50px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .business-card .logo-sm {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid var(--biz-gray-100);
        }

        .business-card .logo-sm-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--biz-gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--biz-gray-400);
            font-size: 1.2rem;
            border: 2px solid var(--biz-gray-100);
        }

        .business-card .stars {
            color: var(--biz-warning);
            font-size: 0.85rem;
        }

        .business-card .rating-number {
            font-weight: 600;
            color: var(--biz-dark);
            font-size: 0.9rem;
        }

        .business-card .review-count {
            font-size: 0.8rem;
            color: var(--biz-gray-400);
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

        /* ── Pagination ── */
        .biz-pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .biz-pagination-info {
            font-size: 0.85rem;
            color: var(--biz-gray-500);
        }

        .biz-pagination-links {
            display: flex;
            gap: 0.3rem;
        }

        .biz-pagination-links .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 0.5rem;
            border-radius: 10px;
            background: #fff;
            border: 1px solid var(--biz-gray-200);
            color: var(--biz-gray-600);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .biz-pagination-links .page-link:hover {
            border-color: var(--biz-primary);
            color: var(--biz-primary);
        }

        .biz-pagination-links .page-link.active {
            background: var(--gradient-primary);
            border-color: transparent;
            color: #fff;
        }

        .biz-pagination-links .page-link.disabled {
            opacity: 0.4;
            pointer-events: none;
        }

        @media (max-width: 767.98px) {
            .category-header {
                padding: 6rem 0 2rem;
            }
            .biz-pagination {
                flex-direction: column;
                align-items: center;
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('category.show', $category) }}">{{ $category->name }}</a></li>
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

    <!-- ─── Category Header ─── -->
    <div class="category-header">
        <div class="container">
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <i class="bi bi-chevron-right mx-1" style="font-size: 0.6rem;"></i>
                <a href="{{ route('categories') }}">Categories</a>
                <i class="bi bi-chevron-right mx-1" style="font-size: 0.6rem;"></i>
                {{ $category->name }}
            </div>

            <div class="icon-wrap">
                @if($category->icon)
                    <i class="bi {{ $category->icon }}"></i>
                @else
                    <i class="bi bi-grid"></i>
                @endif
            </div>

            <h1>{{ $category->name }}</h1>

            @if($category->description)
                <p>{{ $category->description }}</p>
            @endif

            <div class="mt-3">
                <span class="count-badge">
                    <i class="bi bi-building"></i>
                    {{ $businesses->total() }} {{ Str::plural('business', $businesses->total()) }}
                </span>
            </div>
        </div>
    </div>

    <!-- ─── Businesses Grid ─── -->
    <section class="businesses-section" aria-label="{{ $category->name }} businesses">
        <div class="container">
            @if($businesses->count() > 0)
                <div class="row g-4">
                    @foreach($businesses as $biz)
                        @php
                            $rating = round($biz->reviews_avg_rating ?? 0, 1);
                            $reviewCount = $biz->reviews_count ?? 0;
                        @endphp
                        <div class="col-md-6 col-lg-4 fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                            <div class="business-card">
                                <div class="position-relative overflow-hidden">
                                    @if ($biz->cover_image)
                                        <img src="{{ $biz->cover_image_url }}" class="card-img-top" alt="{{ $biz->name }}" loading="lazy">
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
                                            <img src="{{ $biz->logo_url }}" alt="{{ $biz->name }} logo" class="logo-sm" loading="lazy">
                                        @else
                                            <div class="logo-sm-placeholder">
                                                <i class="bi bi-building"></i>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1 min-width-0">
                                            <h6 class="fw-bold mb-1" style="font-family: var(--font-heading);">{{ $biz->name }}</h6>
                                            <div class="d-flex gap-2 small text-muted flex-wrap">
                                                @if ($biz->state)
                                                    <span><i class="bi bi-geo-alt me-1"></i>{{ $biz->state->name }}</span>
                                                @endif
                                                @if ($biz->lga)
                                                    <span><i class="bi bi-pin-map me-1"></i>{{ $biz->lga->name }}</span>
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
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($businesses->hasPages())
                    <div class="biz-pagination">
                        <div class="biz-pagination-info">
                            Showing {{ $businesses->firstItem() }}–{{ $businesses->lastItem() }} of {{ $businesses->total() }} businesses
                        </div>
                        <div class="biz-pagination-links">
                            @if ($businesses->onFirstPage())
                                <span class="page-link disabled"><i class="bi bi-chevron-left"></i></span>
                            @else
                                <a href="{{ $businesses->previousPageUrl() }}" class="page-link"><i class="bi bi-chevron-left"></i></a>
                            @endif

                            @foreach ($businesses->getUrlRange(max(1, $businesses->currentPage() - 2), min($businesses->lastPage(), $businesses->currentPage() + 2)) as $page => $url)
                                <a href="{{ $url }}" class="page-link {{ $page === $businesses->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            @if ($businesses->hasMorePages())
                                <a href="{{ $businesses->nextPageUrl() }}" class="page-link"><i class="bi bi-chevron-right"></i></a>
                            @else
                                <span class="page-link disabled"><i class="bi bi-chevron-right"></i></span>
                            @endif
                        </div>
                    </div>
                @endif

            @else
                <div class="empty-state fade-in-up">
                    <i class="bi bi-shop"></i>
                    <p>No businesses listed in this category yet.</p>
                    <a href="{{ route('categories') }}" class="btn btn-gradient-outline rounded-pill px-4 mt-3">
                        <i class="bi bi-arrow-left me-1"></i> Browse Categories
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
