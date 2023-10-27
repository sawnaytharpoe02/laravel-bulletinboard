<x-layout>
  {{-- @dd($user) --}}
  <div class="min-h-screen">
    <div class="hero">
      <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
        <form class="card-body" action="/users/{{$user->id}}/update" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-control">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input type="text" name="name" class="input input-bordered text-sm" value="{{$user->name}}" />

            @error('name')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered text-sm" value="{{$user->email}}" />

            @error('email')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Phone</span>
            </label>
            <input type="text" name="phone" class="input input-bordered text-sm" value="{{$user->phone}}" />

            @error('phone')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Date of Birth</span>
            </label>
            <input type="date" name="dob" class="input input-bordered text-sm" value="{{$user->dob}}" />

            @error('dob')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">Role</span>
            </label>
            <select name="role" class="select select-bordered text-sm">
              <option value="0">Admin</option>
              <option value="1" selected>User</option>
            </select>
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">Address</span>
            </label>
            <textarea type="text" name="address"
              class="textarea textarea-bordered textarea-md w-full h-36 text-sm">{{$user->address}}</textarea>

            @error('address')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span><label class="label-text">Profile</span>
            </label>
            <input type="file" name="image" id="image" class="edit-profile-image" data-max-file-size="3MB"
              data-max-files="1">
            <div class="avatar">
              <div class="w-full rounded-xl preview-profile-image">
                <img src="{{$user->image ? asset('storage/posts/'. $user->image) : asset('/images/img-3.jpg')}}" alt="">
              </div>
            </div>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>