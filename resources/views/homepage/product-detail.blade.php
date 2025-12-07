<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Woodcraft Homeliving - Product Detail</title>
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
        <section id="product-detail" class="container mx-auto px-4 sm:px-6 lg:px-24 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}"
                        class="rounded-lg shadow-lg object-cover w-full max-w-md">
                </div>

                <!-- Product Details -->
                <div class="flex flex-col justify-center">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->nama }}</h1>
                    <p class="text-gray-500 text-lg mb-6">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p class="text-gray-700 text-base mb-6">{{ $product->deskripsi }}</p>

                    <button class="bg-[#e2f8f6] text-gray-800 px-6 py-3 rounded-lg shadow-md hover:bg-[#d1f0ec]">
                     <a href="https://wa.me/6287744083275?text=Hello, I would like to inquire about the product {{ $product->nama }}."
                      target="_blank" class="block text-gray-800">
                      Ask Seller via WhatsApp
                     </a>
                    </button>
                    </div>
            </div>
        </section>
    </main>

    <div class="footer bg-[#f1f3f2] mt-56">
        <div class="container py-20 grid grid-cols-1 gap-44 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
            <div class="text-center">
                <h1 class="text-xl font-bold">PT. HARUM SARI</h1>
                <p class="text-sm">WOODCRAFT HOMELIVING</p>
            </div>
            <div class="text-center">
                <h1 class="text-xl font-bold">Categories</h1>
                <div class="mt-5">
                    <a class="block" href="">Bedroom</a>
                    <a class="block" href="">Livingroom</a>
                    <a class="block" href="">Homewares</a>
                    <a class="block" href="">Kids Furniture</a>
                </div>
            </div>
            <div class="text-center">
                <h1 class="text-xl font-bold">PT. HARUM SARI</h1>
                <p class="text-sm">WOODCRAFT HOMELIVING</p>
            </div>
        </div>
        <p class="text-center pb-8">&copy; 2024 Copyright: homeliving.co.id </p>
    </div>
</body>

</html>