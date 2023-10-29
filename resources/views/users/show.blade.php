<x-layout>
  <div>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <a class="btn btn-sm btn-accent capitalize" href="/users/{{$user->id}}/edit">Edit</a>
    <a class="btn btn-sm btn-error capitalize" onclick="delete_user.showModal()">Delete</a>
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