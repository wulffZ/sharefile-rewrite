<div class="p-2">
    <form method="POST" action="{{ route('upload', ["category" => "video"]) }}" enctype="multipart/form-data">
    @csrf
        <!-- Name and description -->
        <x-title-and-description></x-title-and-description>

        <x-progress></x-progress>

        <x-progress-script></x-progress-script>

        <!-- File -->
        <x-file-upload></x-file-upload>
    </form>
</div>
