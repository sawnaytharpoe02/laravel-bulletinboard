<x-layout>
  <div>
    <p>{{$post->title}}</p>
    <p>{{$post->description}}</p>
    <a class="btn btn-sm btn-primary capitalize" onclick="edit_post.showModal()">Edit</a>
    <a class="btn btn-sm btn-error capitalize" onclick="delete_post.showModal()">Delete</a>
  </div>

  {{-- Edit Post Modal --}}
  <dialog id="edit_post" class="modal">
    <div class="modal-box">
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>

      <form class="card-body" action="/posts/{{$post->id}}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control">
          <label class="label">
            <span class="label-text">Title</span>
          </label>
          <input type="text" name="title" class="input input-bordered text-sm" value="{{$post->title}}" required />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
          <textarea type="text" name="description"
            class="textarea textarea-bordered textarea-md w-full h-32 text-sm">{{$post->description}}</textarea>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-sm h-10 btn-primary" type="submit">Update Post</button>
        </div>
      </form>

    </div>
  </dialog>

  {{-- Delete Post Modal --}}
  <dialog id="delete_post" class="modal">
    <div class="modal-box">

      <div class="card-body items-center text-center">
        <h2 class="card-title">Delete Post!</h2>
        <p class="my-3 text-sm">Are you sure you want to delete this post?</p>
        <div class="card-actions justify-end">
          <form action="/posts/{{$post->id}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm h-10 btn-primary" type="submit">Accept</button>
          </form>
          <form method="dialog">
            <button class="btn btn-sm h-10 btn-ghost">Deny</button>
          </form>
        </div>
      </div>

    </div>
    </div>
  </dialog>
</x-layout>