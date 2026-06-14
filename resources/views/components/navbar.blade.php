@php
    $isLightBg = request()->routeIs('homepage.villas') || request()->routeIs('homepage.villas-detail') || request()->routeIs('email.form');
    $bgClass = $isLightBg ? 'bg-white/95 backdrop-blur-md shadow-sm' : 'bg-transparent';
    $textClass = $isLightBg ? 'text-gray-900' : 'text-white';
    $hoverClass = 'hover:text-[#B8915C]';
    $ctaClass = 'bg-[#B8915C] text-white hover:bg-[#A37A4E]';
@endphp

<div id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 {{ $bgClass }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('homepage.home') }}" class="flex items-center gap-2 group">
                <div class="w-9 h-9 rounded-full bg-[#B8915C] flex items-center justify-center text-white text-sm font-bold group-hover:bg-[#A37A4E] transition">H</div>
                <div class="leading-tight">
                    <div class="text-sm font-bold tracking-tight {{ $textClass }}">HOLIDAYBALIVILLA</div>
                    <div class="text-[10px] tracking-[0.2em] uppercase opacity-60 {{ $textClass }}">Private Villa in Bali</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('homepage.home') }}" class="font-medium text-sm tracking-wide {{ $textClass }} {{ $hoverClass }} transition">Home</a>
                <a href="{{ route('homepage.villas') }}" class="font-medium text-sm tracking-wide {{ $textClass }} {{ $hoverClass }} transition">Villas</a>
                <a href="{{ route('email.form') }}" class="font-medium text-sm tracking-wide {{ $textClass }} {{ $hoverClass }} transition">Contact</a>
            </nav>

            <div class="hidden md:block">
                <a href="https://wa.me/6281234567890" target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold {{ $ctaClass }} transition shadow-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
            </div>

            <!-- Mobile menu button -->
            <button id="menu-btn" class="md:hidden {{ $textClass }} focus:outline-none p-2" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md border-t border-gray-100 shadow-lg">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('homepage.home') }}" class="block py-2 text-gray-900 font-medium hover:text-[#B8915C] transition">Home</a>
            <a href="{{ route('homepage.villas') }}" class="block py-2 text-gray-900 font-medium hover:text-[#B8915C] transition">Villas</a>
            <a href="{{ route('email.form') }}" class="block py-2 text-gray-900 font-medium hover:text-[#B8915C] transition">Contact</a>
            <a href="https://wa.me/6281234567890" target="_blank"
               class="block text-center py-3 bg-[#25D366] text-white rounded-full font-semibold">Chat WhatsApp</a>
        </div>
    </div>
</div>

<script>
    // Mobile menu toggle
    document.getElementById('menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 60) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
            navbar.querySelectorAll('.text-white').forEach(el => el.classList.replace('text-white', 'text-gray-900'));
        } else {
            @if(!($isLightBg))
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
            navbar.querySelectorAll('.text-gray-900').forEach(el => el.classList.replace('text-gray-900', 'text-white'));
            @endif
        }
    });
</script>
