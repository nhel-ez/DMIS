<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-white rounded-md font-700 text-l text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

