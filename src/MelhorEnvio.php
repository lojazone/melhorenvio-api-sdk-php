<?php

namespace Lojazone\MelhorEnvio;

use Lojazone\MelhorEnvio\Models\Carrier;
use Lojazone\MelhorEnvio\Models\Shipment;

class MelhorEnvio extends Client
{
    public function __construct($token)
    {
        parent::__construct($token);
    }

    public function Carrier(): Carrier
    {
        return new Carrier($this);
    }

    public function Shipment(): Shipment
    {
        return new Shipment($this);
    }
}