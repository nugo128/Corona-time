
<x-layout>
    <div class="w-full flex items-center justify-center py-10"><x-dropdown></x-dropdown> </div>
<div class="w-full flex flex-col items-center gap-96">
<x-logo></x-logo>

<div class="flex flex-col items-center">
    <img src="{{asset('images/icons8-checkmark.gif')}}" alt="check">
<p>{{__('registration.confirm-sent')}}</p>
</div>

</div>
</x-layout>