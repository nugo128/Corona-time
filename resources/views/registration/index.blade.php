<x-layout>
    <div class="flex justify-between">
        <section class="py-14 min-h-screen flex justify-center sm:w-200 sm:items-center">
            <div class="bg-white rounded-md w-full sm:max-w-md px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <x-logo></x-logo>
                    <x-dropdown></x-dropdown>
                </div>
                <div class="mt-12">
                    <h2 class="font-bold text-lg">{{ __('registration.welcome') }}</h2>
                    <p class="text-gray-600 mt-3">{{ __('registration.info') }}</p>
                    <form action="{{ route('register') }}" method="POST" class="mt-4">
                        @csrf
                        <label for="username" class="font-bold block">{{ __('registration.username') }}</label>
                        <input type="text" name="username"
                            placeholder="{{ __('registration.username_placeholder') }}"
                            class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('username') border-red-500 @enderror ">
                        @error('username')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            </div>
                        @enderror
                        <p class="text-sm text-gray-500 mt-2">{{ __('registration.username_info') }}</p>
                        <label for="email" class="font-bold block mt-4">{{ __('registration.email') }}</label>
                        <input type="email" name="email" placeholder="{{ __('registration.email_placeholder') }}"
                            class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
                            @error('email')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            </div>
                        @enderror
                        <label for="password" class="font-bold block mt-4">{{ __('registration.password') }}</label>
                        <input type="password" name="password"
                            placeholder="{{ __('registration.password_placeholder') }}"
                            class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                            @error('password')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            </div>
                        @enderror
                        <label for="password_confirmation"
                            class="font-bold block mt-4">{{ __('registration.password_rep') }}</label>
                        <input type="password" name="password_confirmation"
                            placeholder="{{ __('registration.password_rep_placeholder') }}"
                            class="w-full px-6 py-4 mt-3 rounded-md border-gray-300 border-solid border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('password_confirmation') border-red-500 @enderror">
                            @error('password_confirmation')
                            <div class="flex gap-3 items-center mt-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z"
                                        fill="#CC1E1E" />
                                </svg>
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            </div>
                        @enderror

                        <button type="submit"
                            class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md">{{ __('registration.signup') }}</button>
                    </form>
                    <p class="mt-6">{{ __('registration.already') }} <a href="{{ route('login') }}"
                            class="font-bold">{{ __('registration.login') }}</a></p>
                </div>
            </div>
        </section>
        <x-vaccine class="hidden sm:block"></x-vaccine>
    </div>
</x-layout>
