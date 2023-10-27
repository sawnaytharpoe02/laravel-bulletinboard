<x-layout>
  <div class="min-h-screen">
    <div class="hero">
      <div class="card flex-shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
        <form class="card-body" action="/user" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input type="text" name="name" class="input input-bordered text-sm" value="{{old('name')}}" />

            @error('name')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered text-sm" value="{{old('email')}}" />

            @error('email')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" class="input input-bordered text-sm" value="{{old('password')}}" />

            @error('password')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Phone</span>
            </label>
            <input type="text" name="phone" class="input input-bordered text-sm" value="{{old('phone')}}" />

            @error('phone')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Date of Birth</span>
            </label>
            <input type="date" name="dob" class="input input-bordered text-sm" value="{{old('dob')}}" />

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
            <textarea type="text" name="address" class="textarea textarea-bordered textarea-md w-full h-36 text-sm">{{old(
                'address'
              )}}</textarea>

            @error('address')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span><label class="label-text">Profile</span>
            </label>
            <input type="file" name="image" id="image" value="{{old('image')}}">
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>