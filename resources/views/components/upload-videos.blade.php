<div class="m-4">
    <form method="POST" action="{{ route('upload', ["category" => "videos"]) }}">
    @csrf
        <!-- Name -->
        <div>
            <h5 class="text-gray-700">* items are required</h5>
            <x-label for="name" value="Name*"/>

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus/>
        </div>

        <!-- Description -->
        <x-description></x-description>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
