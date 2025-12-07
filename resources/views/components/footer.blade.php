<footer class="bg-[#0b1017] text-gray-300 mt-20">
        <div class="container mx-auto px-4 lg:px-24 py-14 grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <h1 class="text-xl font-semibold text-white">PT. HARUM SARI</h1>
                <p class="text-sm tracking-[0.25em] mt-1 text-gray-400">HOLIDAYBALIVILLA</p>
                <p class="mt-4 text-sm text-gray-400">
                    Private villa selection in Bali with curated stays for families, couples, and long-stay guests.
                </p>
            </div>
            <div class="text-left md:text-center">
                <h2 class="text-lg font-semibold text-white">Explore</h2>
                <div class="mt-4 space-y-2 text-sm">
                    <a href="{{ route('homepage.home') }}" class="block hover:text-white transition">Home</a>
                    <a href="{{ route('homepage.villas') }}" class="block hover:text-white transition">All Villas</a>
                    <a href="{{ route('email.form') }}" class="block hover:text-white transition">Contact Us</a>
                </div>
            </div>
            <div class="text-left md:text-right">
                <h2 class="text-lg font-semibold text-white">Contact</h2>
                <div class="mt-4 space-y-2 text-sm">
                    <p class="text-gray-400">Bali, Indonesia</p>
                    <p class="text-gray-400">Email: info@holidaybalivilla.com</p>
                    <p class="text-gray-400">WhatsApp: +62-xxx-xxxx-xxxx</p>
                </div>
            </div>
        </div>
        <div class="border-t border-white/5">
            <p class="text-center text-xs text-gray-500 py-4">
                &copy; {{ date('Y') }} PT. Harum Sari – HolidayBaliVilla. All rights reserved.
            </p>
        </div>
    </footer>