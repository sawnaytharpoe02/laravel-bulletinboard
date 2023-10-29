<x-layout>
  @include('partials._users-search')
  <div class="overflow-x-auto bg-base-100 rounded-lg">
    <x-user-table :users="$users" />
  </div>
</x-layout>