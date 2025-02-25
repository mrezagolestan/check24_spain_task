<x-guest-layout>
    <div class="grid grid-cols-4 gap-4">
        <div class="p-10 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg">
            <b>Order By</b>
            <ul class="list-disc">
                <li>
                    <a href="/credit_cards?order=price">Price</a>
                </li>
                <li>
                    <a href="/credit_cards?order=product">Product</a>
                </li>
            </ul>

        </div>
        <div class="col-span-3">
            @foreach($creditCards as $creditCard)
                <a class="grid grid-full p-6 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg"
                   href="{{$creditCard->link}}" target="_blank">
                    <div class="float-start">
                        <p><b>{{$creditCard->bank}} >>> <span class="text-blue-700">{{$creditCard->product_show}}</span></b>
                        </p>
                        <p><img src="{{$creditCard->logo}}" title="Logo"/></p>
                        <ul class="list-disc">
                            @foreach($creditCard->extra_informations_show as $extraInformation)
                                <li>{!! $extraInformation !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="float-end">
                        <div class="text-blue-700 text-xl">{{$creditCard->price_show}} €</div>
                        <div>(cuota primer ano: <span class="text-blue-700">{{$creditCard->incentive}} €</span>)</div>
                        <div>TAE <span class="text-blue-700">{{$creditCard->incentive_amount}} %</span></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-guest-layout>
