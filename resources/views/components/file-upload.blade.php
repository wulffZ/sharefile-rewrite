<div class="flex items-center">
    <label class="w-full flex flex-col items-center mt-4 px-4 py-6 bg-gray-800 text-gray-200 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25  active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
        <svg class="w-20 h-20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
        <span id="btn_title" class="mt-2 text-base leading-normal">Select a file</span>
        <input id="file" name="file" type='file' class="hidden"/>
    </label>
    </div>
<script>
    btn_title = document.getElementById("btn_title");

    file.onchange = evt =>
    {
        const [uploaded_file] = file.files
        if(uploaded_file) {
            btn_title.innerHTML = uploaded_file.name
        }
    }
</script>
