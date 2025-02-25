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


//        $data = Cache::rememberForever('test', function(){
            $xmlContent = file_get_contents('https://tools.financeads.net/webservice.php?wf=1&format=xml&calc=kreditkarterechner&country=ES');
            //$xmlContent = mb_convert_encoding($xmlContent, 'UTF-8', 'auto'); // Ensure UTF-8
            $xmlObject = simplexml_load_string($xmlContent, 'SimpleXMLElement', LIBXML_NOCDATA);
            $xmlArray = json_decode(json_encode($xmlObject), true);
//            $array = json_decode(json_encode($xmlObject));
//            return $array?->product;
////        });


        $products = [];
        foreach ($xmlArray['product'] as $product) {
            if (isset($product['anmerkungen']) && $product['anmerkungen'] != []) {
                $rawContent = (string)$product['anmerkungen'];

                $decodedContent = html_entity_decode($rawContent, ENT_QUOTES, 'UTF-8');

                preg_match_all('/<li>(.*?)<\/li>/', $decodedContent, $matches);

                $product['anmerkungen'] = $matches[1] ?? [$decodedContent];
            } else {
                $product['anmerkungen'] = [];
            }
            $products[] = $product;
        }

        return $products;
    }

}