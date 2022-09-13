<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            videos
        </h2>
        <ul class="list-disc ml-5 text-gray-100">
            <li>No NSFW, please use sharesauce instead.</li>
            <li>We lazy load the videos on this page to reduce server load. If you want to view a long video, please
                download them.
            </li>
        </ul>
    </x-slot>
    <div class="flex flex-col h-screen justify-between mt-4">
        <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto">
            @foreach($videos as $video)
                <div class="card shadow-xl image-full">
                    <figure><img src="{{ asset('/storage/thumbnails/'.$video->thumbnail_uri) }}" alt="Shoes"/></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $video->title }}</h2>
                        <p>{{ $video->description }}</p>
                        <div class="flex flex-row justify-between">
                            <p><a class="underline">{{ $video->user->name }}</a></p>
                            <div class="card-actions">
                                <x-open-modal-button for="{{ $video->id }}">PLAY</x-open-modal-button>
                            </div>
                        </div>
                    </div>
                    <x-modal id="{{ $video->id }}">
                        <div class="card w-full pt-6">
                            <figure><img src="https://placeimg.com/400/225/arch" alt="car!"></figure>
                            <div class="card-body">
                                <div tabindex="0" class="collapse collapse-plus shadow rounded-box bg-gray-800">
                                    <div class="collapse-title text-xl font-medium">
                                        <p class="p-3">Metadata</p>
                                    </div>
                                    <div class="collapse-content">
                                        <div class="stats stats-vertical w-full text-gray-200">
                                            <div class="stat bg-gray-800">
                                                <div class="stat-title">Size</div>
                                                <div class="stat-value">{{ $video->size }}</div>
                                                <div class="stat-desc">In bytes!</div>
                                            </div>

                                            <div class="stat bg-gray-800">
                                                <div class="stat-title">Created at</div>
                                                <div class="stat-value text-xl">{{ $video->created_at }}</div>
                                                <div class="stat-desc">Older than your mother</div>
                                            </div>

                                            <div class="stat bg-gray-800">
                                                <div class="stat-title">Times downloaded</div>
                                                <div class="stat-value">{{ $video->times_downloaded }}</div>
                                                <div class="stat-desc"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-actions justify-end mt-2">
                                    <button class="
                                       flex items-center px-4 py-2
                    mr-2 text-gray-200 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25
                    active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
                                        DOWNLOAD
                                        <i class="fa-solid fa-download ml-2"></i>
                                    </button>
                                    <button class="
                                       flex items-center px-4 py-2
                    mr-2 text-gray-200 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25
                    active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
                                        SHOW
                                        <i class="fa-solid fa-eye ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                </div>
            @endforeach
        </div>

        <div class="mx-auto">
            {{ $videos->links('components.pagination-links') }}
        </div>
    </div>
</x-app-layout>
