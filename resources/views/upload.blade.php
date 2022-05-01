<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Uploading: {{ $category }}
        </h2>
    </x-slot>

    <!-- Session Status -->

    <div class="flex flex-col items-center">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Upload component -->
        @switch($category)
            @case("video")
            <x-upload-videos class="mb-4"></x-upload-videos>
            @break

            @case("game")
            <x-upload-games class="mb-4"></x-upload-games>
            @break

            @case("software")
            <x-upload-software class="mb-4"></x-upload-software>
            @break

            @case("music")
            <x-upload-music class="mb-4"></x-upload-music>
            @break

            @case("other")
            <x-upload-other class="mb-4"></x-upload-other>
            @break
        @endswitch
        </div>
</x-app-layout>
