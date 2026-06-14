<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>HolidayBaliVilla — Private Villas in Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .hero-gradient { background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.6) 100%); }
    </style>
</head>
<body class="bg-[#FAF8F5] text-[#2D2D2D]">
    <x-navbar />

    <main>
        <!-- ==================== HERO ==================== -->
        <section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
            <!-- Carousel Background -->
            <div class="absolute inset-0">
                <div data-hero-slide class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"
                     style="background-image: url('{{ asset('herro-carousel/villa-1.jpg') }}');"></div>
                <div data-hero-slide class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                     style="background-image: url('{{ asset('herro-carousel/villa-2.jpg') }}');"></div>
                <div data-hero-slide class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                     style="background-image: url('{{ asset('herro-carousel/villa-3.jpg') }}');"></div>
                <div class="absolute inset-0 hero-gradient"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <div class="inline-block mb-5">
                    <span class="text-xs tracking-[0.3em] uppercase bg-white/10 backdrop-blur-sm px-5 py-2 rounded-full border border-white/20">
                        HolidayBaliVilla ⋅ Private Villa in Bali
                    </span>
                </div>
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl font-bold leading-[1.1] mb-6">
                    Temukan Villa<br/>
                    <span class="text-[#D6B390]">Impian</span> di Bali
                </h1>
                <p class="text-lg md:text-xl text-white/80 max-w-2xl mx-auto mb-10 font-light">
                    Dari keluarga hingga honeymoon — pilih villa privat dengan kolam renang, lokasi strategis, dan layanan profesional.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('homepage.villas') }}"
                       class="px-8 py-4 bg-[#D6B390] text-[#1C1C1E] font-bold rounded-full hover:bg-[#C7A277] transition shadow-xl shadow-black/20">
                        Explore Villas
                    </a>
                    <a href="{{ route('email.form') }}"
                       class="px-8 py-4 border-2 border-white/40 text-white rounded-full hover:bg-white/10 transition">
                        Talk to Villa Expert
                    </a>
                </div>
            </div>

            <!-- Carousel indicators -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex gap-3">
                <span class="w-8 h-1 rounded-full bg-white/90"></span>
                <span class="w-3 h-1 rounded-full bg-white/40"></span>
                <span class="w-3 h-1 rounded-full bg-white/40"></span>
            </div>

            <!-- Scroll down -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 animate-bounce">
                <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </section>

        <!-- ==================== VILLA SHOWCASE ==================== -->
        <section id="section2" class="py-24 md:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-12">
                    <div>
                        <p class="text-xs tracking-[0.3em] text-[#B8915C] uppercase font-semibold">Discover</p>
                        <h2 class="font-serif text-4xl md:text-5xl text-[#1C1C1E] mt-3 leading-tight">
                            Our Curated<br class="hidden md:block"/>
                            <span class="text-[#D6B390]">Villa Collection</span>
                        </h2>
                    </div>
                    <a href="{{ route('homepage.villas') }}"
                       class="hidden md:inline-flex items-center gap-2 px-6 py-3 bg-[#1C1C1E] text-white rounded-full text-sm font-semibold hover:bg-gray-800 transition">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

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
                                    $facilities = is_string($villa->fasilitas) ? json_decode($villa->fasilitas, true) : (is_array($villa->fasilitas) ? $villa->fasilitas : []);
                                    $displayed = array_slice($facilities, 0, 3);
                                @endphp
                                @if(!empty($displayed))
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach($displayed as $item)
                                        <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#F5EDE1] text-gray-700">{{ $item }}</span>
                                    @endforeach
                                </div>
                                @endif
                            @endif
                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
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

                <div class="mt-10 text-center md:hidden">
                    <a href="{{ route('homepage.villas') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#1C1C1E] text-white rounded-full font-semibold hover:bg-gray-800 transition">
                        View All Villas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                @else
                <div class="text-center py-16">
                    <p class="text-gray-500">Belum ada villa tersedia.</p>
                </div>
                @endif
            </div>
        </section>

        <!-- ==================== TESTIMONIALS ==================== -->
        <section id="section3" class="py-24 md:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <p class="text-xs tracking-[0.3em] text-[#B8915C] uppercase font-semibold">Testimonials</p>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#1C1C1E] mt-3">What Our <span class="text-[#D6B390]">Guests Say</span></h2>
                    <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami bangga menjadi bagian dari momen berharga tamu kami.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-[#FAF8F5] rounded-2xl p-8 border border-gray-100 hover:shadow-lg transition">
                        <div class="flex gap-1 mb-5">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-[#fcca2d]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            "Villanya sangat bersih, tenang, dan staff-nya super helpful. Sunset dari private pool benar-benar jadi highlight liburan kami di Bali."
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#D6B390]/20 flex items-center justify-center text-[#B8915C] font-bold text-sm">SJ</div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Sarah Johnson</p>
                                <p class="text-xs text-gray-500">Stayed at Bale Agung</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-[#FAF8F5] rounded-2xl p-8 border border-gray-100 hover:shadow-lg transition">
                        <div class="flex gap-1 mb-5">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-[#fcca2d]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            "Lokasinya dekat pantai, tapi tetap private. Anak-anak senang banget dengan pool dan garden-nya."
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#D6B390]/20 flex items-center justify-center text-[#B8915C] font-bold text-sm">MB</div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Michael Brown</p>
                                <p class="text-xs text-gray-500">Family getaway</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-[#FAF8F5] rounded-2xl p-8 border border-gray-100 hover:shadow-lg transition">
                        <div class="flex gap-1 mb-5">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-[#fcca2d]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            "Team HolidayBaliVilla sangat responsif dari sebelum booking sampai check-out. Villa-nya romantis, dekorasi simple tapi mewah."
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#D6B390]/20 flex items-center justify-center text-[#B8915C] font-bold text-sm">ED</div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Emily Davis</p>
                                <p class="text-xs text-gray-500">Honeymoon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== WHY CHOOSE US ==================== -->
        <section id="section5" class="py-24 md:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <p class="text-xs tracking-[0.3em] text-[#B8915C] uppercase font-semibold">Why Choose Us</p>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#1C1C1E] mt-3">Stay with <span class="text-[#D6B390]">Confidence</span></h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-14 h-14 rounded-2xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-5">
                            <svg class="w-6 h-6 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Curated Villas</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Semua villa telah dikurasi dari lokasi, fasilitas, hingga kualitas pengalaman tamu.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 rounded-2xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-5">
                            <svg class="w-6 h-6 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">24/7 Support</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Tim kami siap membantu dari booking, penjemputan, hingga kebutuhan selama menginap.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 rounded-2xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-5">
                            <svg class="w-6 h-6 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Flexible Check-in</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Opsi early check-in dan late check-out untuk menyesuaikan jadwal penerbangan Anda.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 rounded-2xl bg-[#F5EDE1] flex items-center justify-center mx-auto mb-5">
                            <svg class="w-6 h-6 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Transparent Pricing</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Harga jelas tanpa biaya tersembunyi. Rencanakan budget liburan dengan tenang.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />

    <!-- Hero Carousel -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('[data-hero-slide]');
        function nextSlide() {
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
        }
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>
