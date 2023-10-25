<x-layout>
  @include('partials._search')
  <div class="flex justify-center gap-10 flex-wrap">
    @unless (count($posts) == 0)
    @foreach ($posts as $post)
    <x-post-card :post="$post" />
    @endforeach
    {{-- {{$posts->links()}} --}}
    @else
    <p>There is no posts</p>
    @endunless
  </div>
</x-layout>