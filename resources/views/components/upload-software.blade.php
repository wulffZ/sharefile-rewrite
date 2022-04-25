<div class="m-4">
    <form method="POST" action="{{ route('upload', ["category" => "software"]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <h5 class="text-gray-700">* items are required</h5>
            <x-label for="title" value="Title*"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
        </div>

        <!-- Description -->
        <x-description></x-description>

        <!-- Developer -->
        <div class="mt-4">
            <x-label for="developer" value="Developer - If you care or know the developer of your software, please enter it here"/>

            <x-input id="developer" class="block mt-1 w-full" type="text" name="developer" autofocus/>
        </div>

        <!-- Type -->
        <div class="mt-4">
            <x-label for="type" value="Type* - Enter what type of software your file is. Like this: video editing software, crack, installer"/>

            <x-input id="type" class="block mt-1 w-full" type="text" name="type" autofocus/>
        </div>

        <!-- Activation key / Password -->
        <div class="mt-4">
            <x-label for="activationkey" value="Activation key - If your software has an activation key or password, please fill it here"/>

            <x-input id="activationkey" class="block mt-1 w-full" type="text" name="activationkey" autofocus/>
        </div>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
