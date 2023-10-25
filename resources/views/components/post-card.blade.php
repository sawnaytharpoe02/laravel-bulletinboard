@props(['post'])

<div class="card w-80 bg-base-100 shadow-xl">
  <div class="card-body space-y-5">
    <div class="flex">
      <div class="avatar mr-5">
        <div class="w-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
          <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
        </div>
      </div>
      <div>
        <p class="font-semibold">{{$post->user_id}}</p>
        <p class="text-xs">{{($post->created_at)->diffForHumans()}}</p>
      </div>
    </div>
    <div>
      <h2 class="card-title mb-2"><a href="/posts/{{$post->id}}/detail">{{$post->title}}</a>
        <h2>
          <p class="text-sm">{{$post->description}}</p>
    </div>
    <div class="card-actions justify-end">
      <a class="btn btn-sm btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>
      <a class="btn btn-sm btn-error">Delete</a>
    </div>
  </div>
</div>