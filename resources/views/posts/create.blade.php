<x-layout>
  <div class="hero mt-12">
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form class="card-body" action="/posts" method="post">
        @csrf
        <div class="form-control">
          <label class="label">
            <span class="label-text">Title</span>
          </label>
          <input type="text" name="title" class="input input-bordered" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
          <textarea type="text" name="description"
            class="textarea textarea-bordered textarea-md w-full max-w-xs"></textarea>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Create Post</button>
        </div>
      </form>
    </div>

  </div>
</x-layout>