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
                    <form method="post"
                        action="{{ isset($matkul) ? route('matkuls.update', $matkul->id) : route('matkuls.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($matkul)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="matakuliah" value="Mata Kuliah" />
                            <x-text-input id="matakuliah" name="matakuliah" type="text" class="mt-1 block w-full"
                                :value="$matkul->matakuliah ?? old('matakuliah')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('matakuliah')" />
                        </div>

                        <div>
                            <x-input-label for="jadwal" value="Jadwal" />
                            <x-text-input id="jadwal" name="jadwal" type="text" class="mt-1 block w-full"
                                :value="$matkul->jadwal ?? old('jadwal')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('jadwal')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script></script>
</x-app-layout>
