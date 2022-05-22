<x-pasien.pasien-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="container px-6 py-10 mx-auto">
                            <h1
                                class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
                                List Dokter</h1>

                            <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                                Buat reservasi dengan dokter yang anda ingingkan.
                            </p>

                            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
                                @foreach ($dokters as $dokter)
                                    
                                <div
                                    class="flex flex-col items-center p-8 transition-colors duration-200 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-[#00D9A5] dark:border-gray-700 dark:hover:border-transparent">
                                    <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                        alt="">

                                    <h1
                                        class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
                                        {{ $dokter -> name }}</h1>

                                    <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-white">
                                        {{ $dokter -> lama_bekerja}} Tahun</p>
                                </div>
                                
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-pasien.pasien-app>
