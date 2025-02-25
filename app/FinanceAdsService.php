<?php

namespace App;


use Illuminate\Support\Facades\Cache;
use function file_get_contents;
use function json_decode;
use function json_encode;
use function simplexml_load_string;
use const LIBXML_NOCDATA;

class FinanceAdsService
{

    public function getCreditCardComparison(): ?array
    {


        $data = Cache::rememberForever('test', function(){
            $xmlContent = file_get_contents('https://tools.financeads.net/webservice.php?wf=1&format=xml&calc=kreditkarterechner&country=ES');
            //$xmlContent = mb_convert_encoding($xmlContent, 'UTF-8', 'auto'); // Ensure UTF-8
            $xmlObject = simplexml_load_string($xmlContent, 'SimpleXMLElement', LIBXML_NOCDATA);
            $array = json_decode(json_encode($xmlObject));
            return $array?->product;
        });

        return $data;
    }

}