<x-app-layout>
    <x-category.category-index-partial categoryTitle="games" :bulletPoints="[
    'If you upload your game in multiple parts, please title the parts accordingly',
    'If the game is a crack, and requires install instructions or passwords, please input them in the description'
    ]" :categoryItems="$games['items']" :links="$games['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
</x-app-layout>
