<div class="m-4">
    <form method="POST" action="{{ route('upload', ["category" => "other"]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <h5 class="text-gray-700">* items are required</h5>
            <x-label for="title" value="Title*"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
        </div>

        <!-- Description -->
        <x-description></x-description>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
