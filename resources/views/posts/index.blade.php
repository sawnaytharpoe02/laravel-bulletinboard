<x-layout>
  <div class="flex justify-between">
    @include('partials._search')
    <div class="flex gap-4">
      @include('partials._export')
      @include('partials._import')
    </div>
  </div>
  <div class="flex justify-center gap-10 flex-wrap">
    @unless (count($posts) == 0)
    @foreach ($posts as $post)
    <x-post-card :post="$post" />
    @endforeach
    @else
    <p>There is no posts</p>
    @endunless
  </div>
  <div class="mt-6 py-4">{{$posts->links()}}</div>
</x-layout>