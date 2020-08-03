<?php

namespace Lojazone\MelhorEnvio\Models;

class Carrier extends Model
{
    public function allCompanies()
    {
        return $this->getClient()->request('get', 'me/shipment/companies');
    }

    public function findCompany($id)
    {
        return $this->getClient()->request('get', "me/shipment/companies/{$id}");
    }

    public function allServices()
    {
        return $this->getClient()->request('get', 'me/shipment/services');
    }

    public function findService($id)
    {
        return $this->getClient()->request('get', "me/shipment/services/{$id}");
    }

    public function allAgencies($filters = [])
    {
        return $this->getClient()->request('get', 'me/shipment/agencies', [
            'query' => $filters
        ]);
    }

    public function findAgency($id)
    {
        return $this->getClient()->request('get', "me/shipment/agencies/{$id}");
    }
}