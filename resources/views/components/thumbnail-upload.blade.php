<div class="mt-4 flex flex-row">
        <div class="flex items-center">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-gray-800 text-gray-200 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 hover:bg-opacity-25  active:bg-gray-900 transition ease-in-out duration-150">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"/>
                </svg>
                <span class="mt-2 text-base leading-normal">Select a thumbnail</span>
                <input id="thumbail" name="thumbnail" type='file' class="hidden"/>
            </label>
        </div>
        <div class="hidden sm:flex w-64 ml-2 border rounded">
            <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="object-contain" alt="preview image" />
        </div>
</div>
