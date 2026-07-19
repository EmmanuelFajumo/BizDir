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

        <!-- Recent Activity -->
        <div class="row g-4">
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
    </script>