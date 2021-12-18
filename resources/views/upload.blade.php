<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Uploading: {{ $category }}
        </h2>
    </x-slot>

    <!-- Session Status -->

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-900">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-1/2">
        <!-- Upload component -->
        @switch($category)
            @case("videos")
            <x-upload-videos class="mb-4"></x-upload-videos>
            @break

            @case("games")
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
    </div>
</x-app-layout>
