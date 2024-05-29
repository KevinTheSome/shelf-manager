<x-layout title="Admin">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <h1 class="text-yellow-900 text-3xl font-bold text-center mt-8 mb-8">Admin</h1>

        <form action="/admin/users/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-yellow-900 text-sm font-bold mb-2">Name</label>
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" required>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-yellow-900 text-sm font-bold mb-2">Role</label>
                    <select name="role" class="form-control" >
                            <option value="Admin">Admin</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Stocker">Stocker</option>
                        </select> 
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-yellow-900 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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

                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Update</button>
                </div>
            </form>

    </section>

</x-layout>