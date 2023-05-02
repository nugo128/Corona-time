<x-layout>
    <div class="flex flex-col px-3 md:px-14 py-5">
        <x-dashboard-header header='Statistics by country'></x-dashboard-header>
        <div class="flex mt-8 gap-10">
            <a href="{{ route('dashboard') }}" class="h-5">
                <p class="pb-1">Worldwide</p>

            </a>
            <a href="">
                <p>By Country</p><span></span>
                <div class="bg-black w-full pt-1 mt-1"></div>
            </a>
        </div>

        <form method="GET" class="py-10">
        <div class="relative w-1/4 border rounded-lg border-gray-200">
  <input type="text" name="search" value="{{ $search }}" placeholder="Search by country" class="pl-12 pr-4 py-2 rounded-lg  focus:outline-none focus:ring  focus:border-blue-300">
  <div class="absolute inset-y-0 left-0 flex items-center px-3 mr-2 ">
    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M19.3334 19.3334L14 14.0001M8.66669 16.6667C4.24841 16.6667 0.666687 13.085 0.666687 8.66675C0.666687 4.24847 4.24841 0.666748 8.66669 0.666748C13.085 0.666748 16.6667 4.24847 16.6667 8.66675C16.6667 13.085 13.085 16.6667 8.66669 16.6667Z" stroke="#A0AEC0"/>
    </svg>
  </div>
</div>

</form>

        <div class="pb-10 h-screenx overflow-x-auto table-container border rounded-lg border-gray-100">
            <table class="table w-full">
                <thead class="bg-gray-200">
                    <tr>
                    <td class="py-4 text-xs xl:text-sm whitespace-nowrap font-semibold">
                            <a href="?sort={{ $sort == 'location_asc' ? 'location_desc' : 'location_asc' }}&search={{ $search }}" class="flex items-center gap-2">
                                <p class="px-1 md:px-4">location</p>
                                    <div class="flex flex-col gap-1">
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="{{$sort == 'location_desc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="{{$sort == 'location_asc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                    </div>
                                    <input type="hidden" name="statistics" value="deaths">
                            </a>
                        </td>
                        <td class="py-4 text-xs xl:text-sm whitespace-nowrap font-semibold">
                            <a href="?sort={{ $sort == 'new_cases_asc' ? 'new_cases_desc' : 'new_cases_asc' }}&search={{ $search }}" class="flex items-center gap-2">
                              
                                <p class="px-1 md:px-4">new</p>
                                    <div class="flex flex-col gap-1">
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="{{$sort == 'new_cases_desc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="{{$sort == 'new_cases_asc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                    </div>
                                    <input type="hidden" name="statistics" value="deaths">
                            </a>
                        </td>
                        <td class="py-4 text-xs xl:text-sm whitespace-nowrap font-semibold">
                            <a href="?sort={{ $sort == 'deaths_asc' ? 'deaths_desc' : 'deaths_asc' }}&search={{ $search }}" class="flex items-center gap-2">
                            <p class="px-1 md:px-4">death</p>
                                    <div class="flex flex-col gap-1">
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="{{$sort == 'deaths_desc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="{{$sort == 'deaths_asc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                    </div>
                                    <input type="hidden" name="statistics" value="deaths">
                            </a>
                        </td>
                        <td class="py-4 text-xs xl:text-sm whitespace-nowrap font-semibold">
                            <a href="?sort={{ $sort == 'recovered_asc' ? 'recovered_desc' : 'recovered_asc' }}&search={{ $search }}" class="flex items-center gap-2">
                            <p class="px-1 md:px-4">recovered</p>
                                    <div class="flex flex-col gap-1">
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="{{$sort == 'recovered_desc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                        <div>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="{{$sort == 'recovered_asc' ? '#010414' : '#BFC0C4'}}" />
                                            </svg>

                                        </div>
                                    </div>
                                    <input type="hidden" name="statistics" value="deaths">
                            </a>
                        </td>
                        
                    </tr>
                </thead>
                <tbody
                    class="bg-white divide-y divide-gray-200 max-h-64 overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
                    <tr>
                    <td class="py-4 px-1 md:p-4 w-1/4">Worldwide</td>
                    <td class="py-4 px-1 md:p-4 w-1/4">{{$newCases}}</td>
                    <td class="py-4 px-1 md:p-4 w-1/4">{{$deaths}}</td>
                    <td class="py-4 px-1 md:p-4 w-1/4">{{$recovered}}</td>
                    </tr>
                    @foreach ($statistics as $item)
                        <tr>
                            <td class="py-4 px-1 md:p-4 w-1/4">{{ $item->location }}</td>
                            <td class="py-4 px-1 md:p-4 w-1/4"> {{ $item->new_cases }}</td>
                            <td class="py-4 px-1 md:p-4 w-1/4">{{ $item->deaths }}</td>
                            <td class="py-4 px-1 md:p-4 w-1/4">{{ $item->recovered }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layout>
