<x-layout>
<div class="flex flex-col px-14 py-5">
    <x-dashboard-header header='Statistics by country'></x-dashboard-header>
    <div class="flex mt-8 gap-10">
            <a href="{{route('dashboard')}}" class="h-5">
                <p class="pb-1">Worldwide</p>
                
            </a>
            <a href="">
                <p>By Country</p><span></span>
                <div class="bg-black w-full pt-1"></div>
            </a>
        </div>

        <div class="pb-10 h-screenx overflow-x-auto table-container">
  <table class="table w-full">
    <thead>
      <tr >
        <td class="py-6">Location</td>
        <td class="py-6">New Cases</td>
        <td class="py-6">Deaths</td>
        <td class="py-6">Recovered</td>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 max-h-64 overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
@foreach ($statistics as $item)
    <tr>
        <td  class="py-4">{{$item->location}}</td>
        <td  class="py-4"> {{$item->new_cases}}</td>
        <td  class="py-4">{{$item->deaths}}</td>
        <td  class="py-4">{{$item->recovered}}</td>

    </tr>
@endforeach
    </tbody>
  </table>
</div>

</div>
</x-layout>