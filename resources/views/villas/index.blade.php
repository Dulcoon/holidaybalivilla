<x-app-layout>

 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="breadcrumb ml-3 py-5">
   @include('components.breadcrumb')
  </div>

  @if (session()->has('success'))
   <x-alert message="{{ session('success') }}" />
  @endif

  <div class="flex justify-between px-3">
   <h2 class="font-semibold text-2xl">Villas</h2>

   <a href="{{route('villas.create')}}">
    <button class="flex px-3 py-3 bg-blue-500 font-semibold text-white">
     <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
      stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
     </svg>Tambah Villa
    </button>
   </a>
  </div>

  <div class="grid md:grid-cols-3 grid-cols-1 gap-3 mt-6 px-3">
   @foreach ($villas as $villa)
    <div class="border-2 border-dashed border-blue-200">
     <img src="{{ $villa->thumbnail ? url('storage/' . $villa->thumbnail) : url('storage/no_image.png') }}"
      class="h-96 w-full object-cover" alt="">
     <div class="text-center">
      <p>{{ $villa->name }}</p>
      <p>Rp. {{ number_format($villa->price_per_night) }}/night</p>
      <p>Status: {{ $villa->status }}</p>
     </div>

     <div class="flex justify-center gap-2">
      <a href="{{route('villas.show', $villa)}}" class="w-full">
       <button class="w-full px-3 py-3 bg-zinc-400 font-semibold">Detail Villa</button>
      </a>
      <a href="{{route('villas.edit', $villa)}}" class="w-full">
       <button class="w-full px-3 py-3 bg-yellow-400 font-semibold">Edit</button>
      </a>
      <form action="{{ route('villas.destroy', $villa) }}" method="POST"
       onsubmit="return confirm('Are you sure you want to delete this villa?');" class="w-full">
       @csrf
       @method('DELETE')
       <button type="submit" class="w-full px-3 py-3 bg-red-500 font-semibold text-white">Delete</button>
      </form>
     </div>
    </div>
   @endforeach
  </div>

  <div class="mt-4 px-3">
   {{ $villas->links() }}
  </div>

 </div>

</x-app-layout>