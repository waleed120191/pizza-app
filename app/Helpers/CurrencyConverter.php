<?php


namespace App\Helpers;


/**
 * Class CurrencyConverter
 * @package App\Helpers
 */
class CurrencyConverter
{
    /**
     * @var
     */
    private $rateValue;


    /**
     * @var array
     */
    private $rates = [
        'EUR' => 1,
        'USD' => 1.08,
    ];

    public function setConvert($amount, $currency_from)
    {
        $this->rateValue = $amount / $this->rates[$currency_from];
    }

    public function getConvert($currency_to)
    {
        return round($this->rates[$currency_to] * $this->rateValue, 2);
    }

    public function getRates()
    {
        return $this->rates;
    }
}
