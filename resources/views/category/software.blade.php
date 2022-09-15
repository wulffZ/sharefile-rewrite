<x-app-layout>
    <x-category.category-index-partial categoryTitle="software" :bulletPoints="['cum', 'about it']" :categoryItems="$software['items']" :links="$software['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
</x-app-layout>
