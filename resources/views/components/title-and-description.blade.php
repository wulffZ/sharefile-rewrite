<div class="collapse collapse-open text-gray-100">
    <input type="checkbox" />
    <div class="collapse-title text-xl font-medium">
        <div class="flex items-center">
            <div>
                Title and description
            </div>
            <div class="ml-2">
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="collapse-content text-gray-900">
        <div class="mt-2">
            <x-label for="title" value="Title*"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
        </div>
        <div class="mt-2">
            <x-label for="description" value="Description*"/>

            <textarea
                id="description"
                name="description"
                class="form-textarea mt-1 block w-full rounded-md bg-gray-400 shadow-sm border-gray-300 focus:border-purple-800 focus:ring focus:ring-purple-800 focus:ring-opacity-75"
                rows="3"
            ></textarea>
        </div>
    </div>
</div>
