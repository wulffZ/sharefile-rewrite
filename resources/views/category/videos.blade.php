<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            videos
        </h2>
        <ul class="list-disc ml-5 text-gray-100">
            <li>No NSFW, please use sharesauce instead.</li>
            <li>We lazy load the videos on this page to reduce server load. If you want to view a long video, please download them.</li>
        </ul>
    </x-slot>
    <div class="flex flex-col h-screen justify-between mt-4">
        <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto">
            @foreach($videos as $video)
                    <div class="card bg-base-100 shadow-xl image-full">
                        <figure><img src="{{ asset('/storage/thumbnails/'.$video->thumbnail_uri) }}" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $video->title }}</h2>
                            <p>{{ $video->description }}</p>
                            <div class="card-actions justify-end">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">VIEW</button>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <div class="mx-auto">
            {{ $videos->links('components.pagination-links') }}
        </div>
    </div>
</x-app-layout>
