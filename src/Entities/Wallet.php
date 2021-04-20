<?php

class Wallet
{
    private $ts;
    private $c;

    private $tax;

    public function __construct($country)
    {
        $this->ts = [];
        $this->c = $country;

        $this->tax = new TaxCalculator($country);
    }

    public function new(Price $price)
    {
        $this->ts[] = $price;
    }

    public function getTotal()
    {
        $i = 0;
        foreach ($this->ts as $t) {
            $i += $t->price();
        }

        return $i;
    }

    public function getTotalPermanency()
    {
        $total = $this->getTotal();

        return $this->tax->execute($total);
    }

}