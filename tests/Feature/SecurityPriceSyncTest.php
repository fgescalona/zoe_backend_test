<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Security;
use App\Models\SecurityType;
use App\Jobs\UpdateSecurityPrice;
use App\Services\SecurityProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\SecurityPricesSyncNotification;

class SecurityPriceSyncTest extends TestCase
{
    /*
     * Test the job to sync the security prices
     * 
     **/
    public function testUpdateSecurityPriceJob()
    {

        $securityType = SecurityType::factory()->create();
        $security = Security::factory()->create(['security_type_id' => $securityType->id]);

        $mockSecurityProvider = $this->createMock(SecurityProvider::class);
        $mockSecurityProvider->method('get')->willReturn([
            'results' => [
                [
                    'symbol' => $security->symbol,
                    'price' => 200.0,
                    'last_price_datetime' => '2023-10-30T17:31:18-04:00',
                ],
            ],
        ]);

        UpdateSecurityPrice::dispatch($mockSecurityProvider, $securityType)->onQueue('default');

        $this->assertDatabaseHas('security_prices', [
            'security_id' => $security->id,
            'last_price' => 200.0,
        ]);
    }

    /*
     * Test the endpoint to update security prices
     * 
     **/
    public function testUpdateSecurityPricesEndpoint()
    {
        $securityType = SecurityType::factory()->create();

        $mockSecurityProvider = $this->createMock(SecurityProvider::class);
        $mockSecurityProvider->method('get')->willReturn([
            'results' => [],
        ]);

        $response = $this->postJson('/api/v1/securities/prices/' . $securityType->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Prices synchronization started successfully']);
    }
}
