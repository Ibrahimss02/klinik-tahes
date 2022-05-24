<x-dokter.dokter-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $resep->nama_resep }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" 
                        action=" {{route('resep.dokter.update', $resep -> id)}}" 
                        onsubmit="return confirm('Simpan Perubahan?');"
                        id="reservasi-detail-form">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <p class="mt-1 text-lg text-gray-600">Nama Dokter: dr.
                                            {{ Auth::guard('dokter')->user()->name }}</p>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                            Resep</label>
                                        <input type="text" name="name" id="name"
                                            class="h-11 mt-1 focus:ring-[#00D9A5] focus:border-[#00D9A5] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            value="{{ $resep->nama_resep }}">
                                    </div>

                                    <script src="https://unpkg.com/flowbite@1.4.6/dist/datepicker.js"></script>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <svg class="w-11 h-11 inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <input type="text" name="date"
                                                id="date" autocomplete="off"
                                                class="border border-gray-300 text-gray-900 sm:text-sm rounded-none rounded-r-md focus:ring-[#00D9A5] focus:border-[#00D9A5] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#00D9A5] dark:focus:border-[#00D9A5]"
                                                value="{{ $resep->tanggal }}"
                                                datepicker datepicker-orientation="bottom">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="pesan"
                                            class="block text-sm font-medium text-gray-700">Isi Resep</label>
                                        <textarea id="pesan" name="pesan" rows="4" class="block p-2.5 w-full rounded-md text-sm sm:text-sm text-gray-900 border border-gray-300 focus:ring-[#00D9A5] focus:border-[#00D9A5] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#00D9A5]  dark:focus:border-[#00D9A5]"
                                            placeholder="Masukkan keluhan/gejala yang dialami...">{{ $resep->pesan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                <x-button type="submit">Simpan</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dokter.dokter-app>
