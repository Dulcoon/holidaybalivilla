<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Available Villas - HolidayBaliVilla</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <x-navbar />

    <main class="pt-24">
        <!-- Breadcrumb & Header Section -->
        <section class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Breadcrumb -->
                <nav class="flex text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('homepage.home') }}" class="text-gray-600 hover:text-[#D6B390] font-medium transition">
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="font-semibold text-gray-900">Available Villas</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-3">
                            Available Villas
                        </h1>
                        <p class="text-gray-600 text-sm md:text-base max-w-2xl">
                            Discover our curated selection of private villas in Bali.  Each villa is carefully chosen to ensure the best experience for your perfect getaway.
                        </p>
                        @if ($villas->total() > 0)
                            <p class="text-xs text-gray-500 mt-3">
                                Showing <span class="font-semibold">{{ $villas->count() }}</span> of <span class="font-semibold">{{ $villas->total() }}</span> available villas
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Search Bar Section -->
        <section class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <form method="GET" class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1 relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search villa by name, location..."
                            class="w-full px-5 py-3 rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent"
                        />
                        <svg class="absolute right-4 top-3. 5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-[#D6B390] text-black font-semibold rounded-full hover:bg-[#c1a07a] transition whitespace-nowrap"
                    >
                        Search
                    </button>
                    @if (request('search'))
                        <a href="{{ route('homepage.villas') }}"
                           class="px-6 py-3 bg-gray-200 text-gray-900 font-semibold rounded-full hover:bg-gray-300 transition whitespace-nowrap"
                        >
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </section>

        <!-- Villas Grid -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            @if ($villas->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach ($villas as $villa)
                        <div class="group bg-white rounded-3xl overflow-hidden shadow-[0_16px_35px_rgba(15,23,42,0.11)] hover:shadow-[0_25px_50px_rgba(15,23,42,0.15)] transition duration-300">
                            <!-- Image Container -->
                            <div class="relative h-64 w-full overflow-hidden bg-gray-100">
                                <img
                                    src="{{ $villa->thumbnail ?  url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
                                    alt="{{ $villa->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                />
                                <!-- Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-xs font-medium text-gray-800 shadow-md">
                                        <svg xmlns="http://www.w3. org/2000/svg" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3. 58 8 8-3. 58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15. 5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1. 5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6. 5c2.33 0 4. 31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                                        </svg>
                                        {{ $villa->bedrooms }} Bed / {{ $villa->people }} Guest
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <!-- Title & Location -->
                                <div class="mb-3">
                                    <h3 class="text-lg font-bold text-gray-900 truncate mb-1 group-hover:text-[#D6B390] transition">
                                        {{ $villa->name }}
                                    </h3>
                                    <div class="flex items-center gap-1 text-xs text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3. 5 h-3.5 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                                        </svg>
                                        <span>{{ $villa->location ??  'Bali, Indonesia' }}</span>
                                    </div>
                                </div>

                               <!-- Facilities -->
                               @if ($villa->fasilitas)
                                   @php
                                       $allFacilities = is_string($villa->fasilitas)
                                           ? json_decode($villa->fasilitas, true)
                                           : (is_array($villa->fasilitas) ? $villa->fasilitas : []);

                                       $allFacilities = is_array($allFacilities) ? $allFacilities : [];
                                       $displayedFacilities = array_slice($allFacilities, 0, 3);
                                   @endphp

                                   @if (!empty($displayedFacilities))
                                       <div class="mb-4">
                                           <div class="flex flex-wrap gap-2">
                                               @foreach ($displayedFacilities as $item)
                                                   <span
                                                       class="inline-flex items-center px-3 py-1 bg-gray-50 border border-gray-200
                                                              text-[11px] leading-none text-gray-700 rounded-full">
                                                       {{ $item }}
                                                   </span>
                                               @endforeach

                                               @if (count($allFacilities) > count($displayedFacilities))
                                                   <span
                                                       class="inline-flex items-center px-3 py-1 bg-gray-900 text-white
                                                              text-[11px] leading-none rounded-full font-medium">
                                                       +{{ count($allFacilities) - count($displayedFacilities) }} more
                                                   </span>
                                               @endif
                                           </div>
                                       </div>
                                   @endif
                               @endif


                                <!-- Price & Button -->
                                <div class="flex items-center justify-between gap-3 pt-4 border-t border-gray-100">
                                    <div class="flex-1">
                                        <div class="text-sm text-gray-500">Price per night</div>
                                        <div class="text-xl font-bold text-gray-900">
                                            Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <a href="{{ route('homepage.villas-detail', $villa->slug) }}"
                                       class="px-5 py-2. 5 bg-[#D6B390] text-black font-semibold rounded-full hover:bg-[#c1a07a] transition whitespace-nowrap text-sm"
                                    >
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16 flex justify-center">
                    <div class="flex gap-2">
                        {{ $villas->links('pagination::tailwind') }}
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3. org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Villas Found</h3>
                    <p class="text-gray-600 mb-6">
                        @if (request('search'))
                            We couldn't find any villas matching "<strong>{{ request('search') }}</strong>".  Try a different search term.
                        @else
                            Sorry, there are no available villas at the moment.
                        @endif
                    </p>
                    @if (request('search'))
                        <a href="{{ route('homepage.villas') }}"
                           class="inline-flex items-center px-6 py-3 bg-[#D6B390] text-black font-semibold rounded-full hover:bg-[#c1a07a] transition"
                        >
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