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
                <h1 class="biz-page-title">User Management</h1>
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
                        <i class="fas fa-users" style="color: var(--biz-primary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Total Users</div>
                <div class="biz-stat-value">{{ $totalUsers }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-user-plus"></i>
                    Registered on platform
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-success-light">
                        <i class="fas fa-user-check" style="color: var(--biz-success);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Active Users</div>
                <div class="biz-stat-value">{{ $activeUsers }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-check-circle"></i>
                    {{ $totalUsers > 0 ? round(($activeUsers / $totalUsers) * 100) : 0 }}% of total
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-danger-light">
                        <i class="fas fa-user-slash" style="color: var(--biz-danger);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Suspended</div>
                <div class="biz-stat-value">{{ $suspendedUsers }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ $totalUsers > 0 ? round(($suspendedUsers / $totalUsers) * 100) : 0 }}% of total
                </div>
            </div>

            <div class="biz-stat-card">
                <div class="biz-stat-card-top">
                    <div class="biz-stat-icon bg-biz-secondary-light">
                        <i class="fas fa-shield-alt" style="color: var(--biz-secondary);"></i>
                    </div>
                </div>
                <div class="biz-stat-label">Admins</div>
                <div class="biz-stat-value">{{ $adminUsers }}</div>
                <div class="biz-stat-divider"></div>
                <div class="biz-stat-footer">
                    <i class="fas fa-crown"></i>
                    Including super admins
                </div>
            </div>
        </div>

        <!-- Users Table Card -->
        <div class="biz-card">
            <div class="biz-card-header">
                <h3 class="biz-card-title">
                    <i class="fas fa-list me-2" style="color: var(--biz-primary);"></i>
                    All Users
                </h3>
                <span class="biz-text-sm text-muted">{{ $users->total() }} total</span>
            </div>
            <div class="biz-card-body">

                <!-- Search & Filter Bar -->
                <form method="GET" action="{{ route('users') }}" class="mb-4">
                    <div class="biz-search-bar">
                        <div class="biz-search-input-group">
                            <i class="fas fa-search biz-search-icon"></i>
                            <input
                                type="text"
                                name="search"
                                class="biz-search-input"
                                placeholder="Search by name or email..."
                                value="{{ request('search') }}"
                                autocomplete="off"
                            >
                        </div>

                        <select name="role" class="biz-filter-select">
                            <option value="">All Roles</option>
                            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                            <option value="business_owner" {{ request('role') === 'business_owner' ? 'selected' : '' }}>Business Owner</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ request('role') === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                        </select>

                        <select name="status" class="biz-filter-select">
                            <option value="">All Statuses</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>

                        <button type="submit" class="biz-btn-primary" style="padding: 0.55rem 1.1rem; font-size: 0.85rem;">
                            <i class="fas fa-filter"></i> Filter
                        </button>

                        <a href="{{ route('users') }}" class="biz-btn-outline" style="padding: 0.55rem 1.1rem; font-size: 0.85rem;">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </form>

                <!-- Table -->
                @if($users->count() > 0)
                    <div class="biz-table-wrapper">
                        <table class="biz-table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="{{ route('users', array_merge(request()->query(), ['sort' => 'firstname', 'dir' => request('sort') === 'firstname' && request('dir') === 'asc' ? 'desc' : 'asc'])) }}" style="color: inherit; text-decoration: none;">
                                            User
                                            @if(request('sort') === 'firstname')
                                                <i class="fas fa-sort-{{ request('dir') === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort" style="opacity: 0.3;"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('users', array_merge(request()->query(), ['sort' => 'role', 'dir' => request('sort') === 'role' && request('dir') === 'asc' ? 'desc' : 'asc'])) }}" style="color: inherit; text-decoration: none;">
                                            Role
                                            @if(request('sort') === 'role')
                                                <i class="fas fa-sort-{{ request('dir') === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort" style="opacity: 0.3;"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('users', array_merge(request()->query(), ['sort' => 'status', 'dir' => request('sort') === 'status' && request('dir') === 'asc' ? 'desc' : 'asc'])) }}" style="color: inherit; text-decoration: none;">
                                            Status
                                            @if(request('sort') === 'status')
                                                <i class="fas fa-sort-{{ request('dir') === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort" style="opacity: 0.3;"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('users', array_merge(request()->query(), ['sort' => 'email_verified_at', 'dir' => request('sort') === 'email_verified_at' && request('dir') === 'asc' ? 'desc' : 'asc'])) }}" style="color: inherit; text-decoration: none;">
                                            Verified
                                            @if(request('sort') === 'email_verified_at')
                                                <i class="fas fa-sort-{{ request('dir') === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort" style="opacity: 0.3;"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('users', array_merge(request()->query(), ['sort' => 'created_at', 'dir' => request('sort') === 'created_at' && request('dir') === 'asc' ? 'desc' : 'asc'])) }}" style="color: inherit; text-decoration: none;">
                                            Joined
                                            @if(request('sort') === 'created_at' || !request('sort'))
                                                <i class="fas fa-sort-{{ request('dir') === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort" style="opacity: 0.3;"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="biz-table-user">
                                                <div class="biz-user-avatar-sm">
                                                    {{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="biz-user-name">{{ $user->firstname }} {{ $user->lastname }}</div>
                                                    <div class="biz-user-email">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="biz-role-badge
                                                @if($user->role === 'super_admin')
                                                    biz-role-super-admin
                                                @elseif($user->role === 'admin')
                                                    biz-role-admin
                                                @elseif($user->role === 'business_owner')
                                                    biz-role-business-owner
                                                @else
                                                    biz-role-user
                                                @endif
                                            ">
                                                @if($user->role === 'super_admin')
                                                    Super Admin
                                                @elseif($user->role === 'business_owner')
                                                    Business Owner
                                                @else
                                                    {{ ucfirst($user->role) }}
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($user->status === 'active')
                                                <span class="biz-status-badge biz-status-verified">Active</span>
                                            @else
                                                <span class="biz-status-badge biz-status-suspended">Suspended</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->email_verified_at)
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
                                            {{ $user->created_at->format('M d, Y') }}
                                            <span class="text-muted" style="display: block; font-size: 0.72rem;">
                                                {{ $user->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="biz-action-group" style="justify-content: center;">
                                                <!-- Toggle Status -->
                                                <form method="POST" action="{{ route('admin.users.toggle-status', $user->id) }}" class="d-inline" onsubmit="return confirmToggleStatus('{{ $user->firstname }} {{ $user->lastname }}', '{{ $user->status }}')">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if($user->status === 'active')
                                                        <button type="submit" class="biz-action-btn biz-action-warning" title="Suspend User">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit" class="biz-action-btn" title="Activate User">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    @endif
                                                </form>

                                                <!-- Delete User -->
                                                @if($user->id !== Auth::id())
                                                    <button type="button" class="biz-action-btn biz-action-danger" title="Delete User"
                                                            onclick="openDeleteModal({{ $user->id }}, '{{ $user->firstname }} {{ $user->lastname }}')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @else
                                                    <span class="biz-action-btn" style="opacity: 0.3; cursor: not-allowed;" title="Cannot delete yourself">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span>
                                                @endif
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
                            Showing {{ $users->firstItem() }}–{{ $users->lastItem() }} of {{ $users->total() }} users
                        </div>
                        <div class="biz-pagination-links">
                            @if ($users->onFirstPage())
                                <span class="page-link disabled"><i class="fas fa-chevron-left"></i></span>
                            @else
                                <a href="{{ $users->previousPageUrl() }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                            @endif

                            @foreach ($users->getUrlRange(max(1, $users->currentPage() - 2), min($users->lastPage(), $users->currentPage() + 2)) as $page => $url)
                                <a href="{{ $url }}" class="page-link {{ $page === $users->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                            @else
                                <span class="page-link disabled"><i class="fas fa-chevron-right"></i></span>
                            @endif
                        </div>
                    </div>

                @else
                    <!-- Empty State -->
                    <div class="biz-empty-state">
                        <i class="fas fa-users"></i>
                        @if(request('search') || request('role') || request('status'))
                            <p>No users match your search criteria.</p>
                            <a href="{{ route('admin.users') }}" class="biz-btn-outline mt-3" style="display: inline-flex;">
                                <i class="fas fa-undo"></i> Clear Filters
                            </a>
                        @else
                            <p>No users have registered yet.</p>
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
            <h4>Delete User</h4>
            <p id="deleteModalMessage">Are you sure you want to delete this user? This action cannot be undone.</p>
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

        // Toggle Status Confirmation
        function confirmToggleStatus(name, currentStatus) {
            const action = currentStatus === 'active' ? 'suspend' : 'activate';
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
