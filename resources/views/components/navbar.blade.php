@php
    $isVillasPage = request()->routeIs('homepage.villas') || request()->routeIs('homepage.villas-detail') || request()->routeIs('email.form');
    $bgClass = $isVillasPage ? 'bg-black/80 backdrop-blur-sm' : 'bg-transparent';
    $textClass = $isVillasPage ? 'text-white' : 'text-white';
    $linkHoverClass = $isVillasPage ? 'text-white hover:text-[#D6B390]' : 'text-white hover:text-[#D6B390]';
    $buttonClass = 'bg-[#D6B390] text-black hover:bg-[#c7a277]';
    $mobileMenuBgClass = $isVillasPage ? 'bg-black/90' : 'bg-black/70';
    $mobileMenuTextClass = 'text-white';
@endphp

<div id="navbar" class="absolute top-0 left-0 right-0 z-50 {{ $bgClass }} transition-all duration-300">
    <header class="flex justify-between items-center p-6 px-4 lg:px-24">
        <div class="text-left">
            <a href="{{ route('homepage.home') }}">
                <h1 class="text-xl font-bold {{ $textClass }}">PT. HARUM SARI</h1>
                <p class="text-sm tracking-[2. 5px] {{ $textClass }}">HOLIDAYBALIVILLA</p>
            </a>
        </div>

        <nav class="hidden md:flex space-x-8 text-sm font-normal items-center">
            <a class="{{ $linkHoverClass }} transition" href="{{ route('homepage.home') }}">HOME</a>
            <a class="{{ $linkHoverClass }} transition {{ Route::currentRouteNamed('email.form')  }}"
                href="{{ route('email.form') }}">CONTACT US</a>
            <a class="{{ $linkHoverClass }} transition" href="{{ route('homepage.villas') }}">VILLAS</a>
        </nav>



        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="menu-btn" class="{{ $textClass }} focus:outline-none transition">
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden {{ $mobileMenuBgClass }} {{ $mobileMenuTextClass }} shadow-md transition-all duration-300">
        <nav class="flex flex-col space-y-4 p-4 text-sm font-medium">
            <a class="{{ $linkHoverClass }} transition" href="{{ route('homepage.home') }}">HOME</a>
            <a class="{{ $linkHoverClass }} transition" href="{{ route('email.form') }}">CONTACT US</a>
            <a class="{{ $linkHoverClass }} transition" href="{{ route('homepage.villas') }}">VILLAS</a>
        </nav>
    </div>
</div>

<script>
    document.getElementById('menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>