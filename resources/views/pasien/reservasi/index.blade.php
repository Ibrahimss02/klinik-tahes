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
                                        onclick="location.href='{{ route('reservasi', $dokter -> id)}}'"
                                        class="flex flex-col items-center p-8 transition-colors duration-200 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-[#00D9A5] dark:border-gray-700 dark:hover:border-transparent">
                                        <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">

                                        <h1
                                            class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white truncate">
                                            {{ $dokter->name }}</h1>

                                        <div class="flex items-center mt-3 space-x-4">
                                            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white" aria-label="Lama Bekerja">
                                                <svg class="w-6 h-6 fill-current"
                                                viewBox="0 0 640 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                    d="M496 224C416.4 224 352 288.4 352 368s64.38 144 144 144s144-64.38 144-144S575.6 224 496 224zM544 384h-54.25C484.4 384 480 379.6 480 374.3V304C480 295.2 487.2 288 496 288C504.8 288 512 295.2 512 304V352h32c8.838 0 16 7.162 16 16C560 376.8 552.8 384 544 384zM320.1 352H208C199.2 352 192 344.8 192 336V288H0v144C0 457.6 22.41 480 48 480h312.2C335.1 449.6 320 410.5 320 368C320 362.6 320.5 357.3 320.1 352zM496 192c5.402 0 10.72 .3301 16 .8066V144C512 118.4 489.6 96 464 96H384V48C384 22.41 361.6 0 336 0h-160C150.4 0 128 22.41 128 48V96H48C22.41 96 0 118.4 0 144V256h360.2C392.5 216.9 441.3 192 496 192zM336 96h-160V48h160V96z" />
                                                    </path>
                                                </svg>
                                            </a>
                                            <p
                                                class="text-gray-500 capitalize dark:text-gray-300 group-hover:text-white">
                                                {{ $dokter->lama_bekerja }} Tahun</p>
                                        </div>
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
