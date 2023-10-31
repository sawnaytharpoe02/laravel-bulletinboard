<x-layout>
  @include('partials._back-btn', ['route'])
  <div class="hero mt-5">
    <div class="flex flex-col lg:flex-row bg-base-100 rounded-md p-10">
      <div class="w-full max-w-sm text-left">
        <div class="flex">
          <div class="avatar mr-5">
            <div class="w-12 rounded-full ring ring-accent ring-offset-base-100 ring-offset-2">
              <img src={{$post->user->image ? $post->user->image : asset('/images/default-avatar.jpg')}} />
            </div>
          </div>
          <div>
            <p class="font-semibold">{{$post->user->name}}</p>
            <p class="text-xs text-slate-500">{{($post->created_at)->format('F j, Y')}}</p>
          </div>
        </div>
        <h1 class="text-xl lg:text-5xl font-bold mt-5">{{$post->title}}</h1>
      </div>
      <div class="w-full max-w-sm mt-4">
        <p class="text-gray-500 text-[0.85rem] leading-6 tracking-wide">{{$post->description}}</p>
        <div class="text-end mt-6">
          <a class="btn btn-sm btn-primary capitalize" onclick="edit_post.showModal()">Edit</a>
          <a class="btn btn-sm btn-error capitalize" onclick="delete_post.showModal()">Delete</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Edit Post Modal --}}
  <dialog id="edit_post" class="modal">
    <div class="modal-box">
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>

      <form class="card-body" action="/posts/{{$post->id}}/update" method="POST">
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