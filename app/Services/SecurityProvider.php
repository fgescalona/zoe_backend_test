<?php

namespace App\Services;

use App\Models\SecurityType;

class SecurityProvider
{

    public function get(SecurityType $securityType)
    {
        return [
            "results" => [
                [
                    "symbol" => "APPL",
                    "price" => rand(100, 300),
                    "last_price_datetime" => "2023-10-30T17:31:18-04:00"
                ],
                [
                    "symbol" => "TSLA",
                    "price" => rand(100, 300),
                    "last_price_datetime" => "2023-10-30T17:32:11-04:00"
                ],
                [
                    "symbol" => "MSFT",
                    "price" => rand(100, 300),
                    "last_price_datetime" => "2023-10-30T17:32:11-04:00"
                ],
                [
                    "symbol" => "AMZN",
                    "price" => rand(100, 300),
                    "last_price_datetime" => "2023-10-30T17:32:11-04:00"
                ],
                [
                    "symbol" => "GOOG",
                    "price" => rand(100, 300),
                    "last_price_datetime" => "2023-10-30T17:32:11-04:00"
                ],
            ]
        ];
    }
}
