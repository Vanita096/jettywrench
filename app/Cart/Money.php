<?php

namespace App\Cart;

use Money\Money as BaseMoney;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;
use Money\Currencies\ISOCurrencies;

class Money
{
    protected $money;

    public function __construct($value)
    {
        $this->money = new BaseMoney($value, new Currency('USD'));
    }

    public function formatted()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_US', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->money);
    }

    public function amount()
    {
        return $this->money->getAmount();
    }
}