<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Uploading: {{ $category }}
        </h2>
    </x-slot>

    <div class="flex flex-col pt-4 md:pt-0 w-full h-screen items-center">
        <div class="w-full md:w-84 lg:w-1/2">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="p-2">
                <form method="POST" action="{{ route('file.uploadPost', ['category' => $category]) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name and description -->
                    <p class="text-gray-700">* are required</p>

                    <x-title-and-description></x-title-and-description>

                    <!-- File -->
                    <x-file-upload></x-file-upload>

                    <!-- Developer / Studio -->
                    @if($category === "game")
                    <x-modular-collapse-form heading="Optional fields">
                        {{--  Game  --}}
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
                    @endif

                    <x-modal id="progress_modal">
                        <h2>Now uploading your file</h2>

                        <x-progress></x-progress>
                        <x-progress-script></x-progress-script>
                    </x-modal>

                    <div class="py-4">
                        <div class="w-full border rounded border border-gray-500"></div>
                    </div>

                    <div class="mt-2 flex justify-end">
                        <button><x-open-modal-button for="progress_modal">upload</x-open-modal-button></button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>
