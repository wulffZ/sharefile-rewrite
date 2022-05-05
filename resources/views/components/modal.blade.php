<input {{ $attributes }} type="checkbox" id="{{ $id }}" class="modal-toggle">
<label for="{{ $id }}" class="modal cursor-pointer">
    <label class="modal-box relative border rounded-md text-gray-200 bg-gray-900 p-6" for="">
        {{ $slot }}
    </label>
</label>
