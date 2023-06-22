<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($mahasiswa) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($mahasiswa) ? route('mahasiswas.update', $mahasiswa->id) : route('mahasiswas.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($mahasiswa)
                            @method('post')
                        @endisset
                
                        <div>
                            <x-input-label for="nim" value="nim" />
                            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="$mahasiswa->nim ?? old('nim')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
                        </div>

                        <div>
                            <x-input-label for="nama" value="nama" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="$mahasiswa->nama ?? old('nama')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>

                        <div>
                            <x-input-label for="umur" value="umur" />
                            <x-text-input id="umur" name="umur" type="text" class="mt-1 block w-full" :value="$mahasiswa->umur ?? old('umur')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('umur')" />
                        </div>

                        <div>
                            <x-input-label for="alamat" value="alamat" />
                            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="$mahasiswa->alamat ?? old('alamat')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>

                        <div>
                            <x-input-label for="kota" value="kota" />
                            <x-text-input id="kota" name="kota" type="text" class="mt-1 block w-full" :value="$mahasiswa->kota ?? old('kota')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('kota')" />
                        </div>

                        <div>
                            <x-input-label for="kelas" value="kelas" />
                            <x-text-input id="kelas" name="kelas" type="text" class="mt-1 block w-full" :value="$mahasiswa->kelas ?? old('kelas')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                        </div>

                        <div>
                            <x-input-label for="jurusan" value="jurusan" />
                            <x-text-input id="jurusan" name="jurusan" type="text" class="mt-1 block w-full" :value="$mahasiswa->jurusan ?? old('jurusan')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
                        </div>

                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>