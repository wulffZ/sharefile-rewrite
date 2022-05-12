<div class="m-4">
    <form method="POST" action="{{ route('upload', ["category" => "software"]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Name and description -->
        <x-title-and-description></x-title-and-description>

        <!-- Developer / Studio -->
        <x-modular-collapse-form heading="Developer and Type">
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
        </x-modular-collapse-form>

        <x-progress></x-progress>

        <x-progress-script></x-progress-script>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
