<?php

namespace App\Models;

use App\FinanceAdsService;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'product' => 'json',
            'extra_informations' => 'json',
            'price' => 'json',
        ];
    }

    public static function financeAdsService()
    {
        return app(FinanceAdsService::class);
    }

    public function getExtraInformationsShowAttribute() {
        return ($this->extra_informations['local'] ?? ($this->extra_informations['server'] ?? []));
    }
    public function getProductShowAttribute() {
        return ($this->product['local'] ?? ($this->product['server'] ?? ''));
    }
    public function getPriceShowAttribute() {
        return ($this->price['local'] ?? ($this->price['server'] ?? ''));
    }

    protected static function booted()
    {
        $items = self::financeAdsService()->getCreditCardComparison();
        foreach ($items as $item) {
            $creditCard = new CreditCard();
            $creditCard = CreditCard::query()->where('product_id', $item['productid'])->first();

            if (!$creditCard?->id) {
                $creditCard = new CreditCard();
            }

            $creditCard->product_id = $item['productid'];
            $creditCard->bank_id = $item['bankid'];
            $creditCard->bank = $item['bank'];
            $creditCard->link = $item['link'];
            $creditCard->logo = $item['logo'];
            $creditCard->incentive = $item['incentive'];
            $creditCard->incentive_amount = $item['incentive_amount'];
            $creditCard->product = [
                'local' => $creditCard->product['local'] ?? $item['produkt'],
                'server' => $item['produkt'],
            ];
            $creditCard->extra_informations = [
                'local' => $creditCard->extra_informations['local'] ?? $item['anmerkungen'],
                'server' => $item['anmerkungen'],
            ];
            $creditCard->price = [
                'local' => $creditCard->price['local'] ?? $item['gebuehren'],
                'server' => $item['gebuehren'],
            ];
            $creditCard->save();
        }

    }
}
