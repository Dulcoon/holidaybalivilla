<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Contact Us - HolidayBaliVilla</title>
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
        <section class="py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-16">
                    <p class="text-xs tracking-[0.3em] text-[#B8915C] uppercase font-semibold mb-3">Contact Us</p>
                    <h1 class="font-serif text-4xl md:text-5xl text-[#1C1C1E]">Get in <span class="text-[#D6B390]">Touch</span></h1>
                    <p class="text-gray-500 mt-4 max-w-xl mx-auto">
                        Have a question or ready to book? Kami siap membantu Anda menemukan villa impian di Bali.
                    </p>
                </div>

                <div class="grid lg:grid-cols-5 gap-8 lg:gap-12">
                    <!-- Contact Info -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.06)] border border-gray-100 h-full">
                            <h2 class="font-serif text-2xl text-[#1C1C1E] mb-6">Contact Information</h2>
                            <p class="text-gray-500 text-sm mb-10">Jangan ragu untuk menghubungi kami via formulir atau kontak di bawah.</p>

                            <div class="space-y-8">
                                <!-- Phone -->
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-[#F5EDE1] flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Phone</p>
                                        <p class="text-gray-500 text-sm mt-1">08564564646</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-[#F5EDE1] flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Email</p>
                                        <p class="text-gray-500 text-sm mt-1">homelivingwoodcraft@gmail.com</p>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-[#F5EDE1] flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-[#B8915C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Address</p>
                                        <p class="text-gray-500 text-sm mt-1">Pura Masuka Street, South Kuta, Badung Regency, Bali 80361</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 pt-8 border-t border-gray-100">
                                <p class="text-sm font-semibold text-gray-900 mb-4">Follow Us</p>
                                <div class="flex gap-3">
                                    <a href="#" class="w-10 h-10 rounded-full bg-[#F5EDE1] flex items-center justify-center hover:bg-[#D6B390] hover:text-white transition">
                                        <i class="fab fa-instagram text-sm"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 rounded-full bg-[#F5EDE1] flex items-center justify-center hover:bg-[#D6B390] hover:text-white transition">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 rounded-full bg-[#F5EDE1] flex items-center justify-center hover:bg-[#D6B390] hover:text-white transition">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-3">
                        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-[0_8px_30px_rgba(0,0,0,0.06)] border border-gray-100">
                            <h2 class="font-serif text-2xl text-[#1C1C1E] mb-8">Send Us a Message</h2>

                            @if(session('pesan'))
                            <div class="mb-8 p-4 bg-green-50 border border-green-100 rounded-xl flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-green-800 text-sm font-medium">{{ session('pesan') }}</p>
                            </div>
                            @endif

                            <form action="{{ route('email.send') }}" method="POST">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                                        <input type="text" name="name" id="name" required
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm transition"
                                               placeholder="John Doe"/>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" name="email" id="email" required
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm transition"
                                               placeholder="john@example.com"/>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 gap-5 mb-5">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input type="text" name="phone" id="phone" required
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm transition"
                                               placeholder="+62 812-xxxx-xxxx"/>
                                    </div>
                                    <div>
                                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                        <input type="text" name="subject" id="subject" required
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm transition"
                                               placeholder="Booking Inquiry"/>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                    <textarea name="message" id="message" rows="5" required
                                              class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#D6B390] focus:border-transparent text-sm transition resize-none"
                                              placeholder="Tell us about your villa preferences..."></textarea>
                                </div>
                                <button type="submit"
                                        class="w-full sm:w-auto px-8 py-3.5 bg-[#D6B390] text-[#1C1C1E] font-bold rounded-full hover:bg-[#C7A277] transition shadow-md inline-flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</body>
</html>
