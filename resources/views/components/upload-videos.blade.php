<div class="p-2">
    <form method="POST" action="{{ route('upload', ["category" => "video"]) }}" enctype="multipart/form-data">
    @csrf
        <!-- Name -->
        <div>
            <h5 class="text-gray-700">* items are required</h5>
            <x-label for="title" value="Title*"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
        </div>

        <!-- Description -->
        <x-description></x-description>

        <x-progress></x-progress>

        <x-progress-script></x-progress-script>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
