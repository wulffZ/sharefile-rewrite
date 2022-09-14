<x-app-layout>
    <x-category.category-index-partial categoryTitle="games" :bulletPoints="['cum', 'about it']" :categoryItems="$games['items']" :links="$games['links']"></x-category.category-index-partial>
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
