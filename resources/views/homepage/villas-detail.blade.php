<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $villa->name }} - HolidayBaliVilla</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FAF8F5] text-[#2D2D2D]">
    @include('components.navbar')

    <main class="pt-24">
        <!-- Hero -->
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
                <!-- Breadcrumb -->
                <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center gap-2">
                        <li><a href="{{ route('homepage.home') }}" class="hover:text-[#B8915C] transition">Home</a></li>
                        <li><span class="mx-1 text-gray-300">/</span></li>
                        <li><a href="{{ route('homepage.villas') }}" class="hover:text-[#B8915C] transition">Villas</a></li>
                        <li><span class="mx-1 text-gray-300">/</span></li>
                        <li class="font-semibold text-gray-900">{{ $villa->name }}</li>
                    </ol>
                </nav>

                <!-- Hero Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl mb-10">
                    <img src="{{ $villa->thumbnail ? url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
                         alt="{{ $villa->name }}"
                         class="w-full h-[400px] md:h-[500px] object-cover"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                </div>

                <!-- Title & Quick Info -->
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-2 text-xs tracking-[0.2em] text-[#B8915C] uppercase font-semibold mb-3">
                            <span>{{ $villa->bedrooms }} Bedroom Villa</span>
                            <span class="w-1 h-1 rounded-full bg-[#B8915C]"></span>
                            <span>{{ $villa->location ?? 'Bali' }}</span>
                        </div>
                        <h1 class="font-serif text-4xl md:text-5xl text-[#1C1C1E] mb-4">{{ $villa->name }}</h1>
                        @if($villa->description)
                            <p class="text-gray-600 leading-relaxed">{{ $villa->description }}</p>
                        @endif
                    </div>
                    <div class="md:text-right flex md:flex-col items-center md:items-end gap-4 md:gap-0">
                        <div class="mb-2">
                            <div class="font-serif text-3xl md:text-4xl text-[#D6B390] font-bold">Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}</div>
                            <div class="text-sm text-gray-500">per malam</div>
                        </div>
                        <a href="https://wa.me/62{{ preg_replace('/^0/', '', config('settings.whatsapp_number') ?? '0') }}?text=I'm%20interested%20in%20the%20villa%20{{ urlencode($villa->name) }}%20(%23{{ $villa->slug }})%20-%20Rp{{ number_format($villa->price_per_night) }}/night"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-6 py-3.5 bg-[#25D366] text-white font-bold rounded-full hover:bg-[#20ba5a] transition shadow-lg">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span>Book via WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Specs Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                    <div class="bg-[#FAF8F5] border border-gray-100 rounded-xl p-5 text-center hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div class="font-bold text-gray-900">{{ $villa->bedrooms }}</div>
                        <div class="text-xs text-gray-500">Bedrooms</div>
                    </div>
                    <div class="bg-[#FAF8F5] border border-gray-100 rounded-xl p-5 text-center hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-gray-900">{{ $villa->bathrooms }}</div>
                        <div class="text-xs text-gray-500">Bathrooms</div>
                    </div>
                    <div class="bg-[#FAF8F5] border border-gray-100 rounded-xl p-5 text-center hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-gray-900">{{ $villa->people }}</div>
                        <div class="text-xs text-gray-500">Max Guests</div>
                    </div>
                    <div class="bg-[#FAF8F5] border border-gray-100 rounded-xl p-5 text-center hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-gray-900">{{ $villa->swimming_pool ?? '-' }}</div>
                        <div class="text-xs text-gray-500">Swimming Pool</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Facilities -->
        @php
            $fasilitas = is_string($villa->fasilitas) ? json_decode($villa->fasilitas, true) : (is_array($villa->fasilitas) ? $villa->fasilitas : []);
        @endphp
        @if(!empty($fasilitas))
        <section class="py-16 bg-white border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-serif text-3xl text-[#1C1C1E] mb-8">Facilities & Amenities</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($fasilitas as $item)
                    <div class="bg-[#FAF8F5] rounded-xl p-4 flex items-center gap-3 border border-gray-100 hover:border-[#D6B390]/30 transition">
                        <div class="w-9 h-9 rounded-lg bg-[#F5EDE1] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-800">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Location & Specs -->
        <section class="py-16 bg-[#FAF8F5]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Location -->
                    <div>
                        <h2 class="font-serif text-3xl text-[#1C1C1E] mb-6">Location & Address</h2>
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                            <div class="space-y-5">
                                <div>
                                    <p class="text-xs tracking-wider text-gray-400 uppercase font-semibold mb-1">Location</p>
                                    <p class="text-lg font-bold text-gray-900">{{ $villa->location ?? 'Bali, Indonesia' }}</p>
                                </div>
                                <div class="border-t border-gray-100 pt-5">
                                    <p class="text-xs tracking-wider text-gray-400 uppercase font-semibold mb-1">Full Address</p>
                                    <p class="text-gray-700">{{ $villa->address ?? 'Bali, Indonesia' }}</p>
                                </div>
                                @if($villa->maps_link)
                                <div class="pt-2">
                                    <a href="{{ $villa->maps_link }}" target="_blank"
                                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#D6B390] text-[#1C1C1E] font-semibold rounded-full hover:bg-[#C7A277] transition text-sm">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Open in Google Maps
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Specs -->
                    <div>
                        <h2 class="font-serif text-3xl text-[#1C1C1E] mb-6">Specifications</h2>
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm divide-y divide-gray-100">
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-gray-600">Bedrooms</span>
                                <span class="font-bold text-gray-900">{{ $villa->bedrooms }}</span>
                            </div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-gray-600">Bathrooms</span>
                                <span class="font-bold text-gray-900">{{ $villa->bathrooms }}</span>
                            </div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-gray-600">Guest Capacity</span>
                                <span class="font-bold text-gray-900">{{ $villa->people }}</span>
                            </div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-gray-600">Swimming Pool</span>
                                <span class="font-bold text-gray-900">{{ $villa->swimming_pool ?? '-' }}</span>
                            </div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-gray-600">Price per Night</span>
                                <span class="font-bold text-[#D6B390] text-lg">Rp{{ number_format($villa->price_per_night, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery -->
        @if($villa->images->count() > 0)
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-serif text-3xl text-[#1C1C1E] mb-8">Photo Gallery</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($villa->images as $index => $image)
                    <div class="relative group cursor-pointer rounded-xl overflow-hidden {{ $index === 0 ? 'sm:col-span-2 sm:row-span-2' : '' }}"
                         onclick="openGallery({{ $index }})">
                        <img src="{{ url('storage/' . $image->image_path) }}"
                             alt="Gallery {{ $index + 1 }}"
                             class="w-full h-full object-cover {{ $index === 0 ? 'h-[400px]' : 'h-48 sm:h-56' }} group-hover:scale-105 transition duration-500"/>
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition flex items-center justify-center">
                            <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Gallery Modal -->
        <div id="galleryModal" class="hidden fixed inset-0 bg-black/95 z-50 flex items-center justify-center">
            <div class="relative w-full h-full flex items-center justify-center p-4">
                <img id="modalImage" src="" alt="Gallery" class="max-w-full max-h-[85vh] object-contain rounded-lg"/>
                <button onclick="closeGallery()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <button onclick="prevImage()" class="absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="nextImage()" class="absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/60 text-sm">
                    <span id="galleryCounter">1/{{ count($villa->images) }}</span>
                </div>
            </div>
        </div>
        @endif

        <!-- CTA -->
        <section class="py-16 bg-gradient-to-r from-[#B8915C] to-[#D6B390]">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="font-serif text-3xl md:text-4xl text-white mb-4">Interested in {{ $villa->name }}?</h2>
                <p class="text-white/90 text-lg mb-8">Contact our team now for booking and more information.</p>
                <a href="https://wa.me/62{{ preg_replace('/^0/', '', config('settings.whatsapp_number') ?? '0') }}?text=I'm%20interested%20in%20the%20villa%20{{ urlencode($villa->name) }}%20(%23{{ $villa->slug }})%20-%20Rp{{ number_format($villa->price_per_night) }}/night"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-8 py-4 bg-white text-[#B8915C] font-bold rounded-full hover:bg-gray-100 transition shadow-xl">
                    <i class="fab fa-whatsapp text-xl text-[#25D366]"></i>
                    <span>Chat on WhatsApp Now</span>
                </a>
            </div>
        </section>

        <!-- Related Villas -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-serif text-3xl text-[#1C1C1E] mb-8">Other Villas You Might Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $relatedVillas = \App\Models\Villa::where('status', 'available')
                            ->where('id', '!=', $villa->id)
                            ->limit(3)
                            ->get();
                    @endphp
                    @forelse($relatedVillas as $related)
                    <a href="{{ route('homepage.villas-detail', $related) }}"
                       class="group bg-white rounded-2xl overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-1">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $related->thumbnail ? url('storage/' . $related->thumbnail) : url('storage/no_image.png') }}"
                                 alt="{{ $related->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700"/>
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-gray-800 shadow-sm">
                                    {{ $related->bedrooms }} Bed ⋅ {{ $related->people }} Guest
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-gray-900 group-hover:text-[#B8915C] transition">{{ $related->name }}</h3>
                            <p class="text-xs text-gray-500 mt-1 mb-3">
                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $related->location ?? 'Bali' }}
                            </p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="font-bold text-gray-900">Rp{{ number_format($related->price_per_night, 0, ',', '.') }}/night</span>
                                <span class="text-sm font-semibold text-[#B8915C]">View Details →</span>
                            </div>
                        </div>
                    </a>
                    @empty
                        <p class="col-span-full text-center text-gray-500 py-8">No other villas available</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <x-footer />

    <script>
        let galleryIndex = 0;
        let galleryImages = [];

        @if($villa->images->count() > 0)
        galleryImages = [
            @foreach($villa->images as $image)
            "{{ url('storage/' . $image->image_path) }}",
            @endforeach
        ];

        function openGallery(index) {
            galleryIndex = index;
            document.getElementById('modalImage').src = galleryImages[index];
            document.getElementById('galleryModal').classList.remove('hidden');
            document.getElementById('galleryCounter').textContent = (index + 1) + '/' + galleryImages.length;
            document.body.style.overflow = 'hidden';
        }

        function closeGallery() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function nextImage() {
            galleryIndex = (galleryIndex + 1) % galleryImages.length;
            document.getElementById('modalImage').src = galleryImages[galleryIndex];
            document.getElementById('galleryCounter').textContent = (galleryIndex + 1) + '/' + galleryImages.length;
        }

        function prevImage() {
            galleryIndex = (galleryIndex - 1 + galleryImages.length) % galleryImages.length;
            document.getElementById('modalImage').src = galleryImages[galleryIndex];
            document.getElementById('galleryCounter').textContent = (galleryIndex + 1) + '/' + galleryImages.length;
        }

        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('galleryModal');
            if (modal.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeGallery();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });
        @endif
    </script>
</body>
</html>
