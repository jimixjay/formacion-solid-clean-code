<?php

class TaxCalculator
{
    private $country;

    public function __construct($country)
    {
        $this->country = $country;
    }

    public function execute($amount)
    {
        switch ($this->country) {
            case 'spain':
                return $amount * 0.21;
                break;
            case 'usa':
                return $amount * 0.15;
                break;
            case 'france':
                return $amount * 0.25;
                break;
            case 'germany':
                return $amount * 0.08;
                break;
        }
    }
}