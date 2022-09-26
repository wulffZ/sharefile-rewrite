<x-app-layout>
    <x-slot name="header" class="bg-gray-800">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ $category }}
        </h2>
        <ul class="list-disc ml-5 text-gray-100">

            @switch($category)
                @case("videos")
                    <li>No NSFW, please use sharesauce instead.</li>
                    <li>We lazy load the videos on this page to reduce server load. If you want to view a long video, please
                        download them.
                    </li>
                @break

                @case("games")
                    <li>If you upload your game in multiple parts, please title the parts accordingly</li>
                    <li>If the game is a crack, and requires install instructions or passwords, please input them in the description</li>
                @break

                @case("software")
                    <li>If the game is a crack, and requires install instructions or passwords, please input them in the description</li>
                @break

                @case("music")
                    <li>Please add the artist to your track, and an (optional) image.</li>
                @break

                @case("other")
                    <li>cum about it</li>
                @break
            @endswitch

        </ul>
    </x-slot>
    <div class="flex flex-col h-screen justify-between mt-4">
        <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto">
            @foreach($categoryItems['items'] as $item)
                <div class="card shadow-xl image-full">

                        @if(isset($item['thumbnail_uri']))
                            <figure><img src="{{ asset('/storage/thumbnails/'.$item['thumbnail_uri']) }}"/></figure>

                        @else
                            <figure><img src="{{ asset('images/brand/fubuki-confused.gif') }}"/></figure>
                        @endif

                    <div class="card-body">
                        <h2 class="card-title">{{ $item['title'] }}</h2>
                        @if(isset($item['description']))
                            <p>{{ $item['description'] }}</p>

                        @else
                            <p><a class="underline" href="https://google.com/search?q={{ $item['artist'] }}" target="_blank">{{ $item['artist'] }}</a></p>
                        @endif
                        <div class="flex flex-row justify-between">
                            <p><a class="underline">{{ $item['user']['name'] }}</a></p>
                            <div class="card-actions">

                                @if($category == "videos")
                                    <x-open-modal-button onclick="loadVideo({{ $item['id'] }})" for="{{ $item['id'] }}">PLAY</x-open-modal-button>

                                    @else
                                        <a href="{{ route('file.show', ['category' => $category, 'id' => $item['id']]) }}">
                                            <x-button>
                                                SHOW
                                                <i class="fa-solid fa-eye ml-2"></i>
                                            </x-button>
                                        </a>
                                @endif

                            </div>
                        </div>
                    </div>

                    @if($category == "videos")

                        <x-modal id="{{ $item['id'] }}">
                            <div class="card w-full pt-6">
                                <video id="video_{{ $item['id'] }}_container" data-video-url="{{ $item['temporary_url'] }}" controls>
                                    <source src="" type="video/mp4">
                                </video>
                                <div class="card-body">
                                    <div tabindex="0" class="collapse collapse-plus shadow rounded-box bg-gray-800">
                                        <div class="collapse-title text-xl font-medium">
                                            <p class="p-3">Metadata</p>
                                        </div>
                                        <div class="collapse-content">
                                            <div class="stats stats-vertical w-full text-gray-200">
                                                <div class="stat bg-gray-800">
                                                    <div class="stat-title">Size</div>
                                                    <div class="stat-value">{{ $item['size'] }}</div>
                                                    <div class="stat-desc">In bytes!</div>
                                                </div>

                                                <div class="stat bg-gray-800">
                                                    <div class="stat-title">Created at</div>
                                                    <div class="stat-value text-xl">{{ $item['created_at'] }}</div>
                                                    <div class="stat-desc">Older than your mother</div>
                                                </div>

                                                <div class="stat bg-gray-800">
                                                    <div class="stat-title">Times downloaded</div>
                                                    <div class="stat-value">{{ $item['times_downloaded'] }}</div>
                                                    <div class="stat-desc"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-actions justify-end mt-2">
                                        <a href="{{ $item['temporary_url'] }}" download>
                                            <x-button>
                                                DOWNLOAD
                                            <i class="fa-solid fa-download ml-2"></i>
                                            </x-button>
                                        </a>
                                        <a href="{{ route('file.show', ['category' => 'videos', 'id' => $item['id'] ]) }}">
                                            <x-button>
                                               SHOW
                                                <i class="fa-solid fa-eye ml-2"></i>
                                            </x-button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </x-modal>

                    @endif
                </div>
            @endforeach
        </div>

        <div class="mx-auto p-4">
            {{ $categoryItems['links'] }}
        </div>
    </div>

    @if($category == "videos")

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

    @endif
</x-app-layout>
