<x-layout>
  <div class="flex justify-between">
    <section class="py-14 min-h-screen flex justify-center sm:w-200 sm:items-center">
      <div class="bg-white rounded-md w-full sm:max-w-md px-4 sm:px-6 lg:px-8">
        <x-logo></x-logo>
        <div class="mt-12">
          <h2 class="font-bold text-lg">Welcome to Coronatime</h2>
          <p class="text-gray-600 mt-3">Please enter required info to sign up</p>
          <form action="{{route('register')}}" method="POST" class="mt-4">
            @csrf
            <label for="username" class="font-bold block">Username</label>
            <input type="text" name="username" placeholder="Enter unique username" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <p class="text-sm text-gray-500 mt-2">Username should be unique, minimum 3 characters</p>
            <label for="email" class="font-bold block mt-4">Email</label>
            <input type="email" name="email" placeholder="Enter your email" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <label for="password" class="font-bold block mt-4">Password</label>
            <input type="password" name="password" placeholder="Fill in password" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <label for="password_confirmation" class="font-bold block mt-4">Repeat Password</label>
            <input type="password" name="password_confirmation" placeholder="Repeat Password" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">

            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">SIGN UP</button>
          </form>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <p class="mt-6">Already have an account? <a href="#" class="font-bold">Log in</a></p>
        </div>
      </div>
    </section>
    <x-vaccine class="hidden sm:block"></x-vaccine>
  </div>
</x-layout>
