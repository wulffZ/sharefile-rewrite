<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url( {{asset('images/brand/server.jpg')}} ); background-size: cover; background-repeat: no-repeat;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-gray-800">
        {{ $slot }}
    </div>
</div>
