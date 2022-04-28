<x-guest-layout>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BipBlapBloup') }}
        </h2>
        </x-slot>

<div style="display:flex;justify-content:center;flex-direction:column;align-items:center;text-align:left;" >
<img src="{{ Auth::user()->img}}" style="border-radius:190px; width:auto; height:150px;" ></img>
<h1>{{$user->name}}</h1>
<h1>{{$user->biography}}</h1>
</div>

 <img src="{{ $user->img_url }}">

 <form role="form" action="{{ url('/users', $user->id) }}" method='POST'>
 {!! csrf_field() !!}
 <input type="hidden" name="_method" value="PUT">
 <div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-bottom:50px;">
        <x-label for="biography" :value="__('Edit your biography')" />
        <x-input id="biography" rows="5" cols="33" class="block mt-1 w-full" type="text" name="biography" :value="old('biography')"/>
        <x-button >
                    {{ __('Edit') }}
        </x-button>
</div>
</form> 
</x-app-layout>
</x-guest-layout>