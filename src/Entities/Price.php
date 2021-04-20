<?php

class Price
{
    private $price;
    private $currency;
    private $country;

    private $taxCalculator;

    public function __construct(float $price, string $currency, string $country)
    {
        $this->assertCorrectCurrency($currency);

        $this->price = $price;
        $this->currency = $currency;
        $this->country = $country;

        $this->taxCalculator = new TaxCalculator($country);
    }

    public function print(): void
    {
        $tax = $this->calculateTax();

        echo ($this->price + $tax) . ' ' . $this->currency;
    }

    public function price(): float
    {
        return $this->price + $this->calculateTax();
    }

    private function calculateTax(): float
    {
        return $this->taxCalculator->execute($this->price);
    }

    private function assertCorrectCurrency(string $currency)
    : void
    {
        if ($currency == '') {
            throw new Exception('Moneda incorrecta');
        }
    }

}