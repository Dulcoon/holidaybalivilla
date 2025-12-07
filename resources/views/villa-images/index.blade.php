<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Villa Images for ') . $villa->name }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-between px-3">
      <h2 class="font-semibold text-2xl">Images for {{ $villa->name }}</h2>
      <a href="{{ route('villa-images.create', $villa) }}">
        <button class="flex px-3 py-3 bg-blue-500 font-semibold text-white">
          <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>Add Images
        </button>
      </a>
    </div>

    @if (session()->has('success'))
    <x-alert message="{{ session('success') }}" />
    @endif

    <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-6 px-3">
      @forelse ($images as $image)
      <div class="border-2 border-dashed border-blue-200">
        <img src="{{ url('storage/' . $image->image_path) }}" class="w-full h-48 object-cover" alt="">
        <div class="text-center mt-2">
          <form action="{{ route('villa-images.destroy', [$villa, $image]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded">Delete</button>
          </form>
        </div>
      </div>
      @empty
      <p>No images found for this villa.</p>
      @endforelse
    </div>

    <div class="mt-4 px-3">
      <a href="{{ route('villas.show', $villa) }}" class="text-blue-500">Back to Villa Details</a>
    </div>
  </div>

</x-app-layout>
