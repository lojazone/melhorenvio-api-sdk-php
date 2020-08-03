<?php

namespace Lojazone\MelhorEnvio\Models;

class Shipment extends Model
{
    public function calculate(array $params): ?array
    {
        return $this->getClient()->request('post', 'me/shipment/calculate', [
            'json' => $params
        ]);
    }

    public function getCart(): ?array
    {
        return $this->getClient()->request('get', 'me/cart');
    }

    public function addCartItem(array $params): ?array
    {
        return $this->getClient()->request('post', 'me/cart', [
            'json' => $params
        ]);
    }

    public function getCartItem(string $id): ?array
    {
        return $this->getClient()->request('get', "me/cart/$id");
    }

    public function deleteCartItem(string $id): ?array
    {
        return $this->getClient()->request('delete', "me/cart/$id");
    }

    public function checkoutCart(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/checkout', [
            'json' => $params
        ]);
    }

    public function previewLabel(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/preview', [
            'json' => $params
        ]);
    }

    public function generateLabel(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/generate', [
            'json' => $params
        ]);
    }

    public function printLabel(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/print', [
            'json' => $params
        ]);
    }

    public function allLabels(string $q)
    {
        return $this->getClient()->request('get', 'me/orders', [
            'query' => [
                'q' => $q
            ]
        ]);
    }

    public function canCancelLabel(array $params)
    {
        return $this->getClient()->request('get', 'me/shipment/cancellable', [
            'json' => $params
        ]);
    }

    public function cancelLabel(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/cancel', [
            'json' => $params
        ]);
    }

    public function tracking(array $params)
    {
        return $this->getClient()->request('post', 'me/shipment/tracking', [
            'json' => $params
        ]);
    }
}