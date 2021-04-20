<?php

include_once 'class_autoload.php';

try {
    $c = new Wallet('spain');

    $c->new(create(10, 'euro', 'spain'));
    $c->new(create(58, 'euro', 'germany'));
    $c->new(create(-10.25, 'euro', 'spain'));
    $c->new(create(90, 'euro', 'france'));
    $c->new(create(35.2, 'euro', 'france'));
    $c->new(create(-46, 'euro', 'usa'));

    echo $c->getTotal() . ' balance total' . PHP_EOL;
    echo $c->getTotalPermanency() . ' tasas por permanencia' . PHP_EOL;

} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}

function create($p, $cu, $co): Price
{
    $p = new Price($p, $cu, $co);

    return $p;
}
