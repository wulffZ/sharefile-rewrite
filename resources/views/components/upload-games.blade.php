<div class="p-2">
    <form method="POST" action="{{ route('upload', ["category" => "game"]) }}" enctype="multipart/form-data">
    @csrf
        <!-- Name and description -->
        <p class="text-gray-700">* are required</p>
        <x-title-and-description></x-title-and-description>

        <!-- Thumbnail -->
        <x-thumbnail-upload></x-thumbnail-upload>

        <!-- Developer / Studio -->
        <x-modular-collapse-form heading="Developer and Genre">
            <div class="mt-4">
                <x-label for="developer" value="Developer - If you know the developer of your game, please enter it here"/>

                <x-input id="developer" class="block mt-1 w-full" type="text" name="developer" autofocus/>
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <x-label for="genre" value="Genre* - Enter what genre's you would consider your game to be. Like this: adventure, rpg, open-world"/>

                <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" autofocus/>
            </div>

            <!-- CD key / Password -->
            <div class="mt-4">
                <x-label for="cdkey" value="Cdkey - If your game has a cd key or password, please fill it here"/>

                <x-input id="cdkey" class="block mt-1 w-full" type="text" name="cdkey" autofocus/>
            </div>
        </x-modular-collapse-form>

        <x-progress></x-progress>

        <x-progress-script></x-progress-script>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
