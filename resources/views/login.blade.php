<x-layout title="login">
<section class="bg-yellow-100">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 bg-yellow-600 border-yellow-900">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-yellow-900 md:text-2xl ">
                  Sign in to your account
              </h1>
              <form method="POST" action="/loginUser" class="space-y-4 md:space-y-6"> 
                @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-white ">Email</label>
                      <input type="email" name="email" id="email" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-yelllow-900 focus:border-yellow-900 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-yellow-900 focus:border-yellow-900 block w-full p-2.5 " required="">
                  </div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li class="text-red-500">{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  <button type="submit" class="w-full text-white bg-yellow-500 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Sign in</button>
                  <p class="text-sm font-light text-white ">
                      Don’t have an account yet? <a href="/register" class="font-medium text-yellow-900 hover:underline">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</x-layout>