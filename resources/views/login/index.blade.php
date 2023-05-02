<x-layout>
<div class="flex justify-between">
    <section class="py-14 min-h-screen flex justify-center sm:w-200">
      <div class="bg-white rounded-md w-full sm:max-w-md px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between">
        <x-logo></x-logo>
        <x-dropdown></x-dropdown>
      </div> 
        <div class="mt-12">
          <h2 class="font-bold text-lg">{{__('login.welcome')}}</h2>
          <p class="text-gray-600 mt-3">{{__('login.info')}}</p>
          <form action="{{route('login-post')}}" method="POST" class="mt-4">
            @csrf
            <div class="mt-4">
              <label for="user" class="block text-gray-700 font-bold mb-2">{{__('login.username')}}</label>
              <input type="text" name="user" placeholder="{{__('login.username_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('user') border-red-500 @enderror @error('login') border-red-500 @enderror">
              @error('user')
              <div class="flex gap-3 items-center mt-2">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z" fill="#CC1E1E"/> </svg>
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="mt-4">
              <label for="password" class="block text-gray-700 font-bold mb-2">{{__('login.password')}}</label>
              <input type="password" name="password" placeholder="{{__('login.password_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('login') border-red-500 @enderror @error('password') border-red-500 @enderror"">
              @error('password')
              <div class="flex gap-3 items-center mt-2">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z" fill="#CC1E1E"/> </svg>
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
              </div>
              @enderror
              
              @if($errors->has('login'))
              <div class="flex gap-3 items-center mt-2">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z" fill="#CC1E1E"/> </svg>
    <p class="text-red-500 my-2">{{__('validation.invalid')}}</p>
              </div>
@endif
            </div>
            <div class="mt-4 flex items-center justify-between">
              <div class="flex">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
              <label for="remember" class="block text-gray-700 font-bold">{{__('login.remember')}}</label>
            </div>
              <a href="{{route('password.request')}}" class="font-bold">{{__('login.forgot')}}</a>
            </div>
            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">{{__('login.login')}}</button>
          </form>
          <div class="mt-6">
          </div>
          <div class="mt-6 flex gap-1">
            <p>{{__('login.donthave')}}</p>
            <a href="{{ route('register') }}" class="font-bold"> {{__('login.signup')}}</a>
          </div>
        </div>
      </div>
    </section>
    <x-vaccine class="hidden sm:block"></x-vaccine>
  </div>
</x-layout>
