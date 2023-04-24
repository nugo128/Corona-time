<x-layout>
  <div class=" min-h-screen flex flex-col items-center py-12 sm:px-6 lg:px-8">
      <x-logo></x-logo>
    <div class="py-12 sm:mx-auto sm:w-full sm:max-w-md">
      <div class=" py-8 px-4  sm:rounded-lg sm:px-10">
        <h2 class="text-center pb-5 font-bold text-lg mb-6">{{ __('Reset Password') }}</h2>
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
              {{ __('Password') }}
            </label>
            <div class="mt-1">
              <input id="password" type="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
              @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
              {{ __('Confirm Password') }}
            </label>
            <div class="mt-1">
              <input id="password_confirmation" type="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div>
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              {{ __('Save Changes') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
