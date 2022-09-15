<x-slot name="header" class="bg-gray-800">
    <h2 class="font-semibold text-xl text-gray-100 leading-tight">
        {{ $categoryTitle }}
    </h2>
    <ul class="list-disc ml-5 text-gray-100">
        @foreach ($bulletPoints as $bulletPoint)
            <li>{{ $bulletPoint }}</li>
        @endforeach
    </ul>
</x-slot>
<div class="flex flex-col h-screen justify-between mt-4">
    <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto">
        @foreach($categoryItems as $categoryItem)
            <div class="card shadow-xl image-full">
                <figure><img src="{{ asset('/storage/thumbnails/'.$categoryItem['thumbnail_uri']) }}" alt="Shoes"/></figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $categoryItem['title'] }}</h2>
                    <p>{{ $categoryItem['description'] }}</p>
                    <div class="flex flex-row justify-between">
                        <p><a class="underline">{{ $categoryItem['user']['name'] }}</a></p>
                        <div class="card-actions justify-end">
                            {{ $cardActions }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mx-auto p-4">
        {{ $links }}
    </div>
</div>
