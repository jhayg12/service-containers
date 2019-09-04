<?php

namespace App\Billing;

class CreditCardPaymentGateway implements PaymentGatewayContract
{

    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }   

    public function charge($amount)
    {

        $fee = $amount * 0.03;

        return [
            'amount' => ($amount - $this->discount) - $fee,
            'confirmation_number' => \Str::random(10),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fee' => $fee,
        ];
    }
}
