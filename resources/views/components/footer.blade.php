<footer class="bg-[#1C1C1E] text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Brand -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-9 h-9 rounded-full bg-[#B8915C] flex items-center justify-center text-white text-sm font-bold">H</div>
                    <div class="leading-tight">
                        <div class="text-sm font-bold text-white">HOLIDAYBALIVILLA</div>
                        <div class="text-[10px] tracking-[0.2em] uppercase text-gray-500">Private Villa in Bali</div>
                    </div>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Curated private villa selection in Bali. Experience authentic Balinese hospitality with modern comfort.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">Explore</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('homepage.home') }}" class="text-sm hover:text-[#B8915C] transition">Home</a></li>
                    <li><a href="{{ route('homepage.villas') }}" class="text-sm hover:text-[#B8915C] transition">Our Villas</a></li>
                    <li><a href="{{ route('email.form') }}" class="text-sm hover:text-[#B8915C] transition">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">Contact</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Bali, Indonesia</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>info@holidaybalivilla.com</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+62 812-3456-7890</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter / Social -->
            <div>
                <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">Follow Us</h3>
                <div class="flex gap-3 mb-6">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8915C] transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8915C] transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-xs text-gray-600">
                &copy; {{ date('Y') }} HolidayBaliVilla. All rights reserved.
            </p>
        </div>
    </div>
<script>
(function() {
    'use strict';

    // Mobile menu toggle
    var menuBtn = document.getElementById('menu-btn');
    var mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function() {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    // Navbar scroll effect
    var navbar = document.getElementById('navbar');
    if (navbar) {
        var startsTransparent = navbar.classList.contains('bg-transparent');
        var isSolid = false;

        window.addEventListener('scroll', function() {
            var shouldSolid = window.scrollY > 60;
            if (shouldSolid === isSolid) return;
            isSolid = shouldSolid;

            if (shouldSolid) {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                var whiteEls = navbar.querySelectorAll('.text-white');
                for (var i = 0; i < whiteEls.length; i++) {
                    whiteEls[i].classList.replace('text-white', 'text-gray-900');
                }
            } else if (startsTransparent) {
                navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                navbar.classList.add('bg-transparent');
                var grayEls = navbar.querySelectorAll('.text-gray-900');
                for (var i = 0; i < grayEls.length; i++) {
                    grayEls[i].classList.replace('text-gray-900', 'text-white');
                }
            }
        });
        // Run once on load
        if (window.scrollY > 60) {
            window.dispatchEvent(new Event('scroll'));
        }
    }
})();
</script>
</footer>
