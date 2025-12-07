<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Woodcraft Homeliving</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
</head>

<body class="bg-grey-100">



    <x-navbar />

    <main>
        <!-- HERO SECTION -->
        <section id="section1" class="relative h-screen pt-24">
            <!-- Background / Carousel Placeholder -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="w-full h-full relative">
                    <!-- Slide 1 -->
                    <div data-hero-slide
                        class="absolute inset-0 bg-cover bg-center transition-opacity duration-700 ease-in-out"
                        style="background-image: url('{{ asset('herro-carousel/villa-1.jpg') }}');">
                    </div>
                    <!-- Slide 2 -->
                    <div data-hero-slide
                        class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-700 ease-in-out"
                        style="background-image: url('{{ asset('herro-carousel/villa-2.jpg') }}');">
                    </div>
                    <!-- Slide 3 -->
                    <div data-hero-slide
                        class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-700 ease-in-out"
                        style="background-image: url('{{ asset('herro-carousel/villa-3.jpg') }}');">
                    </div>

                    <!-- Overlay gelap supaya teks kebaca -->
                    <div class="absolute inset-0 bg-black/40"></div>
                </div>
            </div>

            <!-- Content di tengah -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center text-white">
                <p class="tracking-[0.3em] text-xs md:text-sm mb-4">
                    HOLIDAYBALIVILLA &nbsp;•&nbsp; PRIVATE VILLA IN BALI
                </p>

                <h1 class="text-4xl md:text-6xl font-semibold mb-4 leading-tight">
                    Find Your Dream Villa<br />
                    For a Perfect Getaway in Bali
                </h1>

                <p class="max-w-xl text-sm md:text-base text-white/80 mb-8">
                    Choose from our collection of private villas featuring swimming pools, strategic locations, and
                    professional service — perfect for family vacations, honeymoons, or long stays on the Island of
                    Bali.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto justify-center">
                    <a href="{{ route('homepage.villas') }}"
                        class="px-8 py-3 bg-[#D6B390] text-black font-semibold text-sm rounded-full hover:bg-[#c7a277] transition">
                        Explore Villas & Availability
                    </a>
                    <a href="{{ route('email.form') }}"
                        class="px-8 py-3 border border-white/80 text-sm rounded-full hover:bg-white hover:text-black transition">
                        Talk to Our Villa Expert
                    </a>
                </div>
            </div>

            <!-- Placeholder indikator carousel (bisa disambungkan dengan JS nanti) -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex gap-2">
                <span class="w-2 h-2 rounded-full bg-white/90"></span>
                <span class="w-2 h-2 rounded-full bg-white/40"></span>
                <span class="w-2 h-2 rounded-full bg-white/40"></span>
            </div>
        </section>
        <!-- Section 2 start -->
        <section id="section2" class="py-20 bg-white">
            <div class="container mx-auto px-4 lg:px-2">
                <!-- Header -->
                <div class="flex items-start justify-between gap-6 mb-10">
                    <div>
                        <p class="text-xs tracking-[0.3em] text-gray-400 uppercase">
                            Discover
                        </p>
                        <h2 class="mt-3 text-3xl md:text-5xl font-semibold leading-tight text-gray-900">
                            Explore your<br class="hidden md:block" />
                            dream destination
                        </h2>
                    </div>

                    <a href="{{ route('homepage.villas') }}">
                        <button
                            class="hidden md:inline-flex items-center justify-center px-6 py-3 rounded-full bg-black text-white text-sm font-medium hover:bg-gray-900 transition">
                            View more
                        </button>
                    </a>
                </div>

                <!-- Cards (horizontal scroll) -->
                <div class="-mx-4 px-4">
                    <div class="flex gap-6 overflow-x-auto pb-4">
                        @forelse ($villas as $villa)
                            <!-- Card -->
                            <div
                                class="relative min-w-[260px] max-w-xs bg-white rounded-3xl shadow-[0_16px_35px_rgba(15,23,42,0.16)] flex-shrink-0 overflow-hidden">

                                <!-- FOTO -->
                                <div class="relative h-64 w-full">
                                    <img src="{{ $villa->thumbnail ? url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
                                        alt="{{ $villa->name }}" class="w-full h-full object-cover" />

                                    <!-- Pill di dalam foto, kanan atas -->
                                    <div class="absolute top-3 right-3">
                                        <span
                                            class="inline-flex items-center rounded-full bg-white px-4 py-1 text-xs font-medium text-gray-800 shadow-md">
                                            {{ $villa->bedrooms }} Bedroom / {{ $villa->people }} Guest
                                        </span>
                                    </div>
                                </div>

                                <!-- INFO BAWAH (tidak overlap) -->
                                <div class="flex items-center justify-between px-4 py-4 bg-white">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $villa->name }}
                                        </p>
                                        <p class="mt-1 text-xs text-gray-500 flex items-center gap-1">
                                            <svg xmlns="http://www.w3. org/2000/svg" viewBox="0 0 24 24"
                                                class="w-3 h-3 fill-current text-gray-400">
                                                <path
                                                    d="M12 2. 25A6.75 6.75 0 0 0 5.25 9c0 4.283 4.312 8. 7 6.21 10.41a. 75.75 0 0 0 1.04 0C14.398 17.7 18. 75 13.283 18.75 9A6.75 6.75 0 0 0 12 2.25Zm0 4.5A2.25 2.25 0 1 1 9.75 9 2.25 2.25 0 0 1 12 6.75Z" />
                                            </svg>
                                            {{ $villa->location ?? 'Bali' }}
                                        </p>
                                    </div>

                                    <div
                                        class="px-4 py-2 rounded-xl bg-[#E9DFBF] text-[11px] font-semibold text-gray-900 whitespace-nowrap">
                                        Rp. {{ number_format($villa->price_per_night, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Jika tidak ada villa -->
                            <div class="w-full text-center py-12">
                                <p class="text-gray-500">Belum ada villa yang tersedia</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- View more (mobile) -->
                <div class="mt-6 flex justify-center md:hidden">
                    <a href="{{ route('homepage.villas') }}">
                        <button
                            class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-black text-white text-sm font-medium hover:bg-gray-900 transition">
                            View more
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <!-- section 2 end -->









        <!-- Section 3 - Testimonials -->
        <section id="section3" class="py-20 bg-[#f7faf9]">
            <div class="container mx-auto px-4 lg:px-2">
                <!-- Header -->
                <div class="flex items-start justify-between gap-6 mb-12">
                    <div>
                        <p class="text-xs tracking-[0.3em] text-gray-400 uppercase">
                            Testimonials
                        </p>
                        <h2 class="mt-3 text-3xl md:text-4xl font-semibold leading-tight text-gray-900">
                            What our guests say
                        </h2>
                        <p class="mt-3 text-sm md:text-base text-gray-500 max-w-xl">
                            Memorable guest experiences at HolidayBaliVilla — from intimate honeymoons to unforgettable
                            family holidays in our curated private villas.
                        </p>
                    </div>
                </div>

                <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden">
                                <img src="{{ asset('assets/profile.png') }}" alt="Guest"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Sarah Johnson</p>
                                <p class="text-xs text-gray-500">Stayed at Zen Villas</p>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 leading-relaxed">
                            “Villanya sangat bersih, tenang, dan staff-nya super helpful. Sunset
                            dari private pool benar-benar jadi highlight liburan kami di Bali.”
                        </p>

                        <div class="mt-4 flex items-center gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-[#fcca2d]">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endfor
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden">
                                <img src="{{ asset('assets/profile.png') }}" alt="Guest"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Michael Brown</p>
                                <p class="text-xs text-gray-500">Family getaway</p>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 leading-relaxed">
                            “Lokasinya dekat pantai, tapi tetap private. Anak-anak senang
                            banget dengan pool dan garden-nya, sementara kami bisa santai di
                            living room yang luas.”
                        </p>

                        <div class="mt-4 flex items-center gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-[#fcca2d]">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endfor
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden">
                                <img src="{{ asset('assets/profile.png') }}" alt="Guest"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Emily Davis</p>
                                <p class="text-xs text-gray-500">Honeymoon trip</p>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 leading-relaxed">
                            “Team HolidayBaliVilla sangat responsif dari sebelum booking
                            sampai check-out. Villa-nya romantis, dekorasi simple tapi mewah,
                            cocok banget untuk honeymoon.”
                        </p>

                        <div class="mt-4 flex items-center gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 fill-[#fcca2d]">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 3 end -->


        <!-- section 5 - Why choose us -->
        <section id="section5" class="py-20 bg-white">
            <div class="container mx-auto px-4 lg:px-2">
                <div class="text-center mb-12">
                    <p class="text-xs tracking-[0.3em] text-gray-400 uppercase">Why choose us</p>
                    <h2 class="mt-3 text-3xl md:text-4xl font-semibold text-gray-900">
                        Stay with confidence
                    </h2>
                    <p class="mt-3 text-sm md:text-base text-gray-500 max-w-2xl mx-auto">
                        Kami mengkurasi villa-villa terbaik di Bali dengan standar kebersihan,
                        kenyamanan, dan pelayanan yang konsisten, sehingga Anda bisa fokus
                        menikmati liburan.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div class="text-center flex flex-col items-center">
                        <div class="w-11 h-11 rounded-full bg-[#f5ede1] flex items-center justify-center mb-4">
                            <!-- icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-[#D6B390]">
                                <path d="M12 2.25 3 7.5v12.75h6.75v-6h4.5v6H21V7.5L12 2.25Z" />
                            </svg>
                        </div>
                        <p class="text-base font-semibold text-gray-900">Curated private villas</p>
                        <p class="mt-2 text-sm text-gray-500">
                            Semua villa telah dikurasi dan dicek kualitasnya, mulai dari lokasi,
                            fasilitas, hingga pengalaman tamu sebelumnya.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="text-center flex flex-col items-center">
                        <div class="w-11 h-11 rounded-full bg-[#f5ede1] flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-[#D6B390]">
                                <path
                                    d="M12 1.5A7.5 7.5 0 0 0 4.5 9v3.75l-1.72 3.44A1.125 1.125 0 0 0 3.78 18h16.44a1.125 1.125 0 0 0 1-1.81L19.5 12.75V9A7.5 7.5 0 0 0 12 1.5Z" />
                            </svg>
                        </div>
                        <p class="text-base font-semibold text-gray-900">24/7 guest support</p>
                        <p class="mt-2 text-sm text-gray-500">
                            Tim kami siap membantu mulai dari proses booking, penjemputan,
                            hingga kebutuhan selama menginap.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="text-center flex flex-col items-center">
                        <div class="w-11 h-11 rounded-full bg-[#f5ede1] flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-[#D6B390]">
                                <path fill-rule="evenodd"
                                    d="M12 3.75a8.25 8.25 0 1 0 8.25 8.25A8.259 8.259 0 0 0 12 3.75Zm.75 4.5a.75.75 0 0 0-1.5 0v4.5a.75.75 0 0 0 .336.627l2.25 1.5a.75.75 0 1 0 .828-1.254L12.75 12.6V8.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-base font-semibold text-gray-900">Flexible check-in</p>
                        <p class="mt-2 text-sm text-gray-500">
                            Opsi early check-in dan late check-out* untuk menyesuaikan jadwal
                            penerbangan dan itinerary Anda.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="text-center flex flex-col items-center">
                        <div class="w-11 h-11 rounded-full bg-[#f5ede1] flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-[#D6B390]">
                                <path fill-rule="evenodd"
                                    d="M2.25 12a9.75 9.75 0 1 1 17.444 5.652l1.403 1.403a.75.75 0 1 1-1.061 1.06l-1.403-1.402A9.75 9.75 0 0 1 2.25 12Zm9.75-5.25a.75.75 0 0 1 .75.75v3.75h3.75a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75V7.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-base font-semibold text-gray-900">Transparent pricing</p>
                        <p class="mt-2 text-sm text-gray-500">
                            Harga yang jelas tanpa biaya tersembunyi, sehingga Anda bisa
                            merencanakan budget liburan dengan tenang.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- section 5 end -->


      <x-footer />




    </main>


    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>


    <script>
        // Select navbar and target section
        const navbar = document.getElementById('navbar');
        const mobile = document.getElementById('mobile-menu');
        const targetSection = document.getElementById("section2"); // Ganti sesuai section yang diinginkan

        //
    </script>



</body>

</html>