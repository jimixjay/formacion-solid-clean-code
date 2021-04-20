<?php

include_once 'class_autoload.php';

try {
    $price    = 10;
    $currency = 'euro';
    $country = 'spain';

    $priceObj = new Price($price, $currency, $country);

    $priceObj->print();

} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}