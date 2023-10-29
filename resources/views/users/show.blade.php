<x-layout>
  <div class="card w-[50%] h-80 lg:card-side bg-base-100 shadow-xl m-auto">
    <figure class="w-[50%] rounded-xl bg-cover bg-center bg-no-repeat" style="background-image: url('{{$user->image ? asset('storage/posts/'. $user->image) : asset('/images/default-avatar.jpg')}}')">
    </figure>
    <div class="card-body">
      <h2 class="card-title">
        {{$user->name}}
        <div class="badge badge-secondary">{{$user->role == 1 ? "User" : "Admin"}}</div>
      </h2>
      <div class="text-[0.84rem] font-noto text-gray-600 space-y-2 tracking-wide leading-6 mt-2">
        <p>Email - {{$user->email}}</p>
        <p>Phone - {{$user->phone ? $user->phone : ''}}</p>
        <p>Created at - {{$user->created_at}}</p>
        <p>Address - {{$user->address}}</p>
      </div>
      <div class="card-actions justify-end mt-auto">
        <a class="btn btn-sm btn-accent capitalize" href="/users/{{$user->id}}/edit">Edit</a>
        <a class="btn btn-sm btn-error capitalize" onclick="delete_user.showModal()">Delete</a>
      </div>
    </div>
  </div>

  {{-- Delete User Modal --}}
  <dialog id="delete_user" class="modal">
    <div class="modal-box">

      <div class="card-body items-center text-center">
        <h2 class="card-title">Delete User!</h2>
        <p class="my-3 text-sm">Are you sure you want to delete this user?</p>
        <div class="card-actions justify-end">
          <form action="/users/{{$user->id}}/delete" method="POST">
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