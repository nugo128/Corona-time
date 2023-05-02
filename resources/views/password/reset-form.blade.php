<x-layout>
  <div class=" min-h-screen flex flex-col items-center py-12 sm:px-6 lg:px-8">
  <div class="flex justify-between gap-20">
        <x-logo></x-logo>
        <x-dropdown></x-dropdown>
      </div> 
    <div class="py-12 sm:mx-auto sm:w-full sm:max-w-md">
      <div class=" py-8 px-4  sm:rounded-lg sm:px-10">
        <h2 class="text-center pb-5 font-bold text-lg mb-6">{{ __('emails.reset') }}</h2>
        @if (session('status'))
          <div class="bg-green-100 rounded-md p-4 mb-6">
            {{ session('status') }}
          </div>
        @endif
        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
               {{ __('emails.password') }} 
            </label>
            <div class="mt-1">
              <input id="password" type="password" placeholder="{{ __('emails.password_placeholder') }}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500  @error('password') border-red-500 @enderror" name="password" required >
              @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
            {{ __('emails.password_repeat') }}
            </label>
            <div class="mt-1">
              <input id="password_confirmation" type="password" placeholder="{{ __('emails.password_repeat') }}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500  @error('password_confirmation') border-red-500 @enderror" name="password_confirmation" required >
            </div>
          </div>

          <div>
            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">
            {{ __('emails.save') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
