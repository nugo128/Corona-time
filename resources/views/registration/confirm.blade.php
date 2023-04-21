
<x-layout>
<div class="w-full flex flex-col items-center gap-96">
<x-logo></x-logo>
@if (Illuminate\Support\Facades\Session::get('confirmed') == 0)

<div class="flex flex-col items-center">
    <img src="{{asset('images/icons8-checkmark.gif')}}" alt="check">
<p>We have sent you a confirmation email</p>
</div>

@else
<div class="flex flex-col items-center gap-32">
    <div class="flex flex-col items-center">
        <img src="{{asset('images/icons8-checkmark.gif')}}" alt="check">
    <p>Your account is confirmed, you can sign in</p>
    </div>
    <a  href="#" type="submit" class="w-full h-14 bg-green-500 hover:bg-green-600 text-white font-bold mt-6 rounded-md text-center"><p class="pt-4">Log In</p></a>

</div>
@endif
</div>
</x-layout>