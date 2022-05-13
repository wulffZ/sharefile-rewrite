<div class="mt-2">
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
