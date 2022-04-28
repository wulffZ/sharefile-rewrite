<input type="checkbox" id="modal" class="modal-toggle">
<label for="modal" class="modal cursor-pointer">
    <label class="modal-box relative border rounded-md text-gray-200 bg-gray-900 p-6" for="">
        <h3 class="text-lg font-bold">Uploading a file</h3>
        <p class="py-4">Select one of the 5 categories.</p>
        {{ $slot }}
    </label>
</label>
