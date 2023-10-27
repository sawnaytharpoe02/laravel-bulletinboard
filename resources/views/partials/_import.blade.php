<button class="btn btn-sm h-10 btn-outline btn-secondary capitalize" onclick="import_modal.showModal()">Import</button>

<!-- Import Posts Excel Sheet Modal -->
<dialog id="import_modal" class="modal">
  <div class="modal-box p-16">
    <h3 class=" text-md">Import your excel sheet file here!</h3>
    <form action="{{ route('posts.import') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="flex items-center space-x-4 mt-4">
        <input type="file" name="excel-file" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />

        <button class="btn btn-sm capitalize">Import</button>
      </div>
      @error('excel-file')
      <p class="text-red-600 text-xs mt-2">{{$message}}</p>
      @enderror
    </form>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>