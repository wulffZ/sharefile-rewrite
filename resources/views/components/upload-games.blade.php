<div class="p-2">
    <form method="POST" action="{{ route('upload', ["category" => "game"]) }}" enctype="multipart/form-data">
    @csrf
        <!-- Name and description -->
        <p class="text-gray-700">* are required</p>

        <x-title-and-description></x-title-and-description>

        <!-- File -->
        <x-file-upload></x-file-upload>

        <!-- Developer / Studio -->
        <x-modular-collapse-form heading="Optional fields">
            <div class="flex flex-row">
                <div class="w-1/2 p-2">
                    <div>
                        <x-label for="developer" value="Developer"/>

                        <x-input id="developer" class="block mt-1 w-full" type="text" name="developer" autofocus/>
                    </div>
                </div>
                <div class="w-1/2 p-2">
                    <x-label for="genre" value="Genre, like this: adventure, rpg, open-world"/>

                    <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" autofocus/>
                </div>
            </div>
            <div class="w-full">
                <x-thumbnail-upload></x-thumbnail-upload>
            </div>
        </x-modular-collapse-form>

        <x-modal id="progress_modal">
            <h2>Now uploading your file</h2>

            <x-progress></x-progress>
            <x-progress-script></x-progress-script>
        </x-modal>

        <div class="py-4">
            <div class="w-full border rounded border border-gray-500"></div>
        </div>

        <div class="mt-2 flex justify-end">
            <button><x-open-modal-button for="progress_modal">upload</x-open-modal-button><button>
        </div>
    </form>
</div>
