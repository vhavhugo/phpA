<?php

namespace Services;

use Models\Address;
use Models\Seller;

/**
 * Class responsible for the service of managing the store salesperson
 */
class SellerService
{
    /**
     * Get data user on API Melhor Envio
     *
     * @return object $dataSeller
     */
    public function getData()
    {
        $seller = new Seller();

        $data = $seller->get();

        if (!empty($data)) {
            return $data;
        }

        $data = $this->getDataApiMelhorEnvio();

        $address = (new Address())->getAddressFrom();

        $store = (new StoreService())->getStoreSelected();

        if (!empty($address['address']['id'])) {
            $data->address->address = (!empty($address['address']['address'])) ? $address['address']['address'] : null;
            $data->address->complement = (!empty($address['address']['complement'])) ? $address['address']['complement'] : null;
            $data->address->number = (!empty($address['address']['number'])) ? $address['address']['number'] : null;
            $data->address->district = (!empty($address['address']['district'])) ? $address['address']['district'] : null;
            $data->address->city->city = (!empty($address['address']['city'])) ? $address['address']['city'] : null;
            $data->address->city->state->state_abbr = (!empty($address['address']['state'])) ? $address['address']['state'] : null;
            $data->address->postal_code = (!empty($address['address']['postal_code'])) ? $address['address']['postal_code'] : null;
        }

        $data = (object) [
            "name" => (!empty($store->name)) ? $store->name :  sprintf("%s %s", $data->firstname, $data->lastname),
            "phone" => (!empty($data->phone->phone)) ? $data->phone->phone : null,
            "email" => (!empty($store->email)) ? $store->email :  $data->email,
            "document" => (!empty($store->document)) ? null : $data->document,
            'company_document' => (!empty($store->document)) ? $store->document : null,
            "address" => (!empty($store->address->address)) ? $store->address->address : $data->address->address,
            "complement" => (!empty($store->address->complement)) ? $store->address->complement : $data->address->complement,
            "number" => (!empty($store->address->number)) ? $store->address->number : $data->address->number,
            "district" => (!empty($store->address->district)) ? $store->address->district : $data->address->district,
            "city" => (!empty($store->address->city->city)) ? $store->address->city->city : $data->address->city->city,
            "state_abbr" => (!empty($store->address->city->state->state_abbr)) ? $store->address->city->state->state_abbr : $data->address->city->state->state_abbr,
            "country_id" => 'BR',
            "postal_code" => (!empty($store->address->postal_code)) ? $store->address->postal_code : $data->address->postal_code,
        ];

        $seller->save($data);

        return $data;
    }

    /**
     * Get data user on API Melhor Envio
     *
     * @return object $data
     */
    private function getDataApiMelhorEnvio()
    {
        $data = (new RequestService())->request('', 'GET', [], false);

        if (!isset($data->id)) {
            return [
                'success' => false,
                'message' => 'Usuário não encontrado no Melhor Envio'
            ];
        }

        return $data;
    }
}
