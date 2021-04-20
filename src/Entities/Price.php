<?php

class Price
{
    private $price;
    private $currency;
    private $country;

    public function __construct(float $price, string $currency, string $country)
    {
        if ($price < 0) {
            throw new Exception('Precio negativo');
        }

        if ($currency == '') {
            throw new Exception('Moneda incorrecta');
        }

        $this->price = $price;
        $this->currency = $currency;
        $this->country = $country;
    }

    public function print(): void
    {
        $tax = $this->calculateTax();

        echo ($this->price + $tax) . ' ' . $this->currency;
    }

    private function calculateTax(): float
    {
        switch ($this->country) {
            case 'spain':
                return $this->price * 0.21;
                break;
            case 'usa':
                return $this->price * 0.15;
                break;
            case 'france':
                return $this->price * 0.25;
                break;
            case 'germany':
                return $this->price * 0.08;
                break;
        }
    }

}