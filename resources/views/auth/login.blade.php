<x-layout>
  <div class="hero min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse gap-12">
      <div class="w-full md:w-[50%] text-center lg:text-left">
        <div>
          <h1 class="text-5xl font-bold">Login now!</h1>
          <p class="py-6">Secure your account and access exclusive features. Explore a world of possibilities while
            protecting your personal information. Join us today!</p>
        </div>
      </div>
      <div class="w-full md:w-[50%] card flex-shrink-0 max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="/post-login" method="post">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" placeholder="email" class="input input-bordered text-sm"
              value="{{old('email')}}" />

            @error('email')
            <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="password" class="input input-bordered text-sm"
              value="{{old('password')}}" />

            @error('password')
            <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
            <label class="label">
              <a href="/forgot-password" class="label-text-alt link link-hover">Forgot password?</a>
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>