/**
 * BizDir - Business Directory Homepage JavaScript
 * Author: BizDir Team
 * Version: 1.0.0
 *
 * Features:
 * - Sticky navbar on scroll
 * - Animated counters
 * - Scroll reveal animations (Intersection Observer)
 * - Back to top button
 * - Smooth scroll for anchor links
 * - Lazy loading image verification
 */
'use strict';

document.addEventListener('DOMContentLoaded', function () {

    // ================================================================
    // 1. STICKY NAVBAR
    // ================================================================
    const navbar = document.getElementById('mainNav');

    function handleNavbarScroll() {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    }

    handleNavbarScroll();
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });

    // ================================================================
    // 2. BACK TO TOP BUTTON
    // ================================================================
    const backToTopBtn = document.getElementById('backToTop');

    function handleBackToTopVisibility() {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('show');
            backToTopBtn.style.display = 'flex';
        } else {
            backToTopBtn.classList.remove('show');
            setTimeout(function () {
                if (!backToTopBtn.classList.contains('show')) {
                    backToTopBtn.style.display = 'none';
                }
            }, 300);
        }
    }

    handleBackToTopVisibility();
    window.addEventListener('scroll', handleBackToTopVisibility, { passive: true });

    backToTopBtn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ================================================================
    // 3. ANIMATED COUNTERS
    // ================================================================
    function initCounters() {
        const counters = document.querySelectorAll('.counter');
        if (counters.length === 0) return;

        function animateCounter(counter) {
            const target = parseInt(counter.getAttribute('data-target'), 10);
            const duration = 2000;
            const startTime = performance.now();

            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easedProgress = 1 - Math.pow(1 - progress, 3);
                const currentValue = Math.floor(easedProgress * target);
                counter.textContent = currentValue.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString();
                }
            }

            requestAnimationFrame(updateCounter);
        }

        const counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(function (counter) {
            counterObserver.observe(counter);
        });
    }

    initCounters();

    // ================================================================
    // 4. SCROLL REVEAL ANIMATIONS
    // ================================================================
    function initScrollReveal() {
        const animatedElements = document.querySelectorAll('[data-aos]');
        if (animatedElements.length === 0) return;

        const animationMap = {
            'fade-up': 'fade-in-up',
            'fade-down': 'fade-in-up',
            'fade-left': 'fade-in-left',
            'fade-right': 'fade-in-right',
            'zoom-in': 'scale-in'
        };

        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const aosValue = element.getAttribute('data-aos') || 'fade-up';
                    const animationClass = animationMap[aosValue] || 'fade-in-up';

                    element.classList.add(animationClass);

                    requestAnimationFrame(function () {
                        element.classList.add('visible');
                    });

                    revealObserver.unobserve(element);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(function (element) {
            revealObserver.observe(element);
        });
    }

    initScrollReveal();

    // ================================================================
    // 5. SMOOTH SCROLL FOR ANCHOR LINKS
    // ================================================================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ================================================================
    // 6. LAZY LOADING VERIFICATION
    // ================================================================
    function verifyLazyLoading() {
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        if (lazyImages.length > 0) {
            console.log('✓ Lazy loading enabled on ' + lazyImages.length + ' images');
        }
    }

    verifyLazyLoading();

    // ================================================================
    // 7. NEWSLETTER FORM HANDLING
    // ================================================================
    const newsletterForm = document.querySelector('.newsletter-card form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();

            if (email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(email)) {
                    this.innerHTML = '<div class="alert alert-success mb-0 rounded-pill py-3 px-4">' +
                        '<i class="bi bi-check-circle-fill me-2"></i>Thank you for subscribing!</div>';
                    emailInput.value = '';
                } else {
                    emailInput.classList.add('is-invalid');
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.textContent = 'Please enter a valid email address.';
                    emailInput.parentNode.appendChild(feedback);

                    setTimeout(function () {
                        emailInput.classList.remove('is-invalid');
                        if (feedback.parentNode) {
                            feedback.remove();
                        }
                    }, 3000);
                }
            }
        });
    }

    // ================================================================
    // 8. NAVBAR AUTO-CLOSE ON MOBILE
    // ================================================================
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.getElementById('navbarContent');

    if (navbarToggler && navbarCollapse) {
        const navLinks = navbarCollapse.querySelectorAll('.nav-link');
        const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (navbarToggler.getAttribute('aria-expanded') === 'true') {
                    bsCollapse.hide();
                }
            });
        });
    }

    // ================================================================
    // 9. DEBOUNCE SCROLL EVENTS
    // ================================================================
    function debounce(func, wait) {
        let timeout;
        return function executedFunction() {
            const context = this;
            const args = arguments;
            const later = function () {
                timeout = null;
                func.apply(context, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    const debouncedNavbar = debounce(handleNavbarScroll, 10);
    const debouncedBackToTop = debounce(handleBackToTopVisibility, 10);

    window.removeEventListener('scroll', handleNavbarScroll);
    window.removeEventListener('scroll', handleBackToTopVisibility);
    window.addEventListener('scroll', debouncedNavbar, { passive: true });
    window.addEventListener('scroll', debouncedBackToTop, { passive: true });

    // ================================================================
    // 10. KEYBOARD SUPPORT
    // ================================================================
    backToTopBtn.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    console.log('✓ BizDir homepage initialized successfully');
});
