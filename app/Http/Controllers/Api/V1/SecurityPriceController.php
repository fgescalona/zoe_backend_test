<?php

namespace App\Http\Controllers\Api\V1;

use App\Jobs\UpdateSecurityPrice;
use App\Http\Controllers\Controller;
use App\Models\SecurityType;
use App\Services\SecurityProvider;
use Illuminate\Http\Request;


class SecurityPriceController extends Controller
{

    public function updateSecurityPrices(SecurityType $securityType = null, SecurityProvider $securityProvider)
    {
        UpdateSecurityPrice::dispatch($securityProvider, $securityType);

        return response()->json(['message' => 'Prices synchronization started successfully']);
    }
}
