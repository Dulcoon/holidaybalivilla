<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detail Villa') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="breadcrumb ml-3 py-5">
       @include('components.breadcrumb')
      </div>
    <div class="flex flex-col items-center lg:flex-row justify-between px-3">
      <h2 class="font-semibold text-2xl">Detail Villa</h2>
      <div class="flex flex-col lg:flex-row gap-2">
        <a href="{{ route('villas.edit', $villa) }}">
          <x-primary-button class="mt-4">
            {{ __('Edit Villa') }}
          </x-primary-button>
        </a>
        <a href="{{ route('villa-images.index', $villa) }}">
          <x-primary-button class="mt-4">
            {{ __('Manage Images') }}
          </x-primary-button>
        </a>
        <form action="{{ route('villas.destroy', $villa->id) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this villa?');">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4">
          {{ __('Delete Villa') }}
        </x-danger-button>
            </form>
      </div>
    </div>

    <div class="mt-4" x-data="{ imageUrl: '{{ $villa->thumbnail ? asset('storage/' . $villa->thumbnail) : '/storage/no_image.png' }}' }">
      <form enctype="multipart/form-data" action="{{ route('villas.update', $villa->id) }}" method="POST" class="block lg:flex gap-3">
        @csrf
        @method('PUT')
        <div class="lg:w-1/2">
          <img class="w-full lg:w-4/5" :src="imageUrl"/>
        </div>
        <div class="w-full px-3 lg:w-1/2 text-center lg:text-left">

          <div class="mt-4">
            <h3 class="text-slate-600">Name</h3>
            <p class="font-bold text-xl">{{ $villa->name }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Slug</h3>
            <p class="font-bold text-xl">{{ $villa->slug }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Description</h3>
            <p class="font-bold text-xl">{{ $villa->description }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Location</h3>
            <p class="font-bold text-xl">{{ $villa->location }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Address</h3>
            <p class="font-bold text-xl">{{ $villa->address }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Maps Link</h3>
            <p class="font-bold text-xl"><a href="{{ $villa->maps_link }}" target="_blank">{{ $villa->maps_link }}</a></p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Price per Night</h3>
            <p class="font-bold text-xl">Rp. {{ number_format($villa->price_per_night) }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">People</h3>
            <p class="font-bold text-xl">{{ $villa->people }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Bedrooms</h3>
            <p class="font-bold text-xl">{{ $villa->bedrooms }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Bathrooms</h3>
            <p class="font-bold text-xl">{{ $villa->bathrooms }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">swimming_pool</h3>
            <p class="font-bold text-xl">{{ $villa->swimming_pool }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Status</h3>
            <p class="font-bold text-xl">{{ $villa->status }}</p>
          </div>
          <div class="mt-4">
            <h3 class="text-slate-600">Fasilitas</h3>
            <p class="font-bold text-xl">
              @php
                $fasilitas_display = '';
                if (is_array($villa->fasilitas)) {
                    $fasilitas_display = implode(', ', $villa->fasilitas);
                } elseif (is_string($villa->fasilitas)) {
                    $decoded = json_decode($villa->fasilitas, true);
                    if (is_array($decoded)) {
                        $fasilitas_display = implode(', ', $decoded);
                    } else {
                        $fasilitas_display = $villa->fasilitas;
                    }
                }
              @endphp
              {{ $fasilitas_display }}
            </p>
          </div>
        </div>
      </form>
    </div>

    @if($villa->images->count() > 0)
    <div class="mt-6 px-3">
      <h3 class="font-semibold text-xl">Images</h3>
      <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-4">
        @foreach($villa->images as $image)
        <div class="border">
          <img src="{{ url('storage/' . $image->image_path) }}" class="w-full h-32 object-cover" alt="">
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>

</x-app-layout>
