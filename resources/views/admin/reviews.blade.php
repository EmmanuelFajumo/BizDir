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
                <h1 class="biz-page-title">Review Management</h1>
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

        <!-- Stats Cards -->
        <div class="biz-stats-grid">
            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-primary-light">
                        <i class="fas fa-star" style="color: var(--biz-primary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Reviews</div>
                <div class="biz-stat-value">{{ $reviews->total() }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-comment"></i>
                    All reviews on the platform
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-success-light">
                        <i class="fas fa-check-circle" style="color: var(--biz-success);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Approved</div>
                <div class="biz-stat-value">{{ $reviews->where('status', 'approved')->count() }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-thumbs-up"></i>
                    Visible on public listings
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-warning-light">
                        <i class="fas fa-clock" style="color: var(--biz-warning);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Pending</div>
                <div class="biz-stat-value">{{ $reviews->where('status', 'pending')->count() }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-hourglass-half"></i>
                    Awaiting moderation
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-danger-light">
                        <i class="fas fa-times-circle" style="color: var(--biz-danger);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Rejected</div>
                <div class="biz-stat-value">{{ $reviews->where('status', 'rejected')->count() }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-ban"></i>
                    Not approved for display
                </div>
            </div>
        </div>

        <!-- Reviews Table Card -->
        <div class="biz-card">
            <div class="biz-card-header">
                <h3 class="biz-card-title">
                    <i class="fas fa-list me-2" style="color: var(--biz-primary);"></i>
                    All Reviews
                </h3>
                <span class="biz-text-sm text-muted">{{ $reviews->total() }} total</span>
            </div>
            <div class="biz-card-body">

                <!-- Search & Filter Bar -->
                <form method="GET" action="{{ route('admin_reviews') }}" class="mb-4">
                    <div class="biz-search-bar">
                        <div class="biz-search-input-group">
                            <i class="fas fa-search biz-search-icon"></i>
                            <input
                                type="text"
                                name="search"
                                class="biz-search-input"
                                placeholder="Search by reviewer name, business, or comment..."
                                value="{{ request('search') }}"
                                autocomplete="off"
                            >
                        </div>

                        <select name="rating" class="biz-filter-select">
                            <option value="">All Ratings</option>
                            <option value="5" {{ request('rating') === '5' ? 'selected' : '' }}>★★★★★ (5)</option>
                            <option value="4" {{ request('rating') === '4' ? 'selected' : '' }}>★★★★ (4)</option>
                            <option value="3" {{ request('rating') === '3' ? 'selected' : '' }}>★★★ (3)</option>
                            <option value="2" {{ request('rating') === '2' ? 'selected' : '' }}>★★ (2)</option>
                            <option value="1" {{ request('rating') === '1' ? 'selected' : '' }}>★ (1)</option>
                        </select>

                        <select name="status" class="biz-filter-select">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>

                        <button type="submit" class="biz-btn-primary" style="padding: 0.55rem 1.1rem; font-size: 0.85rem;">
                            <i class="fas fa-filter"></i> Filter
                        </button>

                        <a href="{{ route('admin_reviews') }}" class="biz-btn-outline" style="padding: 0.55rem 1.1rem; font-size: 0.85rem;">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </form>

                <!-- Table -->
                @if($reviews->count() > 0)
                    <div class="biz-table-wrapper">
                        <table class="biz-table">
                            <thead>
                                <tr>
                                    <th>Reviewer</th>
                                    <th>Business</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>
                                            <div class="biz-table-user">
                                                <div class="biz-user-avatar-sm">
                                                    {{ $review->user ? substr($review->user->firstname, 0, 1) . substr($review->user->lastname, 0, 1) : '??' }}
                                                </div>
                                                <div>
                                                    <div class="biz-user-name">
                                                        {{ $review->user ? $review->user->firstname . ' ' . $review->user->lastname : 'Deleted User' }}
                                                    </div>
                                                    <div class="biz-user-email">
                                                        {{ $review->user ? $review->user->email : '—' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="biz-table-user">
                                                <div>
                                                    <div class="biz-user-name" style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $review->business ? $review->business->name : 'Deleted Business' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="biz-rating-stars" style="color: #f59e0b; white-space: nowrap;">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star" style="font-size: 0.8rem;"></i>
                                                    @else
                                                        <i class="far fa-star" style="font-size: 0.8rem; opacity: 0.3;"></i>
                                                    @endif
                                                @endfor
                                                <span class="text-muted" style="font-size: 0.75rem; margin-left: 4px;">({{ $review->rating }})</span>
                                            </div>
                                        </td>
                                        <td style="max-width: 280px;">
                                            @if($review->title)
                                                <div class="biz-user-name" style="font-size: 0.82rem; margin-bottom: 2px;">{{ $review->title }}</div>
                                            @endif
                                            <div class="biz-user-email" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $review->comment ? Str::limit($review->comment, 120) : '—' }}
                                            </div>
                                            @if($review->verified_visit)
                                                <span class="biz-status-badge biz-status-verified" style="font-size: 0.65rem; margin-top: 4px; display: inline-flex; gap: 3px;">
                                                    <i class="fas fa-check-circle" style="font-size: 0.6rem;"></i> Verified Visit
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($review->status === 'approved')
                                                <span class="biz-status-badge biz-status-verified">Approved</span>
                                            @elseif($review->status === 'rejected')
                                                <span class="biz-status-badge biz-status-suspended">Rejected</span>
                                            @else
                                                <span class="biz-status-badge biz-status-unverified">Pending</span>
                                            @endif
                                        </td>
                                        <td style="white-space: nowrap; font-size: 0.82rem;">
                                            {{ $review->created_at->format('M d, Y') }}
                                            <span class="text-muted" style="display: block; font-size: 0.72rem;">
                                                {{ $review->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="biz-action-group" style="justify-content: center;">
                                                <!-- View Details -->
                                                <a href="" class="biz-action-btn" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Approve -->
                                                @if($review->status !== 'approved')
                                                    <form method="POST" action="{{ route('admin.reviews.approve', $review->id) }}" class="d-inline" onsubmit="return confirmAction('approve', 'the review by {{ $review->user ? $review->user->firstname . ' ' . $review->user->lastname : 'Deleted User' }}')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="biz-action-btn" style="color: var(--biz-success);" title="Approve Review">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="biz-action-btn" style="opacity: 0.3; cursor: not-allowed;" title="Already approved">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                @endif

                                                <!-- Reject -->
                                                @if($review->status !== 'rejected')
                                                    <form method="POST" action="{{ route('admin.reviews.reject', $review->id) }}" class="d-inline" onsubmit="return confirmAction('reject', 'the review by {{ $review->user ? $review->user->firstname . ' ' . $review->user->lastname : 'Deleted User' }}')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="biz-action-btn biz-action-warning" style="color: var(--biz-warning);" title="Reject Review">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="biz-action-btn" style="opacity: 0.3; cursor: not-allowed;" title="Already rejected">
                                                        <i class="fas fa-ban"></i>
                                                    </span>
                                                @endif

                                                <!-- Delete -->
                                                <button type="button" class="biz-action-btn biz-action-danger" title="Delete Review"
                                                        onclick="openDeleteModal({{ $review->id }}, '{{ addslashes($review->title ?? 'Untitled') }}')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
                            Showing {{ $reviews->firstItem() }}–{{ $reviews->lastItem() }} of {{ $reviews->total() }} reviews
                        </div>
                        <div class="biz-pagination-links">
                            @if ($reviews->onFirstPage())
                                <span class="page-link disabled"><i class="fas fa-chevron-left"></i></span>
                            @else
                                <a href="{{ $reviews->previousPageUrl() }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                            @endif

                            @foreach ($reviews->getUrlRange(max(1, $reviews->currentPage() - 2), min($reviews->lastPage(), $reviews->currentPage() + 2)) as $page => $url)
                                <a href="{{ $url }}" class="page-link {{ $page === $reviews->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            @if ($reviews->hasMorePages())
                                <a href="{{ $reviews->nextPageUrl() }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                            @else
                                <span class="page-link disabled"><i class="fas fa-chevron-right"></i></span>
                            @endif
                        </div>
                    </div>

                @else
                    <!-- Empty State -->
                    <div class="biz-empty-state">
                        <i class="fas fa-star"></i>
                        @if(request('search') || request('rating') || request('status'))
                            <p>No reviews match your search criteria.</p>
                            <a href="{{ route('admin_reviews') }}" class="biz-btn-outline mt-3" style="display: inline-flex;">
                                <i class="fas fa-undo"></i> Clear Filters
                            </a>
                        @else
                            <p>No reviews have been submitted yet.</p>
                        @endif
                    </div>
                @endif

            </div>
        </div>

    </div>

    <!-- Delete Confirmation Modal -->
    <div class="biz-modal-overlay" id="deleteModal">
        <div class="biz-modal">
            <i class="fas fa-exclamation-triangle" style="font-size: 2.5rem; color: var(--biz-danger); margin-bottom: 1rem;"></i>
            <h4>Delete Review</h4>
            <p id="deleteModalMessage">Are you sure you want to delete this review? This action cannot be undone.</p>
            <form method="POST" id="deleteForm" action="">
                @csrf
                @method('DELETE')
                <div class="biz-modal-actions">
                    <button type="button" class="biz-btn-outline" onclick="closeDeleteModal()" style="padding: 0.6rem 1.5rem;">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="biz-btn-primary" style="background-color: var(--biz-danger); padding: 0.6rem 1.5rem;">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sidebar Toggle
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

            // Close modal on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeDeleteModal();
                }
            });

            // Close modal on overlay click
            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                deleteModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeDeleteModal();
                    }
                });
            }
        });

        // Confirm Action (approve/reject)
        function confirmAction(action, subject) {
            return confirm(`Are you sure you want to ${action} ${subject}?`);
        }

        // Delete Modal
        function openDeleteModal(reviewId, reviewTitle) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            const message = document.getElementById('deleteModalMessage');

            form.action = '{{}}' + reviewId;
            message.textContent = `Are you sure you want to delete "${reviewTitle}"? This action cannot be undone.`;
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
