<x-layout>
  <div class="flex gap-40 items-center h-screen flex-col pt-10">
  <div class="flex justify-between gap-20">
        <x-logo></x-logo>
        <x-dropdown></x-dropdown>
      </div> 

      
      
      <div class="bg-white rounded-md w-full max-w-md px-4 sm:px-6 lg:px-8">
        <div class="mt-12">
          <h2 class="font-bold text-lg text-center">{{ __('emails.reset') }}</h2>
          <form method="POST" action="{{ route('password.email') }}" class="mt-4">
            @csrf
            <label for="email" class="font-bold block">{{ __('emails.email') }}</label>
            <input type="email" name="email" placeholder="{{ __('emails.email-placeholder') }}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">{{ __('emails.send') }}</button>
          </form>
        </div>
      </div>

  </div>
</x-layout>
