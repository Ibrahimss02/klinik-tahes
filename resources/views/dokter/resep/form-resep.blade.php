<x-dokter.dokter-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Resep untuk ') .  $reservasi->nama_awal . ' ' . $reservasi->nama_tengah . ' ' . $reservasi->nama_akhir }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data Resep</h3>
                                    <p class="mt-1 text-sm text-gray-600">Silahkan masukkan data resep yang akan
                                        diberikan ke pasien.</p>
                                        <div class=" mt-6 px-4 py-3 bg-gray-50 sm:px-6">
                                            <p class="mt-1 text-md text-gray-900">Keluhan Pasien:</p>
                                            <p class="mt-1 text-sm text-gray-600">{{ $reservasi -> pesan }}.</p>
                                        </div>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form 
                                onsubmit="return confirm('Simpan dan berikan resep kepada pasien?');"
                                action="{{ route('resep.dokter.create.save', $reservasi->id) }}" 
                                method="POST">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6">
                                                    <p class="mt-1 text-lg text-gray-600">Nama Pasien:
                                                        {{ $reservasi->nama_awal . ' ' . $reservasi->nama_tengah . ' ' . $reservasi->nama_akhir }}</p>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="nama_resep"
                                                        class="block text-sm font-medium text-gray-700">Nama
                                                        Resep</label>
                                                    <input type="text" name="nama_resep" id="nama_resep"
                                                        placeholder="Masukkan nama resep"
                                                        class="mt-1 focus:ring-[#00D9A5] focus:border-[#00D9A5] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="pesan"
                                                        class="block text-sm font-medium text-gray-700">Isi Resep:</label>
                                                        <textarea id="pesan" name="pesan" rows="4" class="block p-2.5 w-full rounded-md text-sm sm:text-sm text-gray-900 border border-gray-300 focus:ring-[#00D9A5] focus:border-[#00D9A5] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#00D9A5]  dark:focus:border-[#00D9A5]" placeholder="Masukkan resep yang akan diberikan..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                            <x-button type="submit"
                                                >Kirim</x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dokter.dokter-app>
