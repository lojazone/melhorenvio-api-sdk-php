<?php
include("src/config/app.php");

$melhorenvio = new \Lojazone\MelhorEnvio\MelhorEnvio($token);

$response = $melhorenvio->Shipment()->calculate([
    'from' => [
        'postal_code' => '59082000',
    ],
    'to' => [
        'postal_code' => '59148485',
    ],
    'options' => [
        'receipt' => false,
        'own_hand' => false,
    ],
    'services' => '1,2',
    'products' => [
        [
            'id' => 'x',
            'width' => 11,
            'height' => 17,
            'length' => 11,
            'weight' => 0.3,
            'insurance_value' => 10.1,
            'quantity' => 1,
        ],
        [
            'id' => 'x',
            'width' => 20,
            'height' => 10,
            'length' => 11,
            'weight' => 0.5,
            'insurance_value' => 20.1,
            'quantity' => 2,
        ],
    ],
]);

//var_dump($response);
//die();

$allCompanies = $melhorenvio->Carrier()->allAgencies();

var_dump($allCompanies);
die('Eu');
