@php
    $footerLogo = $setting?->logo ? asset('storage/'.$setting->logo) : null;
@endphp

<footer class="footer">
    <div class="container py-5">

        <div class="row g-4">

            <!-- Brand -->
            <div class="col-lg-4">
                <div class="footer-brand mb-3">
                    @if($footerLogo)
                        <img src="{{ $footerLogo }}" class="footer-logo-img" alt="logo">
                    @else
                        <div class="footer-logo-fallback">CD</div>
                    @endif
                </div>

                <p class="footer-desc mb-3">
                    {{ $setting?->footer_about ?? 'We help customers to find the best cars and deals with a smooth inquiry process and trusted support.' }}
                </p>

                <!-- Social -->
                <div class="d-flex gap-2">
                    <a href="#" class="social-btn" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-btn" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-btn" title="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-btn" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-heading">Quick Links</div>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#most-searched">Most Searched Cars</a></li>
                    <li><a href="#latest-cars">Latest Cars</a></li>
                    <li><a href="{{ route('car.inquiry.create') }}">Car Inquiry</a></li>
                </ul>
            </div>

            <!-- Popular Services -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-heading">Popular Services</div>
                <ul class="footer-links">
                    <li><a href="#">Compare Cars</a></li>
                    <li><a href="#">Car News</a></li>
                    <li><a href="#">New Car Offers</a></li>
                    <li><a href="#">Used Cars</a></li>
                </ul>
            </div>

            <!-- Contact + Newsletter -->
            <div class="col-lg-3">
                <div class="footer-heading">Contact</div>

                <div class="footer-contact">

                    @if($setting?->footer_address)
                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>{{ $setting->footer_address }}</span>
                    </div>
                    @endif

                    @if($setting?->footer_phone)
                    <div class="contact-item">
                        <i class="bi bi-telephone"></i>
                        <span>{{ $setting->footer_phone }}</span>
                    </div>
                    @endif

                    @if($setting?->footer_email)
                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <span>{{ $setting->footer_email }}</span>
                    </div>
                    @endif
                </div>

                <div class="footer-newsletter mt-3">
                    <div class="newsletter-title">Get updates & offers</div>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Enter your email">
                        <button type="button"><i class="bi bi-arrow-right"></i></button>
                    </div>

                    <a href="/admin" class="admin-chip mt-3">
                        <i class="bi bi-gear me-1"></i> Admin Panel
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="footer-bottom mt-4">
            <div class="d-flex flex-column flex-md-row gap-2 justify-content-between align-items-md-center">
                <div>© {{ date('Y') }} All rights reserved.</div>
                <div class="text-md-end">
                    Developed in Laravel • <span class="footer-small">Assessment Project</span>
                </div>
            </div>
        </div>

    </div>
</footer>
