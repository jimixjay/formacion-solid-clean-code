<?php

class Wallet
{
    private $transactions;
    private $country;

    private $taxCalculator;

    public function __construct($country)
    {
        if ($country != 'china') {
            $this->transactions = [];
            $this->country = $country;

            $this->taxCalculator = new TaxCalculator($country);
        } else {
            // escribo en el log
            // mando mail a seguridad porque no queremos cuentas en china
            // añado una fila a un informe que se envía al final del día
            // meto en base de datos los datos del cliente para banearle
            // lanzo exception para indicarlo al cliente
        }

        //////////////////////////////////////////////////////////////////////////////////////

        $this->assertCountryIsNotChina($country); // o assertValidCountry

        //////////////////////////////////////////////////////////////////////////////////////

        if ($country == 'china') {
            $this->hazCosasParaChina();
            throw new ChinaIsNotValidCountry();
        }

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

    private function assertCountryIsNotChina($country)
    {
        if ($country == 'china') {
            // escribo en el log
            // mando mail a seguridad porque no queremos cuentas en china
            // añado una fila a un informe que se envía al final del día
            // meto en base de datos los datos del cliente para banearle
            // lanzo exception para indicarlo al cliente
        }
    }

}