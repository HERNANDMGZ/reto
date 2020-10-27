<?php

namespace App\Contracts;

interface WebCheckoutContract
{
    public function request(array $payment): array;

    public function query(int $id): array;
}
