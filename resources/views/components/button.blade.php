<button {{ $attributes->merge(['type' => 'submit', 'class' => 'justify-center inline-flex items-center px-4 py-2 bg-[#00D9A5] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00A47C] active:bg-[#008363] focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
