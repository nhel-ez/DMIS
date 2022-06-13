<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

