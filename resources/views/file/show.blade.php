<x-app-layout>
    <div class="h-screen max-w-4xl mx-auto">
        <div class="flex-col lg:flex-row h-screen mx-auto p-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-md">

                    @if($category == "videos")
                        <video class="rounded-md" controls>
                            <source src="{{ $categoryItem->temporaryUrl }}" type="video/mp4">
                        </video>
                        @else
                            @if(isset($item['thumbnail_uri']))
                                <figure><img class="rounded md" src="{{ asset('/storage/thumbnails/'.$item['thumbnail_uri']) }}"/></figure>

                            @else
                                <figure><img class="rounded md" src="{{ asset('images/brand/fubuki-confused.gif') }}"/></figure>
                            @endif
                    @endif
                </div>
                <div class="">
                    <h1 class="text-5xl font-bold">{{ $categoryItem->title }}</h1>
                    <h1 class="text-2xl underline">{{ $categoryItem->user->name }}</h1>
                    <h1 class="text-xs">{{ $categoryItem->created_at }}</h1>
                    <p class="py-6">{{ $categoryItem->description }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-4">
                <div class="stats stats-vertical lg:stats-horizontal shadow bg-gray-800">

                    <div class="stat">
                        <div class="stat-title">Downloads</div>
                        <div class="stat-value">{{ $categoryItem->times_downloaded }}</div>
                        <div class="stat-desc">What are you waiting for?</div>
                    </div>

                    <div class="stat">
                        <div class="stat-title">Size</div>
                        <div class="stat-value">{{ $categoryItem->size }}</div>
                        <div class="stat-desc">Not as big as your mother!</div>
                    </div>

                    <div class="stat items-center">
                        <div class="stat-title">Status</div>

                        @if($categoryItem->soft_delete == 0)
                            <div class="stat-value">Available</div>
                            <div class="stat-desc">Viewable, and indexable</div>

                        @else
                            <div class="stat-value">Hidden</div>
                            <div class="stat-desc">Only direct links</div>
                        @endif
                    </div>

                    <div class="stat">
                        <a href="{{ $categoryItem->temporaryUrl }}" download>
                            <x-button class="max-h-12 w-32">
                            DOWNLOAD
                            <i class="fa-solid fa-download ml-2"></i>
                            </x-button>
                        </a>

                        <x-delete-button class="max-h-12 mt-2 w-32">
                            DELETE
                            <i class="fa-solid fa-remove ml-2"></i>
                        </x-delete-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
