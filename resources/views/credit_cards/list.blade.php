<x-guest-layout>
    <div class="grid grid-cols-4 gap-4">
        <div class="p-6 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg">

        </div>
        <div class="col-span-3">
            @foreach($creditCards as $creditCard)
                <a class="grid grid-full p-6 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg"
                   href="{{$creditCard->link}}" target="_blank">
                    <div class="float-start">
                        <p><b>{{$creditCard->bank}} >>> <span class="text-blue-700">{{$creditCard->produkt}}</span></b>
                        </p>
                        <p><img src="{{$creditCard->logo}}" title="Logo"/></p>
                        {!!  $creditCard->anmerkungen !!}
                    </div>
                    <div class="float-end">
                        <div class="text-blue-700 text-xl">{{$creditCard->gebuehren}} €</div>
                        <div>(cuota primer ano: <span class="text-blue-700">{{$creditCard->incentive}} €</span>)</div>
                        <div>TAE <span class="text-blue-700">{{$creditCard->incentive_amount}} %</span></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-guest-layout>
