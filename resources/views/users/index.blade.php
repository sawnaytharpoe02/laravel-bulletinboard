<x-layout>
  @include('partials._search')
  <div class="overflow-x-auto bg-base-100 rounded-lg">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Date of birth</th>
          <th>Address</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <!-- row -->
        <tr>
          <th>
            <div>{{$user->id}}</div>
          </th>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img src="{{$user->image ? $user->image : asset('/images/img-3.jpg')}}" />
                </div>
              </div>
              <div>
                <div class="font-bold">{{$user->name}}</div>
                <div class="text-sm opacity-50">Admin</div>
              </div>
            </div>
          </td>
          <td>
            {{$user->email}}
          </td>
          <td>{{$user->phone ? $user->phone : 'N/A'}}</td>
          <td>{{$user->dob ? $user->dob : 'N/A'}}</td>
          <td>{{$user->address ? $user->address : 'N/A'}}</td>
          <th>
            <div class="flex items-center space-x-3">
              <button class="btn btn-accent btn-xs">Edit</button>
              <button class="btn btn-error btn-xs">Delete</button>
            </div>
        </tr>
        @endforeach

    </table>
  </div>
</x-layout>