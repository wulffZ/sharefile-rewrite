<x-app-layout>
    <x-category.category-index-partial categoryTitle="other" :bulletPoints="['cum', 'about it']" :categoryItems="$other['items']" :links="$other['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
</x-app-layout>
