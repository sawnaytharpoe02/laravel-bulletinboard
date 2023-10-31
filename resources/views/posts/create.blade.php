<x-layout>
  @include('partials._back-btn')
  <div class="hero">
    <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
      <form class="card-body" action="/post" method="post">
        @csrf
        <div class="form-control">
          <label class="label">
            <span class="label-text">Title</span>
          </label>
          <input type="text" name="title" class="input input-bordered text-sm" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
          <textarea type="text" name="description"
            class="textarea textarea-bordered textarea-md w-full h-36 text-sm"></textarea>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-sm h-10 btn-primary">Create Post</button>
        </div>
      </form>
    </div>
  </div>
</x-layout>