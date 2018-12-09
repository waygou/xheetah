<?php

namespace Waygou\Xheetah\Tests;

class RandomAddress
{
    var $address;
    var $floorNumber;
    var $city;
    var $locality;
    var $postal_code;
    var $country;
    var $countryCode;
    var $map;

    var $addresses;

    function __construct()
    {
        // Load random addresses.
        $this->addresses = [

            ['address'      => 'Rua da Penha de França 138',
             'floor_number' => '4',
             'city'         => 'Lisboa',
             'locality'     => 'Lisboa',
             'postal_code'  => '1170-207',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7252374,-9.1295062'],

            ['address'      => 'Rua Morais Soares 22',
             'floor_number' => '1o Esq',
             'city'         => 'Lisboa',
             'locality'     => 'Lisboa',
             'postal_code'  => '1900',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7310928,-9.1264145'],

            ['address'      => 'Rua Ana de Castro Osório 10',
             'floor_number' => '3o Dto',
             'city'         => 'Lisboa',
             'locality'     => 'Amadora',
             'postal_code'  => '2720-038',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7416772,-9.2207023'],

            ['address'      => 'Avenida Heliodoro Salgado 10',
             'floor_number' => '5o Frente',
             'city'         => 'Lisboa',
             'locality'     => 'Sintra',
             'postal_code'  => '2710-572',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.801762,-9.382661599999999'],

            ['address'      => 'Rua do Cabeço 10',
             'floor_number' => 'R/C Frente',
             'city'         => 'Portalegre',
             'locality'     => 'Tramaga',
             'postal_code'  => '7400',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '39.2263218,-8.0326585'],

            ['address'      => 'Rua Eça de Queirós 89',
             'floor_number' => 'Lote 5',
             'city'         => 'Lisboa',
             'locality'     => 'Carcavelos',
             'postal_code'  => '2775',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7009399,-9.328761199999999'],

            ['address'      => 'Beco do Girassol 1',
             'floor_number' => 'Armazem 2',
             'city'         => 'Setúbal',
             'locality'     => 'Alto da Guerra',
             'postal_code'  => '2910',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.5417025,-8.849954199999999'],

            ['address'      => 'Travessa das Amoreiras a Arroios 10',
             'floor_number' => 'Cabeleireiro Rosa',
             'city'         => 'Lisboa',
             'locality'     => 'Lisboa',
             'postal_code'  => '1000-035',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7337656,-9.1359517'],

            ['address'      => 'Campo Pequeno',
             'floor_number' => 'Restaurante Pedro Amargo',
             'city'         => 'Lisboa',
             'locality'     => 'Lisboa',
             'postal_code'  => '1000-081',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.7425071,-9.1440445'],

            ['address'      => 'Rua de Ponta Delgada 29',
             'floor_number' => '9o Frente',
             'city'         => 'Lisboa',
             'locality'     => 'Lisboa',
             'postal_code'  => '1000-001',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '38.73286520000001,-9.138896899999999'],

            ['address'      => 'Rua Almirante Reis 78',
             'floor_number' => '1o Dto',
             'city'         => 'Faro',
             'locality'     => 'Olhão',
             'postal_code'  => '8700-328',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '37.0269518,-7.843836499999999'],

            ['address'      => 'Rua Manuel Alves Cruz 22',
             'floor_number' => 'R/C Dto',
             'city'         => 'Leiria',
             'locality'     => 'Marinha Grande',
             'postal_code'  => '2430-058',
             'country'      => 'Portugal',
             'country_code' => 'PT',
             'map'          => '39.7590919,-8.929899599999999'],
        ];
    }

    public function getOne()
    {
        return (object)$this->getRandom();
    }

    private function getRandom()
    {
        return $this->addresses[rand(0, count($this->addresses)-1)];
    }

    public function getTwo()
    {
        $firstAddress = $this->getRandom();

        $exit = false;

        while (!$exit) {
            $secondAddress = $this->getRandom();
            if ($secondAddress['address'] != $firstAddress['address']) {
                $exit = true;
            }
        };

        return [(object)$firstAddress, (object)$secondAddress];
    }
}
