<?php

namespace App;


use Illuminate\Support\Collection;

class FinanceAdsService
{

    public function getCreditCardComparison(): ?array
    {
        $xmlContent= file_get_contents('https://tools.financeads.net/webservice.php?wf=1&format=xml&calc=kreditkarterechner&country=ES');

        $xmlObject = simplexml_load_string($xmlContent);

        $array = json_decode(json_encode($xmlObject));

        return $array?->product;
    }

}