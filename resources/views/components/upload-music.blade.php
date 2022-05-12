<div class="m-4">
    <form method="POST" action="{{ route('upload', ["category" => "music"]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <h5 class="text-gray-700">* items are required</h5>
            <x-label for="title" value="Title*"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
        </div>

        <!-- Artist / group -->
        <div class="mt-4">
            <x-label for="artist" value="Artist* - Enter the artist / group / band name here"/>

            <x-input id="artist" class="block mt-1 w-full" type="text" name="artist" autofocus/>
        </div>

        <!-- Genre -->
        <div class="mt-4">
            <x-label for="genre" value="Genre* - Enter what genre's you would consider your song to be. Like this: melodic death metal, japanese"/>

            <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" autofocus/>
        </div>

        <x-progress></x-progress>

        <x-progress-script></x-progress-script>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
