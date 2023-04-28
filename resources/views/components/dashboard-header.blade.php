@props(['header'])
<div class="flex justify-between">
<x-logo></x-logo>
<div class="flex gap-3 items-center">
    <x-dropdown></x-dropdown>
    <h2>{{auth()->user()->username}}</h2>
    <a href="#">Log Out</a>
</div>
</div>

    <h2 class="font-bold mt-10">{{$header}}</h2>


