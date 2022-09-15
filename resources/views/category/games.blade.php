<x-app-layout>
    <x-category.category-index-partial categoryTitle="games" :bulletPoints="['cum', 'about it']" :categoryItems="$games['items']" :links="$games['links']">
        <x-slot name="cardActions">
            <x-button>
                SHOW
                <i class="fa-solid fa-eye ml-2"></i>
            </x-button>
        </x-slot>
    </x-category.category-index-partial>
    <script>
        const loadVideo = id => {
            try {
                const video = document.getElementById('video_' + id + "_container")

                video.src = video.attributes['data-video-url'].value;
            } catch (error) {
                console.log(error);
            }
        }
    </script>
</x-app-layout>
