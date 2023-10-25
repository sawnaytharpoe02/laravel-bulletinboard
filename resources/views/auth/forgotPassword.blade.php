<x-layout>
  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Reset Password !</h1>
        <p class="py-6"> Forgot your password? No problem. Just let us know your email address and we will email you a
          password
          reset link that will allow you to choose a new one.</p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="{{route('forgot.password.post')}}" method="post">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered" />

            @error('email')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">EMAIL PASSWORD RESET LINK</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>