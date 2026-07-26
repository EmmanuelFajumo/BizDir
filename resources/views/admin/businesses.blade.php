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
                <h1 class="biz-page-title">Business Management</h1>
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

        @if (session('error'))
            <div class="biz-alert biz-alert-error mb-4">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="biz-stats-grid">
            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-primary-light">
                        <i class="fas fa-store" style="color: var(--biz-primary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Businesses</div>
                <div class="biz-stat-value">{{ $totalBusinesses }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-building"></i>
                    Listed on platform
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-success-light">
                        <i class="fas fa-check-circle" style="color: var(--biz-success);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Verified</div>
                <div class="biz-stat-value">{{ $verifiedBusinesses }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-check"></i>
                    {{ $totalBusinesses > 0 ? round(($verifiedBusinesses / $totalBusinesses) * 100) : 0 }}% of total
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-warning-light">
                        <i class="fas fa-clock" style="color: #b8860b;"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Unverified</div>
                <div class="biz-stat-value">{{ $unverifiedBusinesses }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-hourglass-half"></i>
                    Awaiting verification
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-secondary-light">
                        <i class="fas fa-thumbs-up" style="color: var(--biz-secondary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Approved</div>
                <div class="biz-stat-value">{{ $approvedBusinesses }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-check-double"></i>
                    Status approved
                </div>
            </div>
        </div>

        <!-- Businesses Table Card -->
        <div class="biz-card">
            <div class="biz-card-header">
                <h3 class="biz-card-title">
                    <i class="fas fa-list me-2" style="color: var(--biz-primary);"></i>
                    All Businesses
                </h3>
                <span class="biz-text-sm text-muted">{{ $businesses->total() }} total</span>
            </div>
            <div class="biz-card-body">

                @if($businesses->count() > 0)
                    <div class="biz-table-wrapper">
                        <table class="biz-table">
                            <thead>
                                <tr>
                                    <th>Business</th>
                                    <th>Owner</th>
                                    <th>Status</th>
                                    <th>Verified</th>
                                    <th>Joined</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($businesses as $business)
                                    <tr>
                                        <td>
                                            <div class="biz-table-user">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="width: 34px; height: 34px; border-radius: 50%; background-color: var(--biz-primary-light); color: var(--biz-primary); font-size: 0.85rem; flex-shrink: 0;">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                                <div>
                                                    <div class="biz-user-name">{{ $business->name }}</div>
                                                    <div class="biz-user-email">{{ $business->email ?? '—' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($business->owner)
                                                <div class="biz-table-user">
                                                    <div class="biz-user-avatar-sm">
                                                        {{ substr($business->owner->firstname, 0, 1) }}{{ substr($business->owner->lastname, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 500; color: var(--biz-dark); font-size: 0.85rem;">
                                                            {{ $business->owner->firstname }} {{ $business->owner->lastname }}
                                                        </div>
                                                        <div class="biz-user-email">{{ $business->owner->email }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted" style="font-size: 0.85rem;">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($business->status === 'approved')
                                                <span class="biz-status-badge biz-status-verified">Approved</span>
                                            @elseif($business->status === 'suspended')
                                                <span class="biz-status-badge biz-status-suspended">Suspended</span>
                                            @else
                                                <span class="biz-status-badge biz-status-unverified">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($business->is_verified)
                                                <span class="biz-status-badge biz-status-verified">
                                                    <i class="fas fa-check-circle" style="font-size: 0.65rem;"></i> Verified
                                                </span>
                                            @else
                                                <span class="biz-status-badge biz-status-unverified">
                                                    <i class="fas fa-clock" style="font-size: 0.65rem;"></i> Unverified
                                                </span>
                                            @endif
                                        </td>
                                        <td style="white-space: nowrap; font-size: 0.82rem;">
                                            {{ $business->created_at->format('M d, Y') }}
                                            <span class="text-muted" style="display: block; font-size: 0.72rem;">
                                                {{ $business->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="biz-action-group" style="justify-content: center;">
                                                <!-- Verify -->
                                                @if(!$business->is_verified)
                                                    <form method="POST" action="{{ route('admin.businesses.verify', $business->id) }}" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="biz-action-btn" title="Verify Business">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="biz-action-btn" style="opacity: 0.3; cursor: default;" title="Already verified">
                                                        <i class="fas fa-check-circle" style="color: var(--biz-success);"></i>
                                                    </span>
                                                @endif

                                                 <!-- Toggle Status -->
                                                <form method="POST" action="{{ route('admin.business.toggle-status', $business->id) }}" class="d-inline" onsubmit="return confirmToggleStatus('{{ $business->name }}', '{{ $business->status }}')">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if($business->status === 'approved')
                                                        <button type="submit" class="biz-action-btn biz-action-warning" title="Pend Business">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit" class="biz-action-btn" title="Approve Business">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                                <!-- View -->
                                                <a href="{{ route('view', $business->id) }}" class="biz-action-btn" title="View Business" target="_blank">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="biz-pagination">
                        <div class="biz-pagination-info">
                            Showing {{ $businesses->firstItem() }}–{{ $businesses->lastItem() }} of {{ $businesses->total() }} businesses
                        </div>
                        <div class="biz-pagination-links">
                            @if ($businesses->onFirstPage())
                                <span class="page-link disabled"><i class="fas fa-chevron-left"></i></span>
                            @else
                                <a href="{{ $businesses->previousPageUrl() }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                            @endif

                            @foreach ($businesses->getUrlRange(max(1, $businesses->currentPage() - 2), min($businesses->lastPage(), $businesses->currentPage() + 2)) as $page => $url)
                                <a href="{{ $url }}" class="page-link {{ $page === $businesses->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            @if ($businesses->hasMorePages())
                                <a href="{{ $businesses->nextPageUrl() }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                            @else
                                <span class="page-link disabled"><i class="fas fa-chevron-right"></i></span>
                            @endif
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="biz-empty-state">
                        <i class="fas fa-store"></i>
                        <p>No businesses have been listed yet.</p>
                    </div>
                @endif

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

         // Toggle Status Confirmation
        function confirmToggleStatus(name, currentStatus) {
            const action = currentStatus === 'approved' ? 'pend' : 'approve';
            return confirm(`Are you sure you want to ${action} ${name}?`);
        }

        // Delete Modal
        function openDeleteModal(userId, userName) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            const message = document.getElementById('deleteModalMessage');

            form.action = '{{}}/' + userId;
            message.textContent = `Are you sure you want to delete "${userName}"? This action cannot be undone.`;
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    </script>
@endpush
