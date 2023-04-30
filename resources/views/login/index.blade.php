<x-layout>
<div class="flex justify-between">
    <section class="py-14 min-h-screen flex justify-center sm:w-200">
      <div class="bg-white rounded-md w-full sm:max-w-md px-4 sm:px-6 lg:px-8">
      <x-dropdown></x-dropdown>  
      <x-logo></x-logo>
        <div class="mt-12">
          <h2 class="font-bold text-lg">{{__('login.welcome')}}</h2>
          <p class="text-gray-600 mt-3">{{__('login.info')}}</p>
          <form action="{{route('login-post')}}" method="POST" class="mt-4">
            @csrf
            <div class="mt-4">
              <label for="user" class="block text-gray-700 font-bold mb-2">{{__('login.username')}}</label>
              <input type="text" name="user" placeholder="{{__('login.username_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('login') border-red-500 @enderror">
              @error('user')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div class="mt-4">
              <label for="password" class="block text-gray-700 font-bold mb-2">{{__('login.password')}}</label>
              <input type="password" name="password" placeholder="{{__('login.password_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('login') border-red-500 @enderror">
              @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
              @enderror
              @if($errors->has('login'))
    <p class="text-red-500">{{ $errors->first('login') }}</p>
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
