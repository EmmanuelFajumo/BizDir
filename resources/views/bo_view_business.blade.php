@extends('layouts.business_owner')

@section('content')

    <!-- MAIN CONTENT -->
    <div class="biz-main">

        <!-- Top Bar -->
        <header class="biz-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="biz-sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="biz-page-title">Business Details</h1>
            </div>

            <div class="biz-topbar-actions">
                <a href="{{ url('/') }}" class="biz-btn-icon" title="View Public Site">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <button class="biz-btn-icon" aria-label="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="biz-notification-dot"></span>
                </button>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="biz-btn-icon" aria-label="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-custom alert-success mb-4">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('my_businesses') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i>
                Back to My Businesses
            </a>
        </div>

        <!-- Business Detail Card -->
        <div class="biz-card">
            <div class="biz-card-body p-0">
                <!-- Cover Image -->
                <div class="position-relative" style="height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px 12px 0 0; overflow: hidden;">
                    @if($business->cover_image)
                        <img src="{{ asset('storage/' . $business->cover_image) }}" 
                             alt="{{ $business->name }} cover" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                    @endif
                    
                    <!-- Status Badge Overlay -->
                    <div class="position-absolute top-0 end-0 m-3">
                        @php
                            $statusBadge = match($business->status) {
                                'approved' => 'bg-success',
                                'pending' => 'bg-warning text-dark',
                                'rejected' => 'bg-danger',
                                default => 'bg-secondary'
                            };
                        @endphp
                        <span class="badge {{ $statusBadge }} fs-6 px-3 py-2">
                            {{ ucfirst($business->status) }}
                        </span>
                    </div>

                    <!-- Featured & Verified Badges -->
                    <div class="position-absolute top-0 start-0 m-3 d-flex gap-2">
                        @if($business->is_featured)
                            <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                                <i class="fas fa-crown me-1"></i> Featured
                            </span>
                        @endif
                        @if($business->is_verified)
                            <span class="badge bg-info fs-6 px-3 py-2">
                                <i class="fas fa-check-circle me-1"></i> Verified
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Business Info Section -->
                <div class="p-4">
                    <div class="row">
                        <!-- Logo & Name -->
                        <div class="col-lg-8">
                            <div class="d-flex align-items-start gap-4">
                                <!-- Logo -->
                                <div class="flex-shrink-0" style="margin-top: -60px;">
                                    @if($business->logo)
                                        <img src="{{ asset('storage/' . $business->logo) }}" 
                                             alt="{{ $business->name }}" 
                                             class="rounded-circle border border-4 border-white shadow"
                                             width="100" height="100"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-white border border-4 shadow d-flex align-items-center justify-content-center"
                                             style="width: 100px; height: 100px; margin-top: -60px;">
                                            <i class="fas fa-store text-secondary" style="font-size: 2.5rem;"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Name & Category -->
                                <div class="flex-grow-1 pt-2">
                                    <h2 class="mb-1 fw-bold">{{ $business->name }}</h2>
                                    @if($business->category)
                                        <span class="badge bg-light text-dark border px-3 py-2">
                                            <i class="fas fa-tag me-1"></i>
                                            {{ $business->category->name }}
                                        </span>
                                    @endif
                                    <p class="text-muted mt-2 mb-0">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Listed {{ $business->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0 pt-2">
                            <div class="d-flex gap-2 justify-content-lg-end">
                                <a href="{{ route('edit_business', $business->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit me-1"></i>
                                    Edit Business
                                </a>
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{ $business->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Business Details Grid -->
                    <div class="row g-4">
                        <!-- Description -->
                        <div class="col-12">
                            <h5 class="fw-semibold mb-2">
                                <i class="fas fa-align-left me-2 text-primary"></i>
                                Description
                            </h5>
                            <p class="text-muted mb-0" style="line-height: 1.8;">
                                {{ $business->description ?? 'No description provided.' }}
                            </p>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-md-6">
                            <div class="biz-card h-100">
                                <div class="biz-card-header">
                                    <h5 class="biz-card-title mb-0">
                                        <i class="fas fa-address-card me-2 text-primary"></i>
                                        Contact Information
                                    </h5>
                                </div>
                                <div class="biz-card-body">
                                    <div class="d-flex flex-column gap-3">
                                        @if($business->phone)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-primary-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-phone" style="color: var(--biz-primary);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Phone</small>
                                                    <span class="fw-medium">{{ $business->phone }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->whatsapp)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-success-light" style="width: 40px; height: 40px;">
                                                    <i class="fab fa-whatsapp" style="color: var(--biz-success);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">WhatsApp</small>
                                                    <span class="fw-medium">{{ $business->whatsapp }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->email)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-secondary-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-envelope" style="color: var(--biz-secondary);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Email</small>
                                                    <span class="fw-medium">{{ $business->email }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->website)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-info-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-globe" style="color: #0dcaf0;"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Website</small>
                                                    <a href="{{ $business->website }}" target="_blank" class="fw-medium text-decoration-none">
                                                        {{ $business->website }}
                                                        <i class="fas fa-external-link-alt ms-1" style="font-size: 0.75rem;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Location & Address -->
                        <div class="col-md-6">
                            <div class="biz-card h-100">
                                <div class="biz-card-header">
                                    <h5 class="biz-card-title mb-0">
                                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                        Location & Address
                                    </h5>
                                </div>
                                <div class="biz-card-body">
                                    <div class="d-flex flex-column gap-3">
                                        @if($business->address)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-danger-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-home" style="color: var(--biz-danger);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Address</small>
                                                    <span class="fw-medium">{{ $business->address }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->lga)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-primary-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-map-pin" style="color: var(--biz-primary);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">LGA</small>
                                                    <span class="fw-medium">{{ $business->lga->name }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->state)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-secondary-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-flag" style="color: var(--biz-secondary);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">State</small>
                                                    <span class="fw-medium">{{ $business->state->name }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-md-6">
                            <div class="biz-card h-100">
                                <div class="biz-card-header">
                                    <h5 class="biz-card-title mb-0">
                                        <i class="fas fa-info-circle me-2 text-info"></i>
                                        Additional Information
                                    </h5>
                                </div>
                                <div class="biz-card-body">
                                    <div class="d-flex flex-column gap-3">
                                        @if($business->year_established)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-success-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-calendar" style="color: var(--biz-success);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Year Established</small>
                                                    <span class="fw-medium">{{ $business->year_established }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($business->employees)
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="biz-stat-icon bg-biz-primary-light" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-users" style="color: var(--biz-primary);"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Employees</small>
                                                    <span class="fw-medium">{{ number_format($business->employees) }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="d-flex align-items-center gap-3">
                                            <div class="biz-stat-icon bg-biz-secondary-light" style="width: 40px; height: 40px;">
                                                <i class="fas fa-clock" style="color: var(--biz-secondary);"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Last Updated</small>
                                                <span class="fw-medium">{{ $business->updated_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="col-md-6">
                            <div class="biz-card h-100">
                                <div class="biz-card-header">
                                    <h5 class="biz-card-title mb-0">
                                        <i class="fas fa-share-alt me-2 text-primary"></i>
                                        Social Media
                                    </h5>
                                </div>
                                <div class="biz-card-body">
                                    @php
                                        $socialLinks = [
                                            'facebook' => ['icon' => 'fab fa-facebook', 'color' => '#1877F2', 'label' => 'Facebook'],
                                            'instagram' => ['icon' => 'fab fa-instagram', 'color' => '#E4405F', 'label' => 'Instagram'],
                                            'x' => ['icon' => 'fab fa-x-twitter', 'color' => '#000000', 'label' => 'X (Twitter)'],
                                            'linkedin' => ['icon' => 'fab fa-linkedin', 'color' => '#0A66C2', 'label' => 'LinkedIn'],
                                            'youtube' => ['icon' => 'fab fa-youtube', 'color' => '#FF0000', 'label' => 'YouTube'],
                                        ];
                                        $hasSocial = false;
                                    @endphp

                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($socialLinks as $key => $social)
                                            @if($business->$key)
                                                @php $hasSocial = true; @endphp
                                                <a href="{{ $business->$key }}" target="_blank" 
                                                   class="btn btn-outline-secondary d-flex align-items-center gap-2"
                                                   style="border-color: {{ $social['color'] }}33; color: {{ $social['color'] }};"
                                                   onmouseover="this.style.backgroundColor='{{ $social['color'] }}'; this.style.color='#fff';"
                                                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='{{ $social['color'] }}';"
                                                   title="{{ $social['label'] }}">
                                                    <i class="{{ $social['icon'] }}"></i>
                                                    <span>{{ $social['label'] }}</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>

                                    @if(!$hasSocial)
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-info-circle me-1"></i>
                                            No social media links added yet.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Opening Hours -->
                        <div class="col-12">
                            <div class="biz-card">
                                <div class="biz-card-header">
                                    <h5 class="biz-card-title mb-0">
                                        <i class="fas fa-clock me-2 text-success"></i>
                                        Opening Hours
                                    </h5>
                                </div>
                                <div class="biz-card-body">
                                    @if($openingHours->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Day</th>
                                                        <th scope="col">Opens At</th>
                                                        <th scope="col">Closes At</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($openingHours as $hour)
                                                        <tr>
                                                            <td class="fw-medium">{{ $hour->day }}</td>
                                                            <td>
                                                                @if($hour->is_closed)
                                                                    <span class="text-muted">—</span>
                                                                @else
                                                                    {{ $hour->opens_at ? \Carbon\Carbon::createFromFormat('H:i:s', $hour->opens_at)->format('g:i A') : '—' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($hour->is_closed)
                                                                    <span class="text-muted">—</span>
                                                                @else
                                                                    {{ $hour->closes_at ? \Carbon\Carbon::createFromFormat('H:i:s', $hour->closes_at)->format('g:i A') : '—' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($hour->is_closed)
                                                                    <span class="badge bg-danger bg-opacity-10 text-danger">
                                                                        <i class="fas fa-times-circle me-1"></i> Closed
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-success bg-opacity-10 text-success">
                                                                        <i class="fas fa-check-circle me-1"></i> Open
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-info-circle me-1"></i>
                                            No opening hours have been set for this business.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sidebar toggle for mobile
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const bizSidebar = document.getElementById('bizSidebar');

            if (sidebarToggle && sidebarOverlay && bizSidebar) {
                sidebarToggle.addEventListener('click', () => {
                    bizSidebar.classList.toggle('active');
                    sidebarOverlay.classList.toggle('active');
                });

                sidebarOverlay.addEventListener('click', () => {
                    bizSidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                });
            }
        });

        function confirmDelete(businessId) {
            if (confirm('Are you sure you want to delete this business? This action cannot be undone.')) {
                // Create a form dynamically and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/businesses/${businessId}`;
                form.style.display = 'none';

                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(csrfInput);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endpush