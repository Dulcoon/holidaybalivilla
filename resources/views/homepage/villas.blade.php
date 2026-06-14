<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Our Villas - HolidayBaliVilla</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FAF8F5] text-[#2D2D2D]">
    <x-navbar />

    <main class="pt-24">
        <!-- Header -->
        <section class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
                <!-- Breadcrumb -->
                <nav class="flex text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center gap-2">
                        <li><a href="{{ route('homepage.home') }}" class="hover:text-[#B8915C] transition">Home</a></li>
                        <li><span class="mx-1 text-gray-300">/</span></li>
                        <li class="font-semibold text-gray-900">Our Villas</li>
                    </ol>
                </nav>

                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                    <div>
                        <p class="text-xs tracking-[0.3em] text-[#B8915C] uppercase font-semibold mb-2">Collection</p>
                        <h1 class="font-serif text-4xl md:text-5xl text-[#1C1C1E] leading-tight">
                            Our <span class="text-[#D6B390]">Villas</span>
                        </h1>
                        <p class="text-gray-500 mt-3 max-w-2xl">
                            Discover our curated selection of private villas in Bali. Each villa is carefully chosen to ensure the best experience.
                        </p>
                        @if($villas->total() > 0)
                            <p class="text-xs text-gray-400 mt-2">
                                Showing <span class="font-semibold text-gray-700">{{ $villas->count() }}</span> of <span class="font-semibold text-gray-700">{{ $villas->total() }}</span> villas
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Search -->
        <section class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <form method="GET" class="flex flex-col sm:flex-row gap-3 max-w-2xl">
                    <div class="flex-1 relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search villa by name, location..."
                               class="w-full pl-5 pr-12 py-3 rounded-full border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm"/>
                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button type="submit"
                            class="px-6 py-3 bg-[#D6B390] text-[#1C1C1E] font-semibold rounded-full hover:bg-[#C7A277] transition text-sm">
                        Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('homepage.villas') }}"
                           class="px-6 py-3 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition text-sm text-center">
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </section>

        <!-- Villas Grid -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            @if($villas->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($villas as $villa)
                    <a href="{{ route('homepage.villas-detail', $villa->slug) }}"
                       class="group bg-white rounded-2xl overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-1">
                        <div class="relative h-64 overflow-hidden bg-gray-100">
                            <img src="{{ $villa->thumbnail ? url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
                                 alt="{{ $villa->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-semibold text-gray-800 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $villa->bedrooms }} Bed ⋅ {{ $villa->people }} Guest
                                </span>
                            </div>
                        </div>
                        <div class="p-5 md:p-6">
                            <div class="flex items-start justify-between gap-4 mb-3">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#B8915C] transition">{{ $villa->name }}</h3>
                                    <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        </svg>
                                        {{ $villa->location ?? 'Bali, Indonesia' }}
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <div class="font-bold text-gray-900">Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}</div>
                                    <div class="text-[11px] text-gray-500">/ malam</div>
                                </div>
                            </div>
                            @if($villa->fasilitas)
                                @php
                                    $allFacilities = is_string($villa->fasilitas) ? json_decode($villa->fasilitas, true) : (is_array($villa->fasilitas) ? $villa->fasilitas : []);
                                    $displayed = array_slice($allFacilities, 0, 3);
                                @endphp
                                @if(!empty($displayed))
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach($displayed as $item)
                                        <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#F5EDE1] text-gray-700">{{ $item }}</span>
                                    @endforeach
                                    @if(count($allFacilities) > 3)
                                        <span class="text-[11px] px-2.5 py-1 rounded-full bg-gray-900 text-white font-medium">+{{ count($allFacilities) - 3 }}</span>
                                    @endif
                                </div>
                                @endif
                            @endif
                            <div class="pt-4 border-t border-gray-100">
                                <span class="text-sm font-semibold text-[#B8915C] group-hover:gap-2 transition-all flex items-center gap-1">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($villas->hasPages())
                <div class="mt-16">
                    {{ $villas->links('pagination::tailwind') }}
                </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-16 max-w-md mx-auto">
                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-gray-900 mb-2">No Villas Found</h3>
                    <p class="text-gray-500 text-sm mb-6">
                        @if(request('search'))
                            We couldn't find any villas matching "<strong>{{ request('search') }}</strong>". Try a different search term.
                        @else
                            Sorry, there are no available villas at the moment.
                        @endif
                    </p>
                    @if(request('search'))
                        <a href="{{ route('homepage.villas') }}"
                           class="inline-flex items-center px-6 py-3 bg-[#D6B390] text-[#1C1C1E] font-semibold rounded-full hover:bg-[#C7A277] transition">
                            Clear Search
                        </a>
                    @endif
                </div>
            @endif
        </section>
    </main>

    <x-footer />
</body>
</html>
