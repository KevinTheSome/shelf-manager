<x-layout title="register">
<section class="bg-yellow-100">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 bg-yellow-600 border-yellow-900">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-yellow-900 md:text-2xl text-white">
                  Create an account
              </h1>
              <form method="POST" action="/registerUser" class="space-y-4 md:space-y-6">
                @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 " placeholder="name@company.com" required="">
                  </div>
                  <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400" placeholder="rudis" required="">
                </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400" required="">
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-yellow-100 border border-yellow-600 text-yellow-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400" required="">
                  </div>
                  <div class="form-group row">
                      <label for="role" class="col-md-4 col-form-label text-md-right dark:text-white">Roles</label>
                      <div class="col-md-6">
                        <select name="roles" class="form-control" >
                            <option value="Admin">Admin</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Stocker">Stocker</option>
                        </select> 
                    </div>
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
                  <button type="submit" class="w-full text-white bg-yellow-500 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Create an account</button>
                  <p class="text-sm font-light text-white">
                      Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline text-yellow-900">Login</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</x-layout>
