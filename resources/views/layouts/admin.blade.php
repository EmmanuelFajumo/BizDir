<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BizDir') }} - {{ $title ?? 'Admin Panel' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome 6 (Free) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Admin Dashboard CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="biz-owner-body">

    <!-- SIDEBAR OVERLAY (Mobile) -->
    <div class="biz-sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="biz-sidebar" id="bizSidebar">
        <!-- Brand -->
        <a href="{{ route('admin.dashboard') }}" class="biz-sidebar-brand">
            <i class="fas fa-shield-alt"></i>
            BizDir
            <span class="biz-badge">Admin</span>
        </a>

        <!-- Navigation -->
        <nav class="biz-sidebar-nav">
            <div class="biz-nav-label">Main</div>

            <div class="biz-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="biz-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </div>

            <div class="biz-nav-item">
                <a href="{{ route('users') }}" class="biz-nav-link {{ request()->routeIs('admin.users') || request()->routeIs('users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </div>

            <div class="biz-nav-item">
                <a href="{{ route("admin_businesses") }}" class="biz-nav-link {{ request()->routeIs('admin.businesses.*') ? 'active' : '' }}">
                    <i class="fas fa-store"></i>
                    Businesses
                </a>
            </div>

            <div class="biz-nav-item">
                <a href="{{ route('admin_reviews') }}" class="biz-nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    Reviews
                </a>
            </div>

            <div class="biz-nav-item">
                <a href="" class="biz-nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    <i class="fas fa-flag"></i>
                    Reports
                </a>
            </div>

            <div class="biz-nav-item">
                <a href="" class="biz-nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>
                    Categories
                </a>
            </div>

            <div class="biz-nav-label mt-3">System</div>

            <div class="biz-nav-item">
                <a href="#" class="biz-nav-link">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </div>
            @if (Auth::user()->role === 'super_admin')
                <div class="biz-nav-item">
                <a href="{{route('admin.manage_admin')}}" class="biz-nav-link">
                    <i class="fas fa-cog"></i>
                    Admin Management
                </a>
            </div>
            @endif

        </nav>

        <!-- Sidebar Footer -->
        <div class="biz-sidebar-footer">
            <a href="{{ route('profile.edit') }}" class="biz-user-info">
                <div class="biz-user-avatar">
                    {{ substr(Auth::user()->firstname, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}
                </div>
                <div class="biz-user-details">
                    <div class="biz-user-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                    <div class="biz-user-role">
                        @if(Auth::user()->isSuperAdmin())
                            Super Admin
                        @else
                            Admin
                        @endif
                    </div>
                </div>
                <i class="fas fa-chevron-right biz-chevron"></i>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('bizSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');

            if (toggle) {
                toggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>

    @stack('scripts')

</body>
</html>
