<x-guest-layout>
    <form method="post" action="/credit_cards/edit">
        <div class="grid grid-cols-4 gap-4">
            <div class="p-6 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg">
                {{csrf_field()}}
                <input type="submit"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            </div>
            <div class="col-span-3">
                @foreach($creditCards as $creditCardKey => $creditCard)
                    <div class="grid grid-full p-6 mt-6 text-gray-900 dark:text-gray-100 bg-white border border-gray-700 border-1 rounded-lg">
                        <div class="float-start">
                            <p><b>{{$creditCard->bank}} >>> <span class="text-blue-700">
                                    <input type="text" name="product[{{$creditCardKey}}]"
                                           value="{{$creditCard->product_show}}"/></span></b>
                            </p>
                            <p><img src="{{$creditCard->logo}}" title="Logo"/></p>
                            <ul class="list-disc">
                                @foreach($creditCard->extra_informations_show as $key => $extraInformation)
                                    <li>
                                        <input type="text" name="extra_informations[{{$creditCardKey}}][{{$key}}]"
                                               value="{{$extraInformation}}"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="float-end">
                            <div class="text-blue-700 text-xl">
                                <input type="text" name="price[{{$creditCardKey}}]"
                                       value="{{$creditCard->price_show}}"/>€
                            </div>
                            <div>(cuota primer ano: <span class="text-blue-700">{{$creditCard->incentive}} €</span>)
                            </div>
                            <div>TAE <span class="text-blue-700">{{$creditCard->incentive_amount}} %</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>

</x-guest-layout>
