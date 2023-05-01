
<x-layout>
<div class="w-full flex items-center justify-center py-10"><x-dropdown></x-dropdown> </div>
<div class="w-full flex flex-col items-center gap-96">
<x-logo></x-logo>
<div class="flex flex-col items-center gap-32">
    <div class="flex flex-col items-center">
        <img src="{{asset('images/icons8-checkmark.gif')}}" alt="check">
    <p>{{__('passwords.reset')}}</p>
    </div>
    <a  href="{{route('login')}}" type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md text-center"><p class="pt-4">{{__('registration.login')}}</p></a>

</div>

</div>
</x-layout>