<x-app-layout>
    <x-category.category-index-partial categoryTitle="music" :bulletPoints="[
    'Please add the artist to your track, and an (optional) image.',
    ]" :categoryItems="$music['items']" :links="$music['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
</x-app-layout>

