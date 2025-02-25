<?php

namespace App;


use Illuminate\Support\Facades\Cache;
use function file_get_contents;

class FinanceAdsService
{

    public function getCreditCardComparison(): ?array
    {
        $data = Cache::rememberForever('test', function(){
            $xmlContent = file_get_contents('https://tools.financeads.net/webservice.php?wf=1&format=xml&calc=kreditkarterechner&country=ES');
            $xmlObject = simplexml_load_string($xmlContent);
            $array = json_decode(json_encode($xmlObject));
            return $array?->product;
        });

        return $data;
    }

}