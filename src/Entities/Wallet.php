<?php

class Wallet
{
    private $transactions;
    private $country;

    private $taxCalculator;

    public function __construct($country)
    {
        $this->transactions = [];
        $this->country = $country;

        $this->taxCalculator = new TaxCalculator($country);
    }

    public function addTransaction(Price $price)
    {
        $this->transactions[] = $price;
    }

    public function getTotalBalance()
    {
        $total = 0;
        foreach ($this->transactions as $transaction) {
            $total += $transaction->price();
        }

        return $total;
    }

    public function getCountryTaxForPermanency()
    {
        $total = $this->getTotalBalance();
        
        return $this->taxCalculator->execute($total);
    }

}