<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $business_det->description ? Str::limit($business_det->description, 160) : 'View details for ' . $business_det->name . ' on BizDir.' }}">
    <title>{{ $business_det->name }} — BizDir</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/business_detail.css') }}" rel="stylesheet">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg fixed-top" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-building me-2"></i>BizDir
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('browse') }}">Browse</a></li>
                </ul>
                <div class="d-flex gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-gradient btn-sm rounded-pill px-4">
                            <i class="bi bi-person me-1"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gradient-outline btn-sm rounded-pill px-4">Login</a>
                        <a href="{{ route('get_listed') }}" class="btn btn-gradient btn-sm rounded-pill px-4">
                            <i class="bi bi-plus-lg me-1"></i>Add Business
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @php
        $b      = $business_det;
        $rating = round($b->reviews_avg_rating ?? 0, 1);
        $rCount = $b->reviews_count ?? 0;
    @endphp

    {{-- COVER IMAGE --}}
    <div class="biz-cover" aria-label="Business cover image">
        @if ($b->cover_image)
            <img src="{{ asset('storage/' . $business_det->cover_image) }}" alt="{{ $b->name }} cover">
            <div class="biz-cover-overlay"></div>
        @else
            <div class="biz-cover-placeholder"><i class="bi bi-building"></i></div>
        @endif
    </div>

    {{-- IDENTITY BAR --}}
    <div class="identity-bar">
        <div class="container">
            <div class="d-flex align-items-end gap-4 flex-wrap">
                @if ($b->logo)
                    <img src="{{ asset('storage/' . $b->logo) }}" alt="{{ $b->name }} logo" class="biz-logo">
                @else
                    <div class="biz-logo-placeholder" aria-hidden="true"><i class="bi bi-building"></i></div>
                @endif

                <div class="flex-grow-1 pb-1">
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                        <h1 class="biz-title mb-0">{{ $b->name }}</h1>
                        @if ($b->is_verified)
                            <span class="badge-verified"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        @endif
                        @if ($b->is_featured)
                            <span class="badge-featured"><i class="bi bi-star-fill"></i> Featured</span>
                        @endif
                        @if ($rating > 0)
                            <span class="rating-badge"><i class="bi bi-star-fill"></i> {{ $rating }}</span>
                        @endif
                    </div>
                    <div class="biz-meta-row">
                        @if ($b->category)
                            <span class="biz-meta-item"><i class="bi bi-shop"></i> {{ $b->category->name }}</span>
                        @endif
                        @if ($b->state)
                            <span class="biz-meta-item">
                                <i class="bi bi-geo-alt"></i> {{ $b->state->name }}@if ($b->lga), {{ $b->lga->name }}@endif
                            </span>
                        @endif
                        @if ($b->address)
                            <span class="biz-meta-item"><i class="bi bi-pin-map"></i> {{ $b->address }}</span>
                        @endif
                        @if ($rCount > 0)
                            <span class="biz-meta-item">
                                <i class="bi bi-chat-square-text"></i> {{ $rCount }} {{ Str::plural('review', $rCount) }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <nav class="biz-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span class="sep">›</span>
                <a href="{{ route('browse') }}">Browse</a>
                @if ($b->category)
                    <span class="sep">›</span>
                    <a href="#">{{ $b->category->name }}</a>
                @endif
                <span class="sep">›</span>
                <span>{{ $b->name }}</span>
            </nav>
        </div>
    </div>

    {{-- MAIN LAYOUT --}}
    <div class="biz-detail-layout">
        <div class="container">
            <div class="row g-4">

                {{-- LEFT COLUMN --}}
                <div class="col-lg-8">

                    {{-- About --}}
                    @if ($b->description)
                        <div class="detail-card">
                            <p class="section-heading"><i class="bi bi-info-circle"></i> About</p>
                            <p class="mb-0" style="font-size:.97rem;line-height:1.8;color:var(--biz-gray-600)">{{ $b->description }}</p>
                        </div>
                    @endif

                    {{-- Business Info Chips --}}
                    <div class="detail-card">
                        <p class="section-heading"><i class="bi bi-briefcase"></i> Business Details</p>
                        <div class="info-grid">
                            @if ($b->category)
                                <div class="info-chip">
                                    <div class="ic-label">Category</div>
                                    <div class="ic-value"><i class="bi bi-shop me-1" style="color:var(--biz-primary)"></i>{{ $b->category->name }}</div>
                                </div>
                            @endif
                            @if ($b->state)
                                <div class="info-chip">
                                    <div class="ic-label">State</div>
                                    <div class="ic-value"><i class="bi bi-geo-alt me-1" style="color:var(--biz-primary)"></i>{{ $b->state->name }}</div>
                                </div>
                            @endif
                            @if ($b->lga)
                                <div class="info-chip">
                                    <div class="ic-label">LGA</div>
                                    <div class="ic-value"><i class="bi bi-map me-1" style="color:var(--biz-primary)"></i>{{ $b->lga->name }}</div>
                                </div>
                            @endif
                            @if ($b->year_established)
                                <div class="info-chip">
                                    <div class="ic-label">Year Established</div>
                                    <div class="ic-value"><i class="bi bi-calendar3 me-1" style="color:var(--biz-primary)"></i>{{ $b->year_established }}</div>
                                </div>
                            @endif
                            @if ($b->employees)
                                <div class="info-chip">
                                    <div class="ic-label">Employees</div>
                                    <div class="ic-value"><i class="bi bi-people me-1" style="color:var(--biz-primary)"></i>{{ $b->employees }}</div>
                                </div>
                            @endif
                            <div class="info-chip">
                                <div class="ic-label">Status</div>
                                <div class="ic-value">
                                    @if ($b->status === 'approved')
                                        <span style="color:var(--biz-success)"><i class="bi bi-check-circle me-1"></i>Approved</span>
                                    @else
                                        <span style="color:var(--biz-gray-400)">{{ ucfirst($b->status) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact & Socials --}}
                    <div class="detail-card">
                        <p class="section-heading"><i class="bi bi-telephone"></i> Contact Information</p>
                        <ul class="contact-list">
                            @if ($b->phone)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-telephone"></i></span>
                                    <div>
                                        <div class="ci-label">Phone</div>
                                        <a href="tel:{{ $b->phone }}" class="ci-value">{{ $b->phone }}</a>
                                    </div>
                                </li>
                            @endif
                            @if ($b->whatsapp)
                                <li>
                                    <span class="ci-icon" style="background:#e6faf0;color:#25d366"><i class="bi bi-whatsapp"></i></span>
                                    <div>
                                        <div class="ci-label">WhatsApp</div>
                                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $b->whatsapp) }}" target="_blank" class="ci-value">{{ $b->whatsapp }}</a>
                                    </div>
                                </li>
                            @endif
                            @if ($b->email)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-envelope"></i></span>
                                    <div>
                                        <div class="ci-label">Email</div>
                                        <a href="mailto:{{ $b->email }}" class="ci-value">{{ $b->email }}</a>
                                    </div>
                                </li>
                            @endif
                            @if ($b->website)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-globe"></i></span>
                                    <div>
                                        <div class="ci-label">Website</div>
                                        <a href="{{ $b->website }}" target="_blank" rel="noopener" class="ci-value">{{ $b->website }}</a>
                                    </div>
                                </li>
                            @endif
                            @if ($b->address)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-pin-map"></i></span>
                                    <div>
                                        <div class="ci-label">Address</div>
                                        <span class="ci-value">{{ $b->address }}</span>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        @php
                            $socials = [
                                ['key' => 'facebook',  'icon' => 'bi-facebook',  'label' => 'Facebook'],
                                ['key' => 'instagram', 'icon' => 'bi-instagram', 'label' => 'Instagram'],
                                ['key' => 'linkedin',  'icon' => 'bi-linkedin',  'label' => 'LinkedIn'],
                                ['key' => 'x',         'icon' => 'bi-twitter-x', 'label' => 'X / Twitter'],
                                ['key' => 'youtube',   'icon' => 'bi-youtube',   'label' => 'YouTube'],
                            ];
                            $hasSocials = collect($socials)->filter(fn($s) => $b->{$s['key']})->isNotEmpty();
                        @endphp
                        @if ($hasSocials)
                            <p class="section-heading mt-4"><i class="bi bi-share"></i> Social Media</p>
                            <div class="social-grid">
                                @foreach ($socials as $s)
                                    @if ($b->{$s['key']})
                                        <a href="{{ $b->{$s['key']} }}" target="_blank" rel="noopener" class="social-btn">
                                            <i class="bi {{ $s['icon'] }}"></i> {{ $s['label'] }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Opening Hours --}}
                    @if ($b->openingHours && $b->openingHours->count())
                        <div class="detail-card">
                            <p class="section-heading"><i class="bi bi-clock"></i> Opening Hours</p>
                            <table class="hours-table" aria-label="Opening hours">
                                <tbody>
                                    @php
                                        $dayOrder   = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                                        $hoursByDay = $b->openingHours->keyBy('day');
                                    @endphp
                                    @foreach ($dayOrder as $day)
                                        @if ($hoursByDay->has($day))
                                            @php $h = $hoursByDay[$day]; @endphp
                                            <tr>
                                                <td class="day-col">{{ $day }}</td>
                                                <td class="time-col">
                                                    @if ($h->is_closed)
                                                        <span class="badge-closed-day">Closed</span>
                                                    @else
                                                        <span class="badge-open-day">Open</span>
                                                        {{ \Carbon\Carbon::parse($h->opens_at)->format('g:i A') }}
                                                        &ndash;
                                                        {{ \Carbon\Carbon::parse($h->closes_at)->format('g:i A') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    {{-- Reviews --}}
                    <div class="detail-card" id="reviews">
                        <p class="section-heading"><i class="bi bi-chat-square-text"></i> Reviews</p>

                        @if ($rCount > 0)
                            <div class="review-summary">
                                <div class="text-center flex-shrink-0">
                                    <div class="review-avg-num">{{ $rating }}</div>
                                    <div class="stars mt-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($rating))
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($i - $rating < 1)
                                                <i class="bi bi-star-half"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="avg-label mt-1">{{ $rCount }} {{ Str::plural('review', $rCount) }}</div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-2 small text-muted">Based on {{ $rCount }} verified {{ Str::plural('review', $rCount) }}</p>
                                    @foreach ([5,4,3,2,1] as $star)
                                        @php
                                            $cnt = $b->reviews->where('rating', $star)->count();
                                            $pct = $rCount > 0 ? round(($cnt / $rCount) * 100) : 0;
                                        @endphp
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span style="font-size:.75rem;width:10px;color:var(--biz-gray-500)">{{ $star }}</span>
                                            <i class="bi bi-star-fill" style="color:var(--biz-warning);font-size:.72rem"></i>
                                            <div class="flex-grow-1 rounded" style="height:6px;background:var(--biz-gray-200);overflow:hidden">
                                                <div style="width:{{ $pct }}%;height:100%;background:var(--biz-warning);border-radius:4px;"></div>
                                            </div>
                                            <span style="font-size:.72rem;color:var(--biz-gray-400);width:20px">{{ $cnt }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @foreach ($b->reviews->take(6) as $review)
                                @php
                                    $userName = $review->user ? $review->user->name : 'Anonymous';
                                    $initial  = strtoupper(substr($userName, 0, 1));
                                @endphp
                                <div class="review-card">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="reviewer-avatar" aria-hidden="true">{{ $initial }}</div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                                <span class="review-title">{{ $userName }}</span>
                                                <span class="stars-sm">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                    @endfor
                                                </span>
                                                @if ($review->verified_visit)
                                                    <span style="background:var(--biz-success-light);color:var(--biz-success);border-radius:50px;padding:.1rem .55rem;font-size:.72rem;font-weight:600">
                                                        <i class="bi bi-patch-check-fill me-1"></i>Verified Visit
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($review->title)
                                                <div style="font-weight:600;font-size:.93rem;color:var(--biz-dark);margin-bottom:.15rem">{{ $review->title }}</div>
                                            @endif
                                            <span class="review-meta">{{ $review->created_at->diffForHumans() }}</span>
                                            @if ($review->comment)
                                                <p class="review-body">{{ $review->comment }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($b->reviews->count() > 6)
                                <p class="text-center mt-3 mb-0">
                                    <a href="#" class="btn btn-gradient-outline rounded-pill px-4 btn-sm">
                                        View all {{ $rCount }} reviews <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </p>
                            @endif

                        @else
                            <div class="empty-reviews">
                                <i class="bi bi-chat-square"></i>
                                <p class="mb-0">No reviews yet. Be the first to leave a review!</p>
                            </div>
                        @endif
                    </div>

                </div>
                {{-- / Left column --}}

                {{-- RIGHT COLUMN (Sidebar) --}}
                <div class="col-lg-4">

                    {{-- Quick Contact Actions --}}
                    <div class="action-card">
                        <p class="section-heading"><i class="bi bi-lightning"></i> Quick Contact</p>

                        @if ($b->phone)
                            <a href="tel:{{ $b->phone }}" class="btn btn-call" id="btn-call-business">
                                <i class="bi bi-telephone-fill me-2"></i>Call Now
                            </a>
                        @endif
                        @if ($b->whatsapp)
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $b->whatsapp) }}" target="_blank" class="btn btn-whatsapp" id="btn-whatsapp-business">
                                <i class="bi bi-whatsapp me-2"></i>WhatsApp
                            </a>
                        @endif
                        @if ($b->email)
                            <a href="mailto:{{ $b->email }}" class="btn btn-email" id="btn-email-business">
                                <i class="bi bi-envelope me-2"></i>Send Email
                            </a>
                        @endif
                        @if ($b->website)
                            <a href="{{ $b->website }}" target="_blank" rel="noopener" class="btn btn-website" id="btn-website-business">
                                <i class="bi bi-globe me-2"></i>Visit Website
                            </a>
                        @endif
                        @if (!$b->phone && !$b->whatsapp && !$b->email && !$b->website)
                            <p class="text-center text-muted small mb-0">No contact info provided.</p>
                        @endif
                    </div>

                    {{-- Location --}}
                    @if ($b->address || $b->state)
                        <div class="detail-card">
                            <p class="section-heading"><i class="bi bi-geo-alt"></i> Location</p>
                            <div class="map-placeholder" aria-label="Location">
                                <i class="bi bi-map"></i>
                                <span class="text-center px-2" style="font-size:.82rem">
                                    {{ $b->address ?? '' }}
                                    @if ($b->state), {{ $b->state->name }}@endif
                                    @if ($b->lga), {{ $b->lga->name }}@endif
                                </span>
                            </div>
                        </div>
                    @endif

                    {{-- Quick Facts --}}
                    <div class="detail-card">
                        <p class="section-heading"><i class="bi bi-card-list"></i> Quick Facts</p>
                        <ul class="contact-list">
                            @if ($b->year_established)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-calendar3"></i></span>
                                    <div>
                                        <div class="ci-label">Est.</div>
                                        <span class="ci-value">{{ $b->year_established }}</span>
                                    </div>
                                </li>
                            @endif
                            @if ($b->employees)
                                <li>
                                    <span class="ci-icon"><i class="bi bi-people"></i></span>
                                    <div>
                                        <div class="ci-label">Employees</div>
                                        <span class="ci-value">{{ $b->employees }}</span>
                                    </div>
                                </li>
                            @endif
                            <li>
                                <span class="ci-icon"><i class="bi bi-calendar-check"></i></span>
                                <div>
                                    <div class="ci-label">Listed since</div>
                                    <span class="ci-value">{{ $b->created_at->format('M Y') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                {{-- / Right column --}}

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="footer" aria-label="Footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand mb-3"><i class="bi bi-building me-2"></i>BizDir</div>
                    <p style="font-size:.88rem">Your trusted local business directory. Discover, connect, and grow.</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="social-link-footer"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link-footer"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-link-footer"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link-footer"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 style="color:#fff;font-size:.9rem;">Quick Links</h6>
                    <ul class="list-unstyled" style="font-size:.86rem">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('browse') }}">Browse</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="copyright mb-0">&copy; {{ date('Y') }} BizDir. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="copyright mb-0">Built with <i class="bi bi-heart-fill" style="color:#ef4444"></i> for local businesses</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
