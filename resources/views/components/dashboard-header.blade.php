@props(['header'])
<div class="flex justify-between">
<x-logo></x-logo>
<div class="flex gap-3 items-center">
    <x-dropdown></x-dropdown>
    <h2 class="hidden md:block">{{auth()->user()->username}}</h2>
    <form class="hidden md:block" action="{{route('logout')}}" method="post">

@csrf
<button type="submit">LOG OUT</button>
</form>
    <div x-data="{ show: false }" @click.away="show = false">
    <div @click="show = ! show">
        <div class="block md:hidden">
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 0H18V2H0V0ZM6 7H18V9H6V7ZM0 14H18V16H0V14Z" fill="#09121F"/>
</svg>

        </div>
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl z-50 overflow-auto max-h-52 px-2 right-3" style="display: none">
        <span class="font-bold py-2 pr-6">{{auth()->user()->username}}</span>
        <form action="{{route('logout')}}" method="post">

@csrf
<button type="submit"><p>{{__('auth.logout')}}</p></button>
</form>
    </div>
</div>
</div>
</div>

    <h2 class="font-bold mt-10 text-xl">{{$header}}</h2>


