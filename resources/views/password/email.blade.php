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
            @error('email')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{__('validation.invalid-email')}}</p>
                            </div>
                        @enderror
            <button type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">{{ __('emails.send') }}</button>
          </form>
        </div>
      </div>

  </div>
</x-layout>
