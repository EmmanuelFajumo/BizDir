@extends('layouts.admin')

@section('content')

    <!-- MAIN CONTENT -->
    <div class="biz-main">

        <!-- Top Bar -->
        <header class="biz-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="biz-sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="biz-page-title">Admin Dashboard</h1>
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

        <!-- Success / Error Messages -->
        @if (session('success'))
            <div class="biz-alert biz-alert-success mb-4">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="biz-alert biz-alert-error mb-4">
                <i class="fas fa-exclamation-circle"></i>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Welcome Banner -->
        <div class="biz-banner-wrapper">
            <div class="biz-banner">
                <div class="biz-banner-content">
                    <div>
                        <h2 class="biz-banner-title">Welcome, {{ Auth::user()->firstname }}!</h2>
                        <p class="biz-banner-subtitle">Manage platform users, businesses, reviews, and reports from one place.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="" class="biz-btn biz-btn-success">
                            <i class="fas fa-users"></i>
                            Manage Users
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Cards -->
        <div class="biz-stats-grid">
            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-primary-light">
                        <i class="fas fa-users" style="color: var(--biz-primary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Users</div>
                <div class="biz-stat-value">{{ $users ?? '—' }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-user-check"></i>
                    {{ $activeUsers ?? '0' }} active
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-secondary-light">
                        <i class="fas fa-store" style="color: var(--biz-secondary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Businesses</div>
                <div class="biz-stat-value">{{ $businesses ?? '—' }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-check-circle"></i>
                    {{ $verifiedBusinesses ?? '0' }} verified
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-success-light">
                        <i class="fas fa-star" style="color: var(--biz-success);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Reviews</div>
                <div class="biz-stat-value">{{ $reviews ?? '—' }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-star-half-alt"></i>
                    Avg: {{ $avgRating ?? '—' }}
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-danger-light">
                        <i class="fas fa-flag" style="color: var(--biz-danger);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Reports</div>
                <div class="biz-stat-value">{{ $reports ?? '0' }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ $pendingReports ?? '0' }} pending
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="row g-4">

            <!-- Users Section -->
            <div class="col-xl-6">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">
                            <i class="fas fa-users me-2" style="color: var(--biz-primary);"></i>
                            Recent Users
                        </h3>
                        <a href="" class="biz-text-primary biz-text-sm">View All</a>
                    </div>
                    <div class="biz-card-body p-0">
                        @if(isset($recentUsers) && count($recentUsers) > 0)
                            <div class="list-group list-group-flush">
                                @foreach($recentUsers as $user)
                                    <div class="list-group-item d-flex align-items-center gap-3 px-4 py-3 border-0 border-bottom">
                                        <div class="biz-user-avatar" style="width: 36px; height: 36px; font-size: 0.8rem;">
                                            {{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1) }}
                                        </div>
                                        <div class="flex-grow-1 min-width-0">
                                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;">
                                                {{ $user->firstname }} {{ $user->lastname }}
                                            </div>
                                            <div class="text-muted" style="font-size: 0.78rem;">
                                                {{ $user->email }} &middot;
                                                <span class="text-capitalize">{{ $user->role }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            @if($user->status === 'active')
                                                <span class="biz-status-badge biz-status-verified">Active</span>
                                            @else
                                                <span class="biz-status-badge biz-status-unverified">Suspended</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="px-4 py-4 text-center text-muted" style="font-size: 0.88rem;">
                                <i class="fas fa-inbox me-2"></i>No users yet.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pending Verifications Section -->
            <div class="col-xl-6">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">
                            <i class="fas fa-clock me-2" style="color: var(--biz-warning);"></i>
                            Pending Business Verifications
                        </h3>
                        <a href="" class="biz-text-primary biz-text-sm">View All</a>
                    </div>
                    <div class="biz-card-body p-0">
                        @if(isset($pendingBusinesses) && count($pendingBusinesses) > 0)
                            <div class="list-group list-group-flush">
                                @foreach($pendingBusinesses as $business)
                                    <div class="list-group-item d-flex align-items-center gap-3 px-4 py-3 border-0 border-bottom">
                                        <div class="d-flex align-items-center justify-content-center"
                                             style="width: 36px; height: 36px; border-radius: 8px; background-color: var(--biz-warning-light); color: #b8860b; font-size: 0.9rem; flex-shrink: 0;">
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <div class="flex-grow-1 min-width-0">
                                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;">
                                                {{ $business->name }}
                                            </div>
                                            <div class="text-muted" style="font-size: 0.78rem;">
                                                by {{ $business->owner->firstname ?? 'Unknown' }} {{ $business->owner->lastname ?? '' }}
                                            </div>
                                        </div>
                                        <div class="d-flex gap-1">
                                            <form method="POST" action="{{ route('admin.businesses.verify', $business->id) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="biz-btn-primary" style="padding: 0.3rem 0.7rem; font-size: 0.75rem;">
                                                    <i class="fas fa-check"></i> Verify
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="px-4 py-4 text-center text-muted" style="font-size: 0.88rem;">
                                <i class="fas fa-check-circle me-2"></i>No pending verifications.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Reports -->
            <div class="col-xl-6">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">
                            <i class="fas fa-flag me-2" style="color: var(--biz-danger);"></i>
                            Recent Reports
                        </h3>
                        <a href="" class="biz-text-primary biz-text-sm">View All</a>
                    </div>
                    <div class="biz-card-body p-0">
                        @if(isset($recentReports) && count($recentReports) > 0)
                            <div class="list-group list-group-flush">
                                @foreach($recentReports as $report)
                                    <div class="list-group-item d-flex align-items-center gap-3 px-4 py-3 border-0 border-bottom">
                                        <div class="d-flex align-items-center justify-content-center"
                                             style="width: 36px; height: 36px; border-radius: 8px; background-color: var(--biz-danger-light); color: var(--biz-danger); font-size: 0.9rem; flex-shrink: 0;">
                                            <i class="fas fa-exclamation"></i>
                                        </div>
                                        <div class="flex-grow-1 min-width-0">
                                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;">
                                                {{ $report->reason ?? 'Report' }}
                                            </div>
                                            <div class="text-muted" style="font-size: 0.78rem;">
                                                {{ $report->created_at->diffForHumans() ?? '' }}
                                            </div>
                                        </div>
                                        <a href="" class="biz-text-primary biz-text-sm">Review</a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="px-4 py-4 text-center text-muted" style="font-size: 0.88rem;">
                                <i class="fas fa-check-circle me-2"></i>No recent reports.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-xl-6">
                <div class="biz-card">
                    <div class="biz-card-header">
                        <h3 class="biz-card-title">
                            <i class="fas fa-bolt me-2" style="color: var(--biz-secondary);"></i>
                            Quick Actions
                        </h3>
                    </div>
                    <div class="biz-card-body">
                        <div class="biz-quick-actions">
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-user-plus"></i>
                                <span>View All Users</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-ban"></i>
                                <span>Suspend / Activate Users</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-check-double"></i>
                                <span>Verify Business Owners</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-store"></i>
                                <span>View All Businesses</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-star"></i>
                                <span>View All Reviews</span>
                            </a>
                            <a href="" class="biz-quick-action-item">
                                <i class="fas fa-flag"></i>
                                <span>View Reports</span>
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
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const bizSidebar = document.getElementById('bizSidebar');

            if (sidebarToggle && sidebarOverlay && bizSidebar) {
                sidebarToggle.addEventListener('click', () => {
                    bizSidebar.classList.toggle('show');
                    sidebarOverlay.classList.toggle('show');
                });

                sidebarOverlay.addEventListener('click', () => {
                    bizSidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                });
            }
        });
    </script>
@endpush
