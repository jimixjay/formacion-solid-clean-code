<?php

class TaxCalculator
{
    private $c;

    public function __construct($country)
    {
        $this->c = $country;
    }

    public function execute($x)
    {
        switch ($this->c) {
            case 'spain':
                return $x * 0.21;
                break;
            case 'usa':
                return $x * 0.15;
                break;
            case 'france':
                return $x * 0.25;
                break;
            case 'germany':
                return $x * 0.08;
                break;
        }
    }
}