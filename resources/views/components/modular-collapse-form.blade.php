<div {{ $attributes }} class="collapse text-gray-100 mt-4">
    <input type="checkbox" />
    <div class="collapse-title text-xl font-medium">
        <div class="flex items-center">
            <div>
                {{ $heading }}
            </div>
            <div class="ml-2">
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="collapse-content text-gray-900">
        {{ $slot }}
    </div>
</div>
