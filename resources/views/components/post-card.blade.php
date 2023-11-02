@props(['post'])

<div class="card w-80 bg-base-100 shadow-xl h-[22rem]">
  <div class="card-body space-y-5">
    <div class="flex">
      <div class="avatar mr-5">
        <div class="w-12 rounded-full ring ring-accent ring-offset-base-100 ring-offset-2">
          <img src={{$post->user->image ? asset('storage/posts/'. $post->user->image):
          asset('/images/default-avatar.jpg')}} />
        </div>
      </div>
      <div>
        <p class="font-semibold">{{$post->user->name}}</p>
        <p class="text-xs text-slate-500">{{($post->created_at)->format('F j, Y')}}</p>
      </div>
    </div>
    <div>
      <p class="font-semibold text-2xl mb-2 truncate capitalize">{{$post->title}}
      <p>
      <p class="text-[.8rem] text-slate-500 tracking-wide line-clamp-6">{{$post->description}}</p>
    </div>
    <div class="card-actions justify-end">
      <a class="btn btn-sm btn-accent capitalize" href="/posts/{{$post->id}}/detail">View</a>
    </div>
  </div>
</div>