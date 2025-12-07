<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add Images for ') . $villa->name }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-between px-3">
      <h2 class="font-semibold text-2xl">Add Images for {{ $villa->name }}</h2>
    </div>

    <div class="mt-4">
      <form enctype="multipart/form-data" action="{{ route('villa-images.store', $villa) }}" method="POST">
        @csrf
        <div class="mt-4">
          <x-input-label for="images" :value="__('Images (multiple allowed)')" />
          <x-text-input accept="image/*" id="images" class="block mt-1 w-full border p-2" type="file" name="images[]" multiple required/>
          <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>

        <x-primary-button class="mt-3">
          {{ __('Upload Images') }}
        </x-primary-button>
      </form>
    </div>

    <div class="mt-4 px-3">
      <a href="{{ route('villa-images.index', $villa) }}" class="text-blue-500">Back to Images</a>
    </div>
  </div>

</x-app-layout>
