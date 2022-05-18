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
                    @endif

                    <!-- File -->
                    <x-file-upload></x-file-upload>

                    <!-- Game -->
                    @if($category === "game")
                        <x-modular-collapse-form heading="Optional fields">
                            <div class="flex flex-row">
                                <div class="w-1/2 p-2">
                                    <x-label for="developer" value="Developer"/>

                                    <x-input id="developer" class="block mt-1 w-full" type="text" name="developer"
                                             autofocus/>
                                </div>
                                <div class="w-1/2 p-2">
                                    <x-label for="genres" value="Genres, like this: adventure, rpg, open-world"/>

                                    <x-input id="genres" class="block mt-1 w-full" type="text" name="genres" autofocus/>
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
                                <div class="w-1/2 p-2">
                                    <x-label for="developer"
                                             value="Developer - If you care or know the developer of your software, please enter it here"/>

                                    <x-input id="developer" class="block mt-1 w-full" type="text" name="developer"
                                             autofocus/>
                                </div>
                                <div class="w-1/2 p-2">
                                    <x-label for="types"
                                             value="Type* - Enter what type of software your file is. Like this: video editing software, crack, installer"/>

                                    <x-input id="types" class="block mt-1 w-full" type="text" name="types" autofocus/>
                                </div>
                            </div>
                            <div class="w-full">
                                <x-thumbnail-upload></x-thumbnail-upload>
                            </div>
                        </x-modular-collapse-form>
                    @endif

                    <!-- Music -->
                    @if($category === "music")
                        <x-modular-collapse-form heading="Optional fields">
                            <div class="flex flex-row">
                                <div class="w-1/2 p-2">
                                    <x-label for="artist"
                                             value="Artist* - Enter the artist / group / band name here"/>

                                    <x-input id="artist" class="block mt-1 w-full" type="text" name="artist"
                                             autofocus/>
                                </div>
                                <div class="w-1/2 p-2">
                                    <x-label for="genres"
                                             value="Genre* - Enter what genre's you would consider your song to be. Like this: melodic death metal, japanese"/>

                                    <x-input id="genres" class="block mt-1 w-full" type="text" name="genres" autofocus/>
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
