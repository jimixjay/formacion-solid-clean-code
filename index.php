<?php

include_once 'class_autoload.php';

try {
    $wallet = new Wallet('spain');

    $wallet->addTransaction(generatePrice(10, 'euro', 'spain'));
    $wallet->addTransaction(generatePrice(58, 'euro', 'germany'));
    $wallet->addTransaction(generatePrice(-10.25, 'euro', 'spain'));
    $wallet->addTransaction(generatePrice(90, 'euro', 'france'));
    $wallet->addTransaction(generatePrice(35.2, 'euro', 'france'));
    $wallet->addTransaction(generatePrice(-46, 'euro', 'usa'));

    echo $wallet->getTotalBalance() . ' balance total' . PHP_EOL;
    echo $wallet->getCountryTaxForPermanency() . ' tasas por permanencia' . PHP_EOL;

} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}

function generatePrice($price, $currency, $country): Price
{
    $priceObj = new Price($price, $currency, $country);

    return $priceObj;
}
