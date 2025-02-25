<?php

namespace App\Http\Controllers;

use App\FinanceAdsService;
use Illuminate\Http\Request;
use function view;

class CreditCardController extends Controller
{
    public function __construct(
        private readonly FinanceAdsService $financeAdsService,
    )
    {
    }

    public function list()
    {

        $creditCards = $this->financeAdsService->getCreditCardComparison();


        return view('credit_cards.list', compact('creditCards'));
    }
}
