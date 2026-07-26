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
                <h1 class="biz-page-title">Dashboard</h1>
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

        <!-- Welcome Banner -->
        <div class="biz-banner-wrapper">
            <div class="biz-banner">
                <div class="biz-banner-content">
                    <div>
                        <h2 class="biz-banner-title">Welcome back, {{ Auth::user()->firstname }}!</h2>
                        <p class="biz-banner-subtitle">Here's what's happening with your business today.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href= {{ route("create_listing") }} class="biz-btn biz-btn-success">
                            <i class="fas fa-plus-circle"></i>
                            Add New Listing
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                 <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-custom alert-success mb-4">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        <!-- Quick Stats Cards -->
        <div class="biz-stats-grid">
            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-primary-light">
                        <i class="fas fa-store" style="color: var(--biz-primary);"></i>
                    </div>
                    <span class="biz-stat-trend up">
                        <i class="fas fa-arrow-up"></i> 12%
                    </span>
                </div>
                <div class="biz-stat-label">Active Businesses</div>
                <div class="biz-stat-value">
                    {{Auth::user()->businesses()->count()}}
                </div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-calendar-alt"></i> Updated just now
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-secondary-light">
                        <i class="fas fa-star" style="color: var(--biz-secondary);"></i>
                    </div>
                    <span class="biz-stat-trend neutral">
                        <i class="fas fa-minus"></i> 0%
                    </span>
                </div>
                <div class="biz-stat-label">Total Reviews</div>
                <div class="biz-stat-value">
                    {{-- $totalReviews --}}
                </div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-star-half-alt"></i> Avg: 4.5
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-success-light">
                        <i class="fas fa-thumbs-up" style="color: var(--biz-success);"></i>
                    </div>
                    <span class="biz-stat-trend up">
                        <i class="fas fa-arrow-up"></i> 8%
                    </span>
                </div>
                <div class="biz-stat-label">Positive Ratings</div>
                <div class="biz-stat-value">
                    {{-- $positiveRatings --}}%
                </div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-smile"></i> Great performance
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-danger-light">
                        <i class="fas fa-envelope" style="color: var(--biz-danger);"></i>
                    </div>
                    <span class="biz-stat-trend down">
                        <i class="fas fa-arrow-down"></i> 3%
                    </span>
                </div>
                <div class="biz-stat-label">Unread Messages</div>
                <div class="biz-stat-value">
                    {{-- $unreadMessages --}}
                </div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-clock"></i> Last message: 2h ago
                </div>
            </div>
        </div>

        <!-- My Businesses Section -->
        <div class="biz-card mt-4">
            <div class="biz-card-header d-flex justify-content-between align-items-center">
                <h3 class="biz-card-title mb-0">
                    <i class="fas fa-store-alt me-2"></i>
                    My Businesses
                </h3>
                <span class="badge bg-primary rounded-pill">{{ $businesses->count() }} Total</span>
            </div>
            <div class="biz-card-body">
                @if($businesses->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 60px;">Logo</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col" class="text-center" style="width: 120px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($businesses as $business)
                                    <tr>
                                        <!-- Logo -->
                                        <td>
                                            @if($business->logo)
                                                <img src="{{ asset('storage/' . $business->logo) }}"
                                                     alt="{{ $business->name }}"
                                                     class="rounded-circle"
                                                     width="45" height="45"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                                                     style="width: 45px; height: 45px;">
                                                    <i class="fas fa-store text-secondary" style="font-size: 1.1rem;"></i>
                                                </div>
                                            @endif
                                        </td>

                                        <!-- Business Name -->
                                        <td>
                                            <div class="fw-semibold">{{ $business->name }}</div>
                                            <small class="text-muted">
                                                @if($business->is_featured)
                                                    <span class="badge bg-warning text-dark me-1">
                                                        <i class="fas fa-crown"></i> Featured
                                                    </span>
                                                @endif
                                                @if($business->is_verified)
                                                    <span class="badge bg-info">
                                                        <i class="fas fa-check-circle"></i> Verified
                                                    </span>
                                                @endif
                                            </small>
                                        </td>

                                        <!-- Category -->
                                        <td>
                                            @if($business->category)
                                                <span class="badge bg-light text-dark border">
                                                    {{ $business->category->name }}
                                                </span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <!-- Location -->
                                        <td>
                                            <div>
                                                @if($business->lga)
                                                    <small class="d-block text-muted">
                                                        <i class="fas fa-map-marker-alt me-1"></i>
                                                        {{ $business->lga->name }}
                                                    </small>
                                                @endif
                                                @if($business->state)
                                                    <small class="d-block text-muted">
                                                        {{ $business->state->name }}
                                                    </small>
                                                @endif
                                            </div>
                                        </td>

                                        <!-- Status -->
                                        <td>
                                            @php
                                                $statusBadge = match($business->status) {
                                                    'approved' => 'bg-success',
                                                    'pending' => 'bg-warning text-dark',
                                                    'rejected' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $statusBadge }}">
                                                {{ ucfirst($business->status) }}
                                            </span>
                                        </td>

                                        <!-- Contact -->
                                        <td>
                                            @if($business->phone)
                                                <small class="d-block">
                                                    <i class="fas fa-phone me-1 text-muted"></i>
                                                    {{ $business->phone }}
                                                </small>
                                            @endif
                                            @if($business->email)
                                                <small class="d-block">
                                                    <i class="fas fa-envelope me-1 text-muted"></i>
                                                    {{ $business->email }}
                                                </small>
                                            @endif
                                        </td>

                                        <!-- Actions -->
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('view_business', $business->id) }}" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('edit_business', $business->id) }}" class="btn btn-outline-secondary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" title="Delete"
                                                        onclick="confirmDelete({{ $business->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-3" style="font-size: 3rem; color: #dee2e6;">
                            <i class="fas fa-store-slash"></i>
                        </div>
                        <h5 class="text-muted mb-2">No Businesses Yet</h5>
                        <p class="text-muted mb-3">You haven't added any business listings yet.</p>
                        <a href="{{ route('create_listing') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-1"></i>
                            Add Your First Business
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row g-4 mt-2">
            <div class="col-xl-8">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">Recent Reviews</h3>
                        <a href="" class="biz-text-primary biz-text-sm">View All</a>
                    </div>

                </div>
            </div>

            <div class="col-xl-4">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">Quick Actions</h3>
                    </div>
                    <div class="biz-card-body">
                        <div class="biz-quick-actions">
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-store"></i>
                                <span>Manage Businesses</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-chart-line"></i>
                                <span>View Analytics</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-envelope"></i>
                                <span>Check Messages</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-star"></i>
                                <span>Respond to Reviews</span>
                            </a>
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
                    sidebarOverlay.classList.remove

                });
            }
        });

        function confirmDelete(businessId) {
            if (confirm('Are you sure you want to delete this business? This action cannot be undone.')) {
                // Create a form dynamically and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/delete_business/${businessId}`;
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
