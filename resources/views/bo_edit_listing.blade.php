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
                <h1 class="biz-page-title">Edit Listing</h1>
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

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="biz-banner-title" style="color: var(--biz-dark);">Edit Your Business</h2>
                <p class="text-muted" style="font-size: 0.9rem;">Update the details below for your business listing. Fields marked with <span class="text-danger">*</span> are required.</p>
            </div>
            <a href="{{ route('bo_dashboard') }}" class="biz-btn-outline">
                <i class="fas fa-arrow-left"></i>
                Back to Dashboard
            </a>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="biz-alert biz-alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="biz-alert biz-alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-1" style="font-weight: 400;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Edit Listing Form -->
        <form method="POST" action="{{ route('business.updateBusiness', $business->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            <div class="row g-4">

                <!-- LEFT COLUMN - Main Details -->
                <div class="col-lg-8">

                    <!-- Basic Information -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-info-circle" style="color: var(--biz-primary);"></i>
                                Basic Information
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="row g-3">
                                <!-- Business Name -->
                                <div class="col-12">
                                    <label for="name" class="form-label fw-semibold">
                                        Business Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $business->name) }}"
                                           placeholder="e.g. Joe's Auto Repair"
                                           required
                                           maxlength="255">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <label for="description" class="form-label fw-semibold">
                                        Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea id="description"
                                              name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              rows="5"
                                              placeholder="Describe your business, services offered, what makes you unique..."
                                              required
                                              maxlength="5000">{{ old('description', $business->description) }}</textarea>
                                    <div class="form-text">
                                        <span id="descCharCount">{{ strlen(old('description', $business->description)) }}</span>/5000 characters
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category & Year Established -->
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label fw-semibold">
                                        Category <span class="text-danger">*</span>
                                    </label>
                                    <select id="category_id"
                                            name="category_id"
                                            class="form-select @error('category_id') is-invalid @enderror"
                                            required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $business->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="year_established" class="form-label fw-semibold">Year Established</label>
                                    <select id="year_established"
                                            name="year_established"
                                            class="form-select @error('year_established') is-invalid @enderror">
                                        <option value="">-- Select --</option>
                                        @for ($year = date('Y'); $year >= 1800; $year--)
                                            <option value="{{ $year }}" {{ old('year_established', $business->year_established) == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('year_established')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="employees" class="form-label fw-semibold">Employees</label>
                                    <input type="number"
                                           id="employees"
                                           name="employees"
                                           class="form-control @error('employees') is-invalid @enderror"
                                           value="{{ old('employees', $business->employees) }}"
                                           placeholder="e.g. 10"
                                           min="1"
                                           max="100000">
                                    @error('employees')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-clock" style="color: var(--biz-primary);"></i>
                                Business Hours
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <p class="text-muted small mb-3">Set your business opening and closing days/hours. Check "Closed" if your business is closed on a particular day.</p>

                            @php
                                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            @endphp

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle mb-0" id="hoursTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20%;">Day</th>
                                            <th style="width: 10%;">Closed</th>
                                            <th style="width: 35%;">Opens At</th>
                                            <th style="width: 35%;">Closes At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($days as $day)
                                            @php
                                                $hourEntry = $openingHours[$day] ?? null;
                                                $isClosed = old('opening_hours.' . $loop->index . '.is_closed', $hourEntry ? ($hourEntry->is_closed ? '1' : '') : '');
                                                $opensAt = old('opening_hours.' . $loop->index . '.opens_at', $hourEntry && $hourEntry->opens_at ? \Carbon\Carbon::parse($hourEntry->opens_at)->format('H:i') : '');
                                                $closesAt = old('opening_hours.' . $loop->index . '.closes_at', $hourEntry && $hourEntry->closes_at ? \Carbon\Carbon::parse($hourEntry->closes_at)->format('H:i') : '');
                                            @endphp
                                            <tr>
                                                <td class="fw-semibold">{{ $day }}</td>
                                                <td class="text-center">
                                                    <div class="form-check form-switch d-flex justify-content-center mb-0">
                                                        <input class="form-check-input day-closed-checkbox"
                                                               type="checkbox"
                                                               id="is_closed_{{ $loop->index }}"
                                                               name="opening_hours[{{ $loop->index }}][is_closed]"
                                                               value="1"
                                                               {{ $isClosed ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time"
                                                           id="opens_at_{{ $loop->index }}"
                                                           name="opening_hours[{{ $loop->index }}][opens_at]"
                                                           class="form-control form-control-sm opens-at-input"
                                                           value="{{ $opensAt }}"
                                                           {{ $isClosed ? 'disabled' : '' }}>
                                                </td>
                                                <td>
                                                    <input type="time"
                                                           id="closes_at_{{ $loop->index }}"
                                                           name="opening_hours[{{ $loop->index }}][closes_at]"
                                                           class="form-control form-control-sm closes-at-input"
                                                           value="{{ $closesAt }}"
                                                           {{ $isClosed ? 'disabled' : '' }}>
                                                </td>
                                            </tr>
                                            <input type="hidden" name="opening_hours[{{ $loop->index }}][day]" value="{{ $day }}">
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle"></i>
                                Leave time fields empty and check "Closed" for days your business is not open.
                            </div>
                            @error('opening_hours')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @error('opening_hours.*.opens_at')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @error('opening_hours.*.closes_at')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-map-marker-alt" style="color: var(--biz-primary);"></i>
                                Location
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="row g-3">
                                <!-- State -->
                                <div class="col-md-6">
                                    <label for="state_id" class="form-label fw-semibold">
                                        State <span class="text-danger">*</span>
                                    </label>
                                    <select id="state_id"
                                            name="state_id"
                                            class="form-select @error('state_id') is-invalid @enderror"
                                            required>
                                        <option value="">-- Select State --</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}" {{ old('state_id', $business->state_id) == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- LGA -->
                                <div class="col-md-6">
                                    <label for="lga_id" class="form-label fw-semibold">
                                        LGA <span class="text-danger">*</span>
                                    </label>
                                    <select id="lga_id"
                                            name="lga_id"
                                            class="form-select @error('lga_id') is-invalid @enderror"
                                            required>
                                        <option value="">-- Select LGA --</option>
                                        @foreach ($lgas as $lga)
                                            <option value="{{ $lga->id }}" {{ old('lga_id', $business->lga_id) == $lga->id ? 'selected' : '' }}>
                                                {{ $lga->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lga_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label for="address" class="form-label fw-semibold">
                                        Street Address <span class="text-danger">*</span>
                                    </label>
                                    <textarea id="address"
                                              name="address"
                                              class="form-control @error('address') is-invalid @enderror"
                                              rows="2"
                                              placeholder="e.g. 123 Main Street, Suite 100"
                                              required
                                              maxlength="500">{{ old('address', $business->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-phone-alt" style="color: var(--biz-primary);"></i>
                                Contact Information
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="row g-3">
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-semibold">
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           id="phone"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $business->phone) }}"
                                           placeholder="e.g. +234 800 000 0000"
                                           required
                                           maxlength="20">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- WhatsApp -->
                                <div class="col-md-6">
                                    <label for="whatsapp" class="form-label fw-semibold">WhatsApp Number</label>
                                    <input type="text"
                                           id="whatsapp"
                                           name="whatsapp"
                                           class="form-control @error('whatsapp') is-invalid @enderror"
                                           value="{{ old('whatsapp', $business->whatsapp) }}"
                                           placeholder="e.g. +234 800 000 0000"
                                           maxlength="20">
                                    @error('whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Business Email</label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $business->email) }}"
                                           placeholder="e.g. info@yourbusiness.com"
                                           maxlength="255">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Website -->
                                <div class="col-md-6">
                                    <label for="website" class="form-label fw-semibold">Website</label>
                                    <input type="url"
                                           id="website"
                                           name="website"
                                           class="form-control @error('website') is-invalid @enderror"
                                           value="{{ old('website', $business->website) }}"
                                           placeholder="e.g. https://www.yourbusiness.com"
                                           maxlength="255">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-share-alt" style="color: var(--biz-primary);"></i>
                                Social Media Links
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="facebook" class="form-label fw-semibold">
                                        <i class="fab fa-facebook" style="color: #1877F2;"></i> Facebook
                                    </label>
                                    <input type="text"
                                           id="facebook"
                                           name="facebook"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           value="{{ old('facebook', $business->facebook) }}"
                                           placeholder="Facebook page URL or handle"
                                           maxlength="255">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="instagram" class="form-label fw-semibold">
                                        <i class="fab fa-instagram" style="color: #E4405F;"></i> Instagram
                                    </label>
                                    <input type="text"
                                           id="instagram"
                                           name="instagram"
                                           class="form-control @error('instagram') is-invalid @enderror"
                                           value="{{ old('instagram', $business->instagram) }}"
                                           placeholder="Instagram handle or URL"
                                           maxlength="255">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="x" class="form-label fw-semibold">
                                        <i class="fab fa-x-twitter" style="color: #000000;"></i> X (Twitter)
                                    </label>
                                    <input type="text"
                                           id="x"
                                           name="x"
                                           class="form-control @error('x') is-invalid @enderror"
                                           value="{{ old('x', $business->x) }}"
                                           placeholder="X/Twitter handle or URL"
                                           maxlength="255">
                                    @error('x')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="linkedin" class="form-label fw-semibold">
                                        <i class="fab fa-linkedin" style="color: #0A66C2;"></i> LinkedIn
                                    </label>
                                    <input type="text"
                                           id="linkedin"
                                           name="linkedin"
                                           class="form-control @error('linkedin') is-invalid @enderror"
                                           value="{{ old('linkedin', $business->linkedin) }}"
                                           placeholder="LinkedIn page URL"
                                           maxlength="255">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="youtube" class="form-label fw-semibold">
                                        <i class="fab fa-youtube" style="color: #FF0000;"></i> YouTube
                                    </label>
                                    <input type="text"
                                           id="youtube"
                                           name="youtube"
                                           class="form-control @error('youtube') is-invalid @enderror"
                                           value="{{ old('youtube', $business->youtube) }}"
                                           placeholder="YouTube channel URL"
                                           maxlength="255">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-4">

                    <!-- Logo Upload -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-image" style="color: var(--biz-primary);"></i>
                                Business Logo
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="text-center">
                                <!-- Logo Preview -->
                                <div id="logoPreview"
                                     class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                                     style="width: 150px; height: 150px; border: 2px dashed var(--biz-gray-300); border-radius: var(--biz-radius); background-color: var(--biz-gray-50); overflow: hidden;">
                                    @if ($business->logo)
                                        <img src="{{ $business->logo_url }}" alt="Business Logo" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-store" style="font-size: 3rem; color: var(--biz-gray-300);"></i>
                                    @endif
                                </div>
                                <p class="text-muted small mb-2">Recommended: 400x400px, max 2MB</p>
                                <label for="logo" class="biz-btn-outline w-100 justify-content-center" style="cursor: pointer;">
                                    <i class="fas fa-upload"></i>
                                    Change Logo
                                </label>
                                <input type="file"
                                       id="logo"
                                       name="logo"
                                       class="d-none"
                                       accept="image/jpeg,image/png,image/jpg,image/webp">
                                @error('logo')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Cover Image Upload -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-photo-video" style="color: var(--biz-primary);"></i>
                                Cover Image
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <div class="text-center">
                                <!-- Cover Preview -->
                                <div id="coverPreview"
                                     class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                                     style="width: 100%; height: 180px; border: 2px dashed var(--biz-gray-300); border-radius: var(--biz-radius-sm); background-color: var(--biz-gray-50); overflow: hidden;">
                                    @if ($business->cover_image)
                                        <img src="{{ $business->cover_image_url }}" alt="Cover Image" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-mountain" style="font-size: 3rem; color: var(--biz-gray-300);"></i>
                                    @endif
                                </div>
                                <p class="text-muted small mb-2">Recommended: 1200x400px, max 5MB</p>
                                <label for="cover_image" class="biz-btn-outline w-100 justify-content-center" style="cursor: pointer;">
                                    <i class="fas fa-upload"></i>
                                    Change Cover Image
                                </label>
                                <input type="file"
                                       id="cover_image"
                                       name="cover_image"
                                       class="d-none"
                                       accept="image/jpeg,image/png,image/jpg,image/webp">
                                @error('cover_image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submission Tips -->
                    <div class="biz-card mb-4">
                        <div class="biz-card-header">
                            <h3 class="biz-card-title">
                                <i class="fas fa-lightbulb" style="color: var(--biz-warning);"></i>
                                Tips for a Great Listing
                            </h3>
                        </div>
                        <div class="biz-card-body">
                            <ul class="list-unstyled mb-0" style="font-size: 0.88rem; color: var(--biz-gray-600);">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Use a clear, professional logo
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Write a detailed description of your services
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Provide accurate contact information
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Add social media links to build trust
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Choose the right category for your business
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    A high-quality cover image makes your listing stand out
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-between align-items-center mt-4 mb-5">
                <a href="{{ route('bo_dashboard') }}" class="biz-btn-outline">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
                <button type="submit" class="biz-btn-primary" style="padding: 0.75rem 2rem;">
                    <i class="fas fa-save"></i>
                    Update Listing
                </button>
            </div>

        </form>

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

            // 2. STATE -> LGA DYNAMIC DROPDOWN
            const stateSelect = document.getElementById('state_id');
            const lgaSelect = document.getElementById('lga_id');

            if (stateSelect && lgaSelect) {
                // Load LGAs on state change
                stateSelect.addEventListener('change', function () {
                    const stateId = this.value;

                    // Reset LGA dropdown
                    lgaSelect.innerHTML = '<option value="">-- Select LGA --</option>';
                    lgaSelect.disabled = true;

                    if (!stateId) return;

                    // Show loading state
                    lgaSelect.innerHTML = '<option value="">Loading...</option>';

                    fetch(`/get-lgas/${stateId}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            lgaSelect.innerHTML = '<option value="">-- Select LGA --</option>';
                                data.forEach(lga => {
                                    const option = document.createElement('option');
                                    option.value = lga.id;
                                    option.textContent = lga.name;
                                    lgaSelect.appendChild(option);
                                });

                            lgaSelect.disabled = false;

                            // Restore the current LGA value after loading
                            const currentLgaId = '{{ $business->lga_id }}';
                            if (currentLgaId && lgaSelect.querySelector(`option[value="${currentLgaId}"]`)) {
                                lgaSelect.value = currentLgaId;
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching LGAs:', error);
                            lgaSelect.innerHTML = '<option value="">Error loading LGAs</option>';
                            lgaSelect.disabled = false;
                        });
                });

                // Trigger change to load initial LGAs
                if (stateSelect.value) {
                    const event = new Event('change');
                    stateSelect.dispatchEvent(event);
                }
            }

            // 3. IMAGE PREVIEWS
            function setupImagePreview(inputId, previewId, placeholderIcon) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(previewId);

                if (!input || !preview) return;

                input.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (!file) {
                        // If no file selected, keep existing image or placeholder
                        return;
                    }

                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        preview.innerHTML = `
                            <div class="text-danger text-center p-3">
                                <i class="fas fa-exclamation-triangle" style="font-size: 2rem;"></i>
                                <p class="small mt-1 mb-0">Invalid file type</p>
                            </div>
                        `;
                        return;
                    }

                    // Validate file size (logo: 2MB, cover: 5MB)
                    const maxSize = inputId === 'logo' ? 2 * 1024 * 1024 : 5 * 1024 * 1024;
                    if (file.size > maxSize) {
                        const maxSizeMB = maxSize / (1024 * 1024);
                        preview.innerHTML = `
                            <div class="text-danger text-center p-3">
                                <i class="fas fa-exclamation-triangle" style="font-size: 2rem;"></i>
                                <p class="small mt-1 mb-0">File too large (max ${maxSizeMB}MB)</p>
                            </div>
                        `;
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">`;
                    };
                    reader.readAsDataURL(file);
                });
            }

            // Logo preview
            setupImagePreview('logo', 'logoPreview', '<i class="fas fa-store" style="font-size: 3rem; color: var(--biz-gray-300);"></i>');

            // Cover image preview
            setupImagePreview('cover_image', 'coverPreview', '<i class="fas fa-mountain" style="font-size: 3rem; color: var(--biz-gray-300);"></i>');

            // 4. DESCRIPTION CHARACTER COUNTER
            const descField = document.getElementById('description');
            const descCounter = document.getElementById('descCharCount');

            if (descField && descCounter) {
                descField.addEventListener('input', function () {
                    descCounter.textContent = this.value.length;
                });

                // Initialize counter
                descCounter.textContent = descField.value.length;
            }

            // 5. BUSINESS HOURS - TOGGLE TIME INPUTS ON CLOSED CHECKBOX
            const closedCheckboxes = document.querySelectorAll('.day-closed-checkbox');
            closedCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const row = this.closest('tr');
                    const opensInput = row.querySelector('.opens-at-input');
                    const closesInput = row.querySelector('.closes-at-input');

                    if (this.checked) {
                        opensInput.disabled = true;
                        opensInput.value = '';
                        closesInput.disabled = true;
                        closesInput.value = '';
                    } else {
                        opensInput.disabled = false;
                        closesInput.disabled = false;
                    }
                });
            });

            // 6. BOOTSTRAP FORM VALIDATION
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

        });
    </script>
@endpush
