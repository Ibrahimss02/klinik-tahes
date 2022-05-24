<x-dokter.dokter-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Resep dr. ') . Auth::guard('dokter')->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="bg-white dark:bg-gray-900">
                        <div class="container px-6 py-10 mx-auto">

                            @if (!$list_resep)
                                <h1
                                    class="text-3xl font-semibold text-start text-gray-800 capitalize lg:text-4xl dark:text-white">
                                    Anda belum membuat resep.</h1>
                                <x-button type="submit">Tambahkan Resep</x-button>
                            @else
                                <div class="flex justify-between">
                                    <h1
                                        class="text-3xl font-semibold text-start text-gray-800 capitalize lg:text-4xl dark:text-white">
                                        Daftar Resep</h1>
                                    <x-button onclick="location.href='{{ route('resep.dokter.index.finished') }}'"
                                type=" submit">Tambahkan Resep</x-button>
                                </div>
                                <div
                                    class="grid grid-cols-1 gap-x-8 gap-y-6 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-2">
                                    @foreach ($list_resep as $resep)
                                        <div onclick="location.href='{{ route('resep.detail.dokter', $resep->id) }}'"
                                            class="px-12 py-8 transition-colors duration-200 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-[#00D9A5] dark:border-gray-700 dark:hover:border-transparent">
                                            <div class="flex flex-col sm:-mx-4 sm:flex-row">
                                                <img class="flex-shrink-0 object-cover w-24 h-24 rounded-full sm:mx-4 ring-4 ring-gray-300"
                                                    src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png"
                                                    alt="Foto Pasien">

                                                <div class="mt-4 sm:mx-4 sm:mt-0">
                                                    <h1
                                                        class="text-xl font-semibold text-gray-700 capitalize md:text-2xl dark:text-white group-hover:text-white">
                                                        {{ $resep->nama_resep }}
                                                    </h1>

                                                    <p
                                                        class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-white">
                                                        {{ $resep->tanggal }} </p>

                                                </div>
                                            </div>

                                            <p
                                                class="mt-4 text-gray-500 capitalize dark:text-gray-300 group-hover:text-white">
                                                {{ $resep->pesan }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-dokter.dokter-app>
