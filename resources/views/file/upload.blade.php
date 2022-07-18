<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Uploading: {{ $category }}
        </h2>
    </x-slot>

    <div class="flex flex-col pt-4 md:pt-0 w-full h-screen items-center">
        <div class="w-full md:w-84 lg:w-1/2">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="p-2">
                <form method="POST" action="{{ route('file.uploadPost', $category) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name and description -->
                    <p class="text-gray-700">* are required</p>

                    <!-- Title and description (also video and other) -->
                    @if($category !== "music")
                    <x-title-and-description></x-title-and-description>
                    @else
                        <div class="mt-4">
                            <x-label for="title" value="Title*"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
                        </div>
                        <div class="mt-4">
                            <x-label for="artist"
                                     value="Artist* - Enter the artist / group / band name here"/>

                            <x-input id="artist" class="block mt-1 w-full" type="text" name="artist"
                                     autofocus/>
                        </div>
                    @endif

                    <!-- File -->
                    <x-file-upload></x-file-upload>

                    <!-- Music -->
                    @if($category == "music")
                    <x-modular-collapse-form heading="Optional fields">
                        <div class="w-full">
                            <x-thumbnail-upload></x-thumbnail-upload>
                        </div>
                    </x-modular-collapse-form>
                    @endif

                    <!-- Game -->
                    @if($category === "game")
                        <x-modular-collapse-form heading="Optional fields">
                            <div class="flex flex-row">
                                <div class="w-full">
                                    <x-label for="developer" value="Developer and or Studio that developed the game"/>

                                    <x-input id="developer" class="block mt-1 w-full" type="text" name="developer"
                                             autofocus/>
                                </div>
                            </div>
                            <div class="w-full">
                                <x-thumbnail-upload></x-thumbnail-upload>
                            </div>
                        </x-modular-collapse-form>
                    @endif

                    <!-- Software -->
                    @if($category === "software")
                        <x-modular-collapse-form heading="Optional fields">
                            <div class="flex flex-row">
                                <div class="w-full">
                                    <x-label for="developer"
                                             value="Developer and or studio that developed the software"/>

                                    <x-input id="developer" class="block mt-1 w-full" type="text" name="developer"
                                             autofocus/>
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
                        <button>
                            <x-open-modal-button for="progress_modal">upload</x-open-modal-button>
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>
