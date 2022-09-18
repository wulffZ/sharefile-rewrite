<x-app-layout>
    <x-category.category-index-partial categoryTitle="software" :bulletPoints="['If the game is a crack, and requires install instructions or passwords, please input them in the description']" :categoryItems="$software['items']" :links="$software['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
</x-app-layout>
