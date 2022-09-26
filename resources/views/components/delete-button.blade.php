<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-800 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 hover:bg-opacity-25  active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
