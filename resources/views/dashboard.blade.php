<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BizDir') }} - Dashboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome 6 (Free) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Dashboard Custom CSS -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="dashboard-body">

    <!-- SIDEBAR OVERLAY (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="dashboard-sidebar" id="dashboardSidebar">
        <!-- Brand -->
        <a href="{{ url('/') }}" class="sidebar-brand">
            <i class="fas fa-building"></i>
            BizDir
        </a>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>

            <div class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-search"></i>
                    Browse Businesses
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-bookmark"></i>
                    Saved
                </a>
            </div>

            <div class="nav-label mt-3">Account</div>

            <div class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    My Profile
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('get_listed') }}" class="nav-link">
            <i class="fas fa-plus"></i>
                Get Listed
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-star"></i>
                    My Reviews
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-gear"></i>
                    Settings
                </a>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <a href="{{ route('profile.edit') }}" class="user-info">
                <div class="user-avatar">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ Auth::user()->role }}</div>
                </div>
                <i class="fas fa-chevron-right" style="font-size: 0.8rem; color: var(--dash-gray-400);"></i>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="dashboard-main">

        <!-- Top Bar -->
        <header class="dashboard-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">Dashboard</h1>
            </div>

            <div class="topbar-actions">
                <button class="btn-icon" aria-label="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-dot"></span>
                </button>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn-icon" aria-label="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Content -->
        <div class="dashboard-content">

            <!-- Welcome Card -->
            <div class="welcome-card">
                <div class="welcome-content">
                    <h3>Welcome back, {{ Auth::user()->name }}!</h3>
                    <p>Here's what's happening with your account today.</p>
                </div>
                <i class="fas fa-user-tie welcome-icon"></i>
            </div>

            <!-- Stats Row -->
            <div class="row">
                 <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-custom alert-success mb-4">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <div class="stat-label">Saved Businesses</div>
                        <div class="stat-value">0</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-label">Reviews</div>
                        <div class="stat-value">0</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon cyan">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <div class="stat-label">Account Status</div>
                        <div class="stat-value" style="color: var(--dash-success);">Active</div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="row g-3">
                <!-- Recent Activity -->
                <div class="col-md-7">
                    <div class="dash-card">
                        <div class="card-header">
                            <h6><i class="fas fa-clock me-2" style="color: var(--dash-primary);"></i>Recent Activity</h6>
                        </div>
                        <div class="card-body">
                            <ul class="activity-list">
                                <li class="activity-item">
                                    <span class="activity-dot blue"></span>
                                    <div class="activity-text">
                                        <strong>Welcome!</strong> Your account has been created successfully.
                                    </div>
                                    <span class="activity-time">Just now</span>
                                </li>
                                <li class="activity-item">
                                    <span class="activity-dot green"></span>
                                    <div class="activity-text">
                                        You're now a member of <strong>BizDir</strong>. Start exploring businesses!
                                    </div>
                                    <span class="activity-time">Just now</span>
                                </li>
                                <li class="activity-item">
                                    <span class="activity-dot yellow"></span>
                                    <div class="activity-text">
                                        Tip: Save businesses you like to revisit them later.
                                    </div>
                                    <span class="activity-time">Just now</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-5">
                    <div class="dash-card">
                        <div class="card-header">
                            <h6><i class="fas fa-link me-2" style="color: var(--dash-primary);"></i>Quick Links</h6>
                        </div>
                        <div class="card-body d-flex flex-column gap-2">
                            <a href="{{ url('/') }}" class="quick-action-btn">
                                <i class="fas fa-search"></i>
                                Browse Businesses
                            </a>
                            <a href="{{ route('profile.edit') }}" class="quick-action-btn">
                                <i class="fas fa-user"></i>
                                Edit Profile
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-bookmark"></i>
                                View Saved
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('dashboardSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');

            toggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        });
    </script>

</body>
</html>
