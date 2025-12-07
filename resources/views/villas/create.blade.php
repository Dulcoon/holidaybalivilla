<x-app-layout>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="breadcrumb ml-3 py-5">
       @include('components.breadcrumb')
      </div>
    <div class="flex justify-between px-3">
      <h2 class="font-semibold text-2xl">Add Villa</h2>
    </div>

    <div class="mt-4" x-data="{ imageUrl: '/storage/no_image.png' }">
      <form enctype="multipart/form-data" action="{{ route('villas.store') }}" method="POST" class="flex gap-3">
        @csrf
        <div class="w-1/2">
          <img class="w-4/5" :src="imageUrl"/>
        </div>
        <div class="w-1/2">
          <div class="mt-4">
            <x-input-label for="thumbnail" :value="__('Thumbnail')" />
            <x-text-input accept="image/*" id="thumbnail" class="block mt-1 w-full border p-2" type="file" name="thumbnail" :value="old('thumbnail')" required @change="imageUrl = URL.createObjectURL($event.target.files[0])"/>
            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="slug" :value="__('Slug')" />
            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')"/>
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-area id="description" class="block mt-1 w-full" type="text-area" name="description">{{ old('description') }}</x-text-area>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"/>
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-area id="address" class="block mt-1 w-full" type="text-area" name="address">{{ old('address') }}</x-text-area>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="maps_link" :value="__('Maps Link')" />
            <x-text-input id="maps_link" class="block mt-1 w-full" type="url" name="maps_link" :value="old('maps_link')"/>
            <x-input-error :messages="$errors->get('maps_link')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="price_per_night" :value="__('Price per Night')" />
            <x-text-input id="price_per_night" class="block mt-1 w-full" type="number" step="0.01" name="price_per_night" :value="old('price_per_night')" required/>
            <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
          </div>
   
          <div class="mt-4">
            <x-input-label for="bedrooms" :value="__('Bedrooms')" />
            <x-text-input id="bedrooms" class="block mt-1 w-full" type="number" name="bedrooms" :value="old('bedrooms')" required/>
            <x-input-error :messages="$errors->get('bedrooms')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="people" :value="__('people')" />
            <x-text-input id="people" class="block mt-1 w-full" type="number" name="people" :value="old('people')" required/>
            <x-input-error :messages="$errors->get('people')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="bathrooms" :value="__('bathrooms')" />
            <x-text-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')" required/>
            <x-input-error :messages="$errors->get('bathrooms')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="swimming_pool" :value="__('swimming_pool')" />
            <x-text-input id="swimming_pool" class="block mt-1 w-full" type="number" name="swimming_pool" :value="old('swimming_pool')" required/>
            <x-input-error :messages="$errors->get('swimming_pool')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />
            <select id="status" class="block mt-1 w-full border p-2" name="status" required>
              <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
              <option value="unavailable" {{ old('status') == 'unavailable' ?  'selected' : '' }}>Unavailable</option>
              <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
          </div>

          <!-- Fasilitas Component -->
          <div class="mt-4" x-data="fasilitasManager()">
            <x-input-label for="fasilitas_input" :value="__('Fasilitas')" />
            <div class="flex gap-2 mt-1">
              <x-text-input 
                id="fasilitas_input" 
                class="block flex-1 border p-2" 
                type="text" 
                placeholder="Masukkan fasilitas (contoh: WiFi, AC, Kolam Renang)"
                @keyup.enter="addFasilitas()"
                x-model="newFasilitas"
              />
              <button 
                type="button" 
                @click="addFasilitas()"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
              >
                Tambah
              </button>
            </div>
            <x-input-error :messages="$errors->get('fasilitas')" class="mt-2" />

            <!-- Daftar Fasilitas yang Ditambahkan -->
            <div class="mt-4 flex flex-wrap gap-2" x-show="fasilitas.length > 0">
              <template x-for="(item, index) in fasilitas" :key="index">
                <div class="flex items-center gap-2 bg-blue-100 px-3 py-2 rounded-full">
                  <span x-text="item" class="text-sm font-medium"></span>
                  <button 
                    type="button"
                    @click="removeFasilitas(index)"
                    class="text-red-600 hover:text-red-800 font-bold transition"
                  >
                    ✕
                  </button>
                </div>
              </template>
            </div>

            <!-- Hidden Input untuk Form Submission -->
            <input type="hidden" name="fasilitas" :value="fasilitasJSON()">
          </div>

          <x-primary-button class="w-full justify-center mt-3">
                  {{ __('Submit') }}
              </x-primary-button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function fasilitasManager() {
      return {
        fasilitas: @json(old('fasilitas') ?  json_decode(old('fasilitas'), true) : []),
        newFasilitas: '',
        
        addFasilitas() {
          if (this.newFasilitas.trim() === '') {
            alert('Masukkan fasilitas terlebih dahulu');
            return;
          }
          
          if (this.fasilitas.includes(this.newFasilitas. trim())) {
            alert('Fasilitas sudah ditambahkan');
            return;
          }
          
          this.fasilitas.push(this.newFasilitas.trim());
          this.newFasilitas = '';
        },
        
        removeFasilitas(index) {
          this.fasilitas.splice(index, 1);
        },
        
        fasilitasJSON() {
          return JSON.stringify(this.fasilitas);
        }
      }
    }
  </script>

</x-app-layout>