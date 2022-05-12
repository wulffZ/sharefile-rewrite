<div class="mt-4 flex flex-row">
        <div class="flex items-center">
            {{-- Original file upload --}}
            <label id="thumbnail_upload" class="w-64 flex flex-col items-center px-4 py-6 bg-gray-800 text-gray-200 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25  active:bg-gray-900 transition ease-in-out duration-150">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"/>
                </svg>
                <span class="mt-2 text-base leading-normal">Select a thumbnail</span>
                <input id="thumbnail" name="thumbnail" type='file' class="hidden"/>
            </label>

            {{-- Open preview modal --}}
            <label id="thumbnail_preview" for="thumbnail_modal" class="hidden modal-button w-64 flex flex-col items-center px-4 py-6
                 text-gray-200 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25 active:bg-gray-900 transition ease-in-out duration-150">
                <svg class="w-8 h-8 fill-gray-100" viewBox="0 0 576 512">
                    <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/>
                </svg>
                <span class="mt-2 text-base leading-normal">View uploaded file</span>
            </label>

            {{-- Modal --}}
            <x-modal id="thumbnail_modal">
                <img id="imagepreview" class="rounded-md border">
                    <div class="w-100">
                        <a class="text-gray-200 w-full p-4" onclick="displayUpload()"><h2>Upload <u>again</u></h2>(You need to close this window)</a>
                    </div>
            </x-modal>
        </div>
</div>
<script>
    thumbnail_upload = document.getElementById("thumbnail_upload");
    thumbnail_preview = document.getElementById("thumbnail_preview");

    thumbnail.onchange = evt =>
    {
        const [file] = thumbnail.files
        if (file) {
            imagepreview.src = URL.createObjectURL(file);

            displayPreview();
        }
    }

    function displayUpload() {
        thumbnail_preview.style.display = "none";
        thumbnail_upload.style.display = "flex";
    }

    function displayPreview() {
        thumbnail_upload.style.display = "none";
        thumbnail_preview.style.display = "flex";
    }
</script>
