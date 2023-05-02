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
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{$message}}</p>
                            </div>
                        @enderror
            </div>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
            {{ __('emails.password_repeat') }}
            </label>
            <div class="mt-1">
              <input id="password_confirmation" type="password" placeholder="{{ __('emails.password_repeat') }}" class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500  @error('password_confirmation') border-red-500 @enderror" name="password_confirmation" required >
              @error('password_confirmation')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{$message}}</p>
                            </div>
                        @enderror
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
