<x-app-layout>
    <x-category.category-index-partial :bullet_points="{ }">
        <x-slot name="modal_button">
            <li
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
