<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    public function list(Request $request)
    {
        $order = $request->get('order', 'product');

        $creditCards = CreditCard::query()
            ->orderBy($order . '->local')
            ->get();

        return view('credit_cards.list', compact('creditCards'));
    }
    public function edit(Request $request)
    {
        $creditCards = CreditCard::query()->get();

        if ($request->isMethod('POST')) {
            foreach ($creditCards as $creditCardKey => $creditCard) {
                $product = $creditCard->product;
                $product['local'] = $request->product[$creditCardKey];
                $creditCard->product = $product;

                $price = $creditCard->price;
                $price['local'] = $request->price[$creditCardKey];
                $creditCard->price = $price;

                $extraInformations = $creditCard->extra_informations;
                $extraInformations['local'] = $request->extra_informations[$creditCardKey];
                $creditCard->extra_informations = $extraInformations;

                $creditCard->save();
            }
        }

        return view('credit_cards.edit', compact('creditCards'));
    }
}
