<?php

class Wallet
{
    private $transactions;
    private $country;

    public function __construct($country)
    {
        $this->transactions = [];
        $this->country = $country;
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
        switch ($this->country) {
            case 'spain':
                return $total * 0.21;
                break;
            case 'usa':
                return $total * 0.15;
                break;
            case 'france':
                return $total * 0.25;
                break;
            case 'germany':
                return $total * 0.08;
                break;
        }
    }

}