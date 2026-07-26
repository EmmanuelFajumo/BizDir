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
                <h1 class="biz-page-title">My Profile</h1>
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

        <!-- Profile Header -->
        <div class="biz-profile-header">
            <div class="biz-profile-avatar">
                {{ substr(Auth::user()->firstname, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}
            </div>
            <div class="biz-profile-info">
                <h2 class="biz-profile-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
                <span class="biz-profile-role">Business Owner</span>
                <span class="biz-profile-email">{{ Auth::user()->email }}</span>
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="biz-card">
            <div class="biz-card-header">
                <h3 class="biz-card-title">Edit Profile</h3>
            </div>
            <div class="biz-card-body">
                <form method="POST" action="{{ route('bo_profile.update') }}" class="biz-profile-form">
                    @csrf

                    <div class="biz-form-row">
                        <div class="biz-form-group">
                            <label for="firstname" class="biz-form-label">First Name</label>
                            <input id="firstname" name="firstname" type="text"
                                   class="biz-form-input @error('firstname') is-invalid @enderror"
                                   value="{{ old('firstname', Auth::user()->firstname) }}" required>
                            @error('firstname')
                                <span class="biz-form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="biz-form-group">
                            <label for="lastname" class="biz-form-label">Last Name</label>
                            <input id="lastname" name="lastname" type="text"
                                   class="biz-form-input @error('lastname') is-invalid @enderror"
                                   value="{{ old('lastname', Auth::user()->lastname) }}" required>
                            @error('lastname')
                                <span class="biz-form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="biz-form-actions">
                        <button type="submit" class="biz-btn biz-btn-primary">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Info Card -->
        <div class="biz-card mt-4">
            <div class="biz-card-header">
                <h3 class="biz-card-title">Account Details</h3>
            </div>
            <div class="biz-card-body biz-account-details">
                <div class="biz-detail-row">
                    <span class="biz-detail-label">Member Since</span>
                    <span class="biz-detail-value">{{ Auth::user()->created_at->format('F d, Y') }}</span>
                </div>
                <div class="biz-detail-row">
                    <span class="biz-detail-label">Email Verified</span>
                    <span class="biz-detail-value">
                        @if (Auth::user()->email_verified_at)
                            <span class="biz-status-badge biz-status-verified">Verified</span>
                        @else
                            <span class="biz-status-badge biz-status-unverified">Unverified</span>
                        @endif
                    </span>
                </div>
                <div class="biz-detail-row">
                    <span class="biz-detail-label">Role</span>
                    <span class="biz-detail-value">Business Owner</span>
                </div>
                <div class="biz-detail-row">
                    <span class="biz-detail-label">Registered Businesses</span>
                    <span class="biz-detail-value">{{ Auth::user()->businesses()->count() }}</span>
                </div>
            </div>
        </div>

    </div>

@endsection
