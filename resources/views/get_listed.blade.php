<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BizDir') }} - Get Listed</title>

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

    <link rel="stylesheet" href={{ asset("css/getlisted.css") }}>
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
                <a href="{{ route('dashboard') }}" class="nav-link">
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
                <a href="{{ route('get_listed') }}" class="nav-link active">
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
                    <div class="user-role">{{ Auth::user()->role ?? 'Member' }}</div>
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
                <h1 class="page-title">Get Listed</h1>
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

             

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-custom alert-danger mb-4">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Header -->
            <div class="listing-header">
                <div class="header-content">
                    <h2><i class="fas fa-store me-2"></i> List Your Business</h2>
                    <p>Fill in the details below to get your business listed on BizDir. Reach more customers and grow your presence online.</p>
                </div>
                <i class="fas fa-store header-icon"></i>
            </div>

            <!-- Listing Form -->
            <form action="{{ route('business.store') }}" method="POST" enctype="multipart/form-data" id="listingForm">
                @csrf

                <!-- Section 1: Basic Information -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-info-circle"></i>
                        Basic Information
                    </div>
                    <div class="section-subtitle">Tell customers what your business is all about.</div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Business Name <span class="required">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Joe's Bakery & Cafe" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="category_id" class="form-label">Category <span class="required">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Business Description <span class="required">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Describe your business, products, services, and what makes you unique..." required>{{ old('description') }}</textarea>
                            <div class="form-text">Tell potential customers about your business. Include key details like what you offer, your specialties, and what sets you apart.</div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 2: Location -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-map-marker-alt"></i>
                        Location
                    </div>
                    <div class="section-subtitle">Where can customers find you?</div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="state_id" class="form-label">State <span class="required">*</span></label>
                            <select class="form-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" required>
                                <option value="">Select a state</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="lga_id" class="form-label">LGA <span class="required">*</span></label>
                            <select class="form-select @error('lga_id') is-invalid @enderror" id="lga_id" name="lga_id" required>
                                <option value="">Select a state first</option>
                            </select>
                            @error('lga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label">Street Address <span class="required">*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="e.g. 123 Main Street, Suite 100" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 3: Contact Information -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-phone-alt"></i>
                        Contact Information
                    </div>
                    <div class="section-subtitle">How can customers reach you?</div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number <span class="required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. +234 801 234 5678" required>
                            </div>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label">WhatsApp Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="e.g. +234 801 234 5678">
                            </div>
                            @error('whatsapp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Business Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. hello@mybusiness.com">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="website" class="form-label">Website</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="e.g. https://mybusiness.com">
                            </div>
                            @error('website')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 4: Social Media -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-share-alt"></i>
                        Social Media
                    </div>
                    <div class="section-subtitle">Connect your social media profiles (optional).</div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-facebook-f" style="color: #1877F2;"></i></span>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="Facebook page URL or handle">
                            </div>
                            @error('facebook')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="instagram" class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram" style="color: #E4405F;"></i></span>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="Instagram handle or URL">
                            </div>
                            @error('instagram')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="x" class="form-label">X (Twitter)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-x-twitter"></i></span>
                                <input type="text" class="form-control @error('x') is-invalid @enderror" id="x" name="x" value="{{ old('x') }}" placeholder="X profile URL or handle">
                            </div>
                            @error('x')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-linkedin-in" style="color: #0A66C2;"></i></span>
                                <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin') }}" placeholder="LinkedIn page URL">
                            </div>
                            @error('linkedin')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="youtube" class="form-label">YouTube</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube" style="color: #FF0000;"></i></span>
                                <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ old('youtube') }}" placeholder="YouTube channel URL">
                            </div>
                            @error('youtube')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 5: Business Details -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-chart-bar"></i>
                        Business Details
                    </div>
                    <div class="section-subtitle">Additional information about your business.</div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="year_established" class="form-label">Year Established</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input type="number" class="form-control @error('year_established') is-invalid @enderror" id="year_established" name="year_established" value="{{ old('year_established') }}" placeholder="e.g. 2020" min="1800" max="{{ date('Y') }}">
                            </div>
                            <div class="form-text">The year your business started operating.</div>
                            @error('year_established')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="employees" class="form-label">Number of Employees</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                <input type="number" class="form-control @error('employees') is-invalid @enderror" id="employees" name="employees" value="{{ old('employees') }}" placeholder="e.g. 10" min="1" max="100000">
                            </div>
                            <div class="form-text">Approximate number of employees in your business.</div>
                            @error('employees')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 6: Branding -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-image"></i>
                        Branding & Media
                    </div>
                    <div class="section-subtitle">Upload your business logo and cover image to make your listing stand out.</div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Business Logo</label>
                            <div class="file-upload-wrapper">
                                <div class="file-upload-area" id="logoUploadArea" onclick="document.getElementById('logo').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div class="upload-text">Click to upload your logo</div>
                                    <div class="upload-hint">PNG, JPG or WebP • Max 2MB</div>
                                </div>
                                <input type="file" class="d-none" id="logo" name="logo" accept="image/jpeg,image/png,image/webp">
                                <div class="file-preview" id="logoPreview">
                                    <img src="" alt="Logo preview">
                                    <div class="file-info">
                                        <div class="file-name"></div>
                                        <div class="file-size"></div>
                                    </div>
                                    <button type="button" class="file-remove" onclick="removeFile('logo')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @error('logo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cover Image</label>
                            <div class="file-upload-wrapper">
                                <div class="file-upload-area" id="coverUploadArea" onclick="document.getElementById('cover_image').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div class="upload-text">Click to upload a cover image</div>
                                    <div class="upload-hint">PNG, JPG or WebP • Max 5MB</div>
                                </div>
                                <input type="file" class="d-none" id="cover_image" name="cover_image" accept="image/jpeg,image/png,image/webp">
                                <div class="file-preview" id="coverPreview">
                                    <img src="" alt="Cover preview">
                                    <div class="file-info">
                                        <div class="file-name"></div>
                                        <div class="file-size"></div>
                                    </div>
                                    <button type="button" class="file-remove" onclick="removeFile('cover_image')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @error('cover_image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="submit-section">
                    <div class="submit-info">
                        <i class="fas fa-shield-alt"></i>
                        <p>By submitting, you agree to our <strong>Terms of Service</strong>. Your listing will be reviewed by our team before being published.</p>
                    </div>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-paper-plane"></i>
                        Submit for Review
                    </button>
                </div>

            </form>

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

            // State -> LGA Dynamic Dropdown
            const stateSelect = document.getElementById('state_id');
            const lgaSelect = document.getElementById('lga_id');

            stateSelect.addEventListener('change', function() {
                const stateId = this.value;
                lgaSelect.innerHTML = '<option value="">Loading...</option>';
                lgaSelect.disabled = true;

                if (!stateId) {
                    lgaSelect.innerHTML = '<option value="">Select a state first</option>';
                    lgaSelect.disabled = false;
                    return;
                }

                fetch(`/get-lgas/${stateId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    lgaSelect.innerHTML = '<option value="">Select an LGA</option>';
                    data.forEach(lga => {
                        lgaSelect.innerHTML += `<option value="${lga.id}">${lga.name}</option>`;
                    });
                    lgaSelect.disabled = false;
                })
                .catch(error => {
                    console.error('Error fetching LGAs:', error);
                    lgaSelect.innerHTML = '<option value="">Failed to load LGAs</option>';
                    lgaSelect.disabled = false;
                });
            });

            // If state was previously selected (e.g. after validation error), load LGAs
            if (stateSelect.value) {
                stateSelect.dispatchEvent(new Event('change'));
                // Re-select the old LGA value after loading
                const oldLga = '{{ old('lga_id') }}';
                if (oldLga) {
                    setTimeout(() => {
                        lgaSelect.value = oldLga;
                    }, 500);
                }
            }

            // File Upload Preview
            function setupFileUpload(inputId, areaId, previewId) {
                const input = document.getElementById(inputId);
                const area = document.getElementById(areaId);
                const preview = document.getElementById(previewId);
                const img = preview.querySelector('img');
                const fileName = preview.querySelector('.file-name');
                const fileSize = preview.querySelector('.file-size');

                input.addEventListener('change', function() {
                    const file = this.files[0];
                    if (!file) return;

                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please upload a valid image file (PNG, JPG, or WebP).');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                        fileName.textContent = file.name;
                        fileSize.textContent = (file.size / 1024).toFixed(1) + ' KB';
                        area.classList.add('has-file');
                        preview.classList.add('show');
                    };
                    reader.readAsDataURL(file);
                });
            }

            setupFileUpload('logo', 'logoUploadArea', 'logoPreview');
            setupFileUpload('cover_image', 'coverUploadArea', 'coverPreview');

            // Form Submit Loading State
            const form = document.getElementById('listingForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            });
        });

        // Remove File (Global function)
        function removeFile(inputId) {
            const input = document.getElementById(inputId);
            const areaId = inputId + 'UploadArea';
            const previewId = inputId + 'Preview';

            input.value = '';
            document.getElementById(areaId).classList.remove('has-file');
            document.getElementById(previewId).classList.remove('show');
        }
    </script>

</body>
</html>
