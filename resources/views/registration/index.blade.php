<x-layout>
  <div class="flex justify-between">
    <section class="py-14 min-h-screen flex justify-center sm:w-200 sm:items-center">
      <div class="bg-white rounded-md w-full sm:max-w-md px-4 sm:px-6 lg:px-8">
        <x-dropdown></x-dropdown>
        <x-logo></x-logo>
        <div class="mt-12">
          <h2 class="font-bold text-lg">{{__('registration.welcome')}}</h2>
          <p class="text-gray-600 mt-3">{{__('registration.info')}}</p>
          <form action="{{route('register')}}" method="POST" class="mt-4">
            @csrf
            <label for="username" class="font-bold block">{{__('registration.username')}}</label>
            <input type="text" name="username" placeholder="{{__('registration.username_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <p class="text-sm text-gray-500 mt-2">{{__('registration.username_info')}}</p>
            <label for="email" class="font-bold block mt-4">{{__('registration.email')}}</label>
            <input type="email" name="email" placeholder="{{__('registration.email_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <label for="password" class="font-bold block mt-4">{{__('registration.password')}}</label>
            <input type="password" name="password" placeholder="{{__('registration.password_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            <label for="password_confirmation" class="font-bold block mt-4">{{__('registration.password_rep')}}</label>
            <input type="password" name="password_confirmation" placeholder="{{__('registration.password_rep_placeholder')}}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">

            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">{{__('registration.signup')}}</button>
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
          <p class="mt-6">{{__('registration.already')}} <a href="{{route('login')}}" class="font-bold">{{__('registration.login')}}</a></p>
        </div>
      </div>
    </section>
    <x-vaccine class="hidden sm:block"></x-vaccine>
  </div>
</x-layout>
