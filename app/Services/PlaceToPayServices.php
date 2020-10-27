<?php

namespace App\Services;

use App\Contracts\WebCheckoutContract;

class PlaceToPayServices implements WebCheckoutContract
{
    public function request(array $payment): array
    {
        return [];
    }

    public function query(int $id): array
    {
        return [];
    }
}
