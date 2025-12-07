<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $villa->name }} - HolidayBaliVilla</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis. com/css2?family=Oswald:wght@200.. 700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            grid-auto-rows: 200px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .gallery-item. large {
            grid-column: span 2;
            grid-row: span 2;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('components.navbar')

    <main class="pt-24">
        <!-- Breadcrumb -->
        <section class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <nav class="flex text-gray-500 text-sm" aria-label="Breadcrumb">
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
                                <a href="{{ route('homepage.villas') }}" class="text-gray-600 hover:text-[#D6B390] font-medium transition">
                                    Villas
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="font-semibold text-gray-900">{{ $villa->name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Hero Section - Thumbnail -->
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="rounded-2xl overflow-hidden shadow-xl mb-8">
                    <img src="{{ $villa->thumbnail ?  url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
                         alt="{{ $villa->name }}"
                         class="w-full h-96 object-cover" />
                </div>

                <!-- Title & Quick Info -->
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-8">
                    <div class="flex-1">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">
                            {{ $villa->name }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-4 text-lg text-gray-600 mb-6">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3. org/2000/svg" class="w-5 h-5 text-[#D6B390]" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3. 59 8 8-3. 59 8-8 8z"/>
                                </svg>
                                <span>{{ $villa->location ??  'Bali, Indonesia' }}</span>
                            </div>
                            <span class="text-2xl font-bold text-[#D6B390]">
                                Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}/night
                            </span>
                        </div>

                        @if ($villa->description)
                            <p class="text-gray-700 text-lg leading-relaxed">
                                {{ $villa->description }}
                            </p>
                        @endif
                    </div>

                    <!-- CTA Button -->
                    <div class="flex-shrink-0">
                        <a href="https://wa.me/62{{ preg_replace('/^0/', '', config('settings.whatsapp_number') ?? '0') }}?text=I'm%20interested%20in%20the%20villa%20{{ urlencode($villa->name) }}%20(%23{{ $villa->slug }})%20-%20Rp{{ number_format($villa->price_per_night) }}/night"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-[#25D366] text-white font-bold rounded-full hover:bg-[#20ba5a] transition shadow-lg hover:shadow-xl">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>Contact via WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Key Stats -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-12">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-orange-90">{{ $villa->bedrooms }}</div>
                        <div class="text-sm text-orange-700 mt-1">Bedrooms</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-orange-90">{{ $villa->bathrooms }}</div>
                        <div class="text-sm text-orange-700 mt-1">Bathrooms</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-orange-90">{{ $villa->people }}</div>
                        <div class="text-sm text-orange-700 mt-1">Max Guests</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-orange-900">{{ $villa->swimming_pool }}</div>
                        <div class="text-sm text-orange-700 mt-1">Swimming Pool</div>
                    </div>
            
                </div>
            </div>
        </section>

        <!-- Facilities Section -->
        @php
            $fasilitas = is_string($villa->fasilitas) ?  json_decode($villa->fasilitas, true) : (is_array($villa->fasilitas) ? $villa->fasilitas : []);
        @endphp
        @if (! empty($fasilitas))
            <section class="bg-gray-50 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Facilities</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($fasilitas as $item)
                            <div class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition border-l-4 border-[#D6B390]">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#F5EDE1] flex items-center justify-center">
                                        <i class="fas fa-check text-[#D6B390]"></i>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $item }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Address & Maps Section -->
        <section class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Address Info -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Location & Address</h2>
                        <div class="space-y-6">
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide font-semibold">Location</p>
                                <p class="text-xl font-bold text-gray-900 mt-2">{{ $villa->location ??  'Bali, Indonesia' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide font-semibold">Full Address</p>
                                <p class="text-lg text-gray-700 mt-2">{{ $villa->address }}</p>
                            </div>
                            @if ($villa->maps_link)
                                <a href="{{ $villa->maps_link }}" target="_blank"
                                   class="inline-flex items-center gap-2 px-6 py-3 bg-[#D6B390] text-black font-semibold rounded-full hover:bg-[#c1a07a] transition">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Open in Google Maps</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Detailed Specs -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Specifications</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Bedrooms</span>
                                <span class="text-xl font-bold text-[#D6B390]">{{ $villa->bedrooms }}</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Bathrooms</span>
                                <span class="text-xl font-bold text-[#D6B390]">{{ $villa->bathrooms }}</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Guest Capacity</span>
                                <span class="text-xl font-bold text-[#D6B390]">{{ $villa->people }}</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Swimming Pool</span>
                                <span class="text-xl font-bold text-[#D6B390]">{{ $villa->swimming_pool }}</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Price per Night</span>
                                <span class="text-xl font-bold text-[#D6B390]">Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        @if ($villa->images->count() > 0)
            <section class="bg-gray-50 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Photo Gallery</h2>

                    <!-- Gallery Grid -->
                    <div class="gallery-grid">
                        @foreach ($villa->images as $index => $image)
                            <div class="gallery-item {{ $index === 0 ? 'large' : '' }}" 
                                 data-gallery-image="{{ url('storage/' . $image->image_path) }}"
                                 onclick="openGalleryModal(this)">
                                <img src="{{ url('storage/' . $image->image_path) }}"
                                     alt="Gallery image {{ $index + 1 }}"
                                     loading="lazy" />
                                <div class="absolute inset-0 bg-black/0 hover:bg-black/20 transition flex items-center justify-center">
                                    <i class="fas fa-search text-white text-2xl"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Gallery Modal -->
        <div id="galleryModal" class="hidden fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4">
            <div class="relative max-w-4xl w-full">
                <img id="modalImage" src="" alt="Gallery" class="w-full rounded-lg max-h-[80vh] object-contain" />
                <button onclick="closeGalleryModal()" class="absolute top-4 right-4 bg-white text-black rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <button onclick="previousImage()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white text-black rounded-full w-12 h-12 flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fas fa-chevron-left text-xl"></i>
                </button>
                <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white text-black rounded-full w-12 h-12 flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fas fa-chevron-right text-xl"></i>
                </button>
            </div>
        </div>

        <!-- CTA Section -->
        <section class="bg-gradient-to-r from-[#D6B390] to-[#C89B6F] py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">Interested in This Villa?</h2>
                <p class="text-black/90 text-lg mb-8">Contact our team now for booking and more information.</p>
                <a href="https://wa.me/62{{ preg_replace('/^0/', '', config('settings.whatsapp_number') ??  '0') }}?text=I'm%20interested%20in%20the%20villa%20{{ urlencode($villa->name) }}%20(%23{{ $villa->slug }})%20-%20Rp{{ number_format($villa->price_per_night) }}/night"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-8 py-4 bg-white text-[#D6B390] font-bold rounded-full hover:bg-gray-100 transition shadow-lg">
                    <i class="fab fa-whatsapp text-2xl text-black"></i>
                    <span class="text-black">Chat on WhatsApp Now</span>
                </a>
            </div>
        </section>

        <!-- Related Villas -->
        <section class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Other Villas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $relatedVillas = \App\Models\Villa::where('status', 'available')
                            ->where('id', '!=', $villa->id)
                            ->limit(3)
                            ->get();
                    @endphp
                    @forelse ($relatedVillas as $related)
                        <div class="bg-white rounded-3xl shadow-[0_16px_35px_rgba(15,23,42,0.11)] hover:shadow-lg transition overflow-hidden">
                            <div class="relative h-60 w-full overflow-hidden">
                                <img src="{{ $related->thumbnail ?  url('storage/' . $related->thumbnail) : url('storage/no_image.png') }}"
                                     alt="{{ $related->name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition" />
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-xs font-medium text-gray-800 shadow-md">
                                        {{ $related->bedrooms }} Bed / {{ $related->people }} Guests
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $related->name }}</h3>
                                <p class="text-xs text-gray-500 flex items-center gap-1 mb-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $related->location ??  'Bali' }}
                                </p>
                                <div class="flex items-center justify-between gap-3">
                                    <span class="px-4 py-2 rounded-xl bg-[#E9DFBF] text-[13px] font-semibold text-gray-900">
                                        Rp{{ number_format($related->price_per_night, 0, ',', '.') }}/night
                                    </span>
                                    <a href="{{ route('homepage.villas-detail', $related) }}"
                                       class="text-sm px-4 py-2 bg-[#D6B390] rounded-full font-semibold text-black hover:bg-[#c1a07a] transition">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500">No other villas available</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <x-footer />

    <!-- Footer -->
    

    <script>
        let currentImageIndex = 0;
        let galleryImages = [];

        function openGalleryModal(element) {
            const modal = document.getElementById('galleryModal');
            const modalImage = document.getElementById('modalImage');
            
            galleryImages = Array.from(document.querySelectorAll('[data-gallery-image]'))
                .map(el => el.getAttribute('data-gallery-image'));
            
            currentImageIndex = Array.from(document.querySelectorAll('[data-gallery-image]'))
                .indexOf(element);
            
            modalImage.src = galleryImages[currentImageIndex];
            modal.classList.remove('hidden');
        }

        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.add('hidden');
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
            document.getElementById('modalImage').src = galleryImages[currentImageIndex];
        }

        function previousImage() {
            currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
            document.getElementById('modalImage').src = galleryImages[currentImageIndex];
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeGalleryModal();
        });

        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('galleryModal');
            if (! modal.classList.contains('hidden')) {
                if (e.key === 'ArrowRight') nextImage();
                if (e.key === 'ArrowLeft') previousImage();
            }
        });
    </script>
</body>
</html>
