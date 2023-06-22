<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($dosen) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($dosen) ? route('dosens.update', $dosen->id) : route('dosens.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- add @method('put') for edit mode --}}
                        @csrf
                        @isset($dosen)
                            @method('put')
                        @endisset
                
                        <div>
                            <x-input-label for="nama" value="Nama" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="$dosen->nama ?? old('nama')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div>
                            <x-input-label for="mata_kuliah" value="Mata Kuliah" />
                            <x-text-input id="mata_kuliah" name="mata_kuliah" type="text" class="mt-1 block w-full" :value="$dosen->mata_kuliah ?? old('mata_kuliah')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('mata_kuliah')" />
                        </div>

                        <div>
                            <x-input-label for="dosen_image" value="Featured Image" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="dosen_image" name="dosen_image" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="dosen_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($dosen) ? Storage::url($dosen->dosen_image) : '' }}" alt="Featured image preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('dosen_image')" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('dosen_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in dosen_image_preview
                document.getElementById('dosen_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>