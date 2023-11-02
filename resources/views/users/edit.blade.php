<x-layout>
  @include('partials._back-btn', ['route' => auth()->user()->is_admin == 1 ? 'users' : ''])
  <div class="min-h-screen">
    <div class="hero">
      <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
        <form id="updateUserForm" class="card-body" action="/users/{{$user->id}}/update" method="post"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-control">
            <p
              class="font-noto underline underline-offset-4 decoration-indigo-500 text-center text-xl mb-4 tracking-wide">
              Edit User Form</p>
          </div>

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

          @if ($user->is_admin == 1)
          <div class="form-control">
            <label class="label">
              <span class="label-text">Role</span>
            </label>
            <select name="is_admin" class="select select-bordered text-sm">
              <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
              <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
            </select>
          </div>
          @endif

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
            <input type="file" name="image" id="image" class="edit-profile-image" data-max-files="1">

            @if ($user->image)
            <div class="avatar" id="preview-profile-image" class="relative">
              <button type="submit" form="updateImgForm" id="clear-profile-image-btn"
                class="w-7 h-7 bg-gray-300 rounded-full absolute right-0 top-0 m-4 cursor-pointer text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  class="inline-block w-5 h-5 stroke-current">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                  </path>
                </svg>
              </button>
              <div class="w-full h-72 bg-contain bg-no-repeat bg-center rounded-xl"
                style="background-image: url('{{asset('storage/posts/'. $user->image)}}')">
              </div>
            </div>
            @endif

            <button class="btn btn-sm h-10 btn-primary capitalize mt-6" type="submit"
              form="updateUserForm">Update</button>
          </div>
        </form>
        <form id="updateImgForm" action="/users/{{$user->id}}/clear-profile-image" method="POST">
          @csrf
        </form>
      </div>
    </div>
  </div>
</x-layout>