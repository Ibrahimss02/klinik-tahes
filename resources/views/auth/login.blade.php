<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" id="form-login">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" placeholder="Masukkan Email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Masukkan Password"
                                required autocomplete="current-password" />
            </div>

            <!-- Selecting Role -->
            <div class="mt-4">
                <x-label for="role_id" :value="__('Login Sebagai')" />
                <select name="role_id" onchange="onChangeSelectRole(this)"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="{{ route('login') }}">Pasien</option>
                    <option value="{{ route('dokter.login') }}">Dokter</option>
                </select>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-button>
                    {{ __('Log in') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register')}}">
                        {{ __('Belum memiliki akun?')}}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-start mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            </div>

            <script>
                function onChangeSelectRole(selectObject){
                    var value = selectObject.value;
                    document.getElementById('form-login').action = value;
                }
            </script>

        </form>
    </x-auth-card>
</x-guest-layout>
