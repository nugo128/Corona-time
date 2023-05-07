<x-layout>
    <div class="flex flex-col px-5 md:px-14 py-5">
        <x-dashboard-header header='{{__("statistics.worldwide-stats")}}'></x-dashboard-header>
        <div class="flex mt-8 gap-10">
            <a href="#" class="h-5">
                <p class="pb-1 font-bold">{{__("statistics.worldwide")}}</p>
                <div class="bg-black w-full pt-1"></div>
            </a>
            <a href="{{route('dashboard-by-c')}}">
                <p>{{__("statistics.by-country")}}</p><span></span>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-20">
            <div class="col-span-2 md:col-span-1 flex flex-col gap-5 justify-center items-center bg-blue-50 py-10 w-full">

                <svg width="90" height="64" viewBox="0 0 90 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <svg width="92" height="50" viewBox="0 0 92 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 48.5C41.2762 46 16.4144 36.5 48.7348 36.5C60.6685 36.5 55.1989 22.5 68.6243 22.5C82.0497 22.5 81.5525 9.5 91 1"
                            stroke="#2029F3" stroke-width="2" />
                    </svg>
                    <path
                        d="M47.7348 35.5C15.4144 35.5 40.2762 45 0 47.5V64H90V0C80.5525 8.5 81.0497 21.5 67.6243 21.5C54.1989 21.5 59.6685 35.5 47.7348 35.5Z"
                        fill="url(#paint0_linear_47_24)" />
                    <defs>

                        <linearGradient id="paint0_linear_47_24" x1="45.2486" y1="-23.5" x2="44.9972"
                            y2="64" gradientUnits="userSpaceOnUse">

                            <stop stop-color="#2029F3" stop-opacity="0.24" />
                            <stop offset="1" stop-color="#2029F3" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
                <p class="font-bold">{{__("statistics.new")}}</p>
                <p class="text-4xl text-blue-800">{{ $newCases }}</p>
            </div>
            <div class="col-span-1 flex flex-col gap-5 justify-center items-center bg-green-50 py-10 w-full">

                <svg width="90" height="41" viewBox="0 0 90 41" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <svg width="92" height="26" viewBox="0 0 92 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 24.5C41.2762 22 13.6796 18 46 18C57.9337 18 56.0746 11 69.5 11C82.9254 11 81.5525 9.5 91 1"
                            stroke="#0FBA68" stroke-width="2" />
                    </svg>
                    <path
                        d="M43 18.5C10.6796 18.5 40.2762 22 0 24.5V41H90V0C80.5525 8.5 81.0497 10.5 67.6243 10.5C54.1989 10.5 54.9337 18.5 43 18.5Z"
                        fill="url(#paint0_linear_47_30)" />
                    <defs>
                        <linearGradient id="paint0_linear_47_30" x1="45.2486" y1="-46.5" x2="44.9972"
                            y2="41" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0FBA68" stop-opacity="0.24" />
                            <stop offset="1" stop-color="#0FBA68" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
                <p class="font-bold">{{__("statistics.recovered")}}</p>
                <p class="text-4xl text-green-500">{{ $recovered }}</p>
            </div>
            <div class="col-span-1 flex flex-col gap-5 justify-center items-center bg-yellow-50 py-10 w-full">
                <svg width="90" height="51" viewBox="0 0 90 51" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <svg width="92" height="37" viewBox="0 0 92 37" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 35.5C41.2762 33 16.4144 23.5 48.7348 23.5C60.6685 23.5 55.1989 9.5 68.6243 9.5C82.0497 9.5 81.5525 10 91 1.5"
                            stroke="#EAD621" stroke-width="2" />
                    </svg>

                    <path
                        d="M47.7348 22.5C15.4144 22.5 40.2762 32 0 34.5V51H90V0.5C80.5525 9 81.0497 8.5 67.6243 8.5C54.1989 8.5 59.6685 22.5 47.7348 22.5Z"
                        fill="url(#paint0_linear_47_27)" />
                    <defs>
                        <linearGradient id="paint0_linear_47_27" x1="45.2486" y1="-36.5" x2="44.9972"
                            y2="51" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#EAD621" stop-opacity="0.24" />
                            <stop offset="1" stop-color="#EAD621" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
                <p class="font-bold">{{__("statistics.deaths")}}</p>
                <p class="text-4xl text-yellow-500">{{ $deaths }}</p>
            </div>
        </div>
    </div>
</x-layout>
