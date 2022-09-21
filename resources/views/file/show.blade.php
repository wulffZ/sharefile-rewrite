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

                    <div class="stat">
                        <div class="stat-title">Created at</div>
                        <div class="stat-value text-md">{{ $categoryItem->created_at }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
