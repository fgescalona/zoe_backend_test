<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Security;
use App\Models\SecurityType;
use App\Models\SecurityPrice;
use Illuminate\Bus\Queueable;
use App\Services\SecurityProvider;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\SecurityPricesSyncNotification;

class UpdateSecurityPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $securityType;
    protected $securityProvider;

    /**
     * Create a new job instance.
     */
    public function __construct(SecurityProvider $securityProvider, SecurityType $securityType = null)
    {
        $this->securityType = $securityType;
        $this->securityProvider = $securityProvider;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $securityTypes = $this->securityType ? [$this->securityType] : SecurityType::all();

        foreach ($securityTypes as $securityType) {
            $securityPrices = $this->securityProvider->get($securityType)['results'];

            foreach ($securityPrices as $securityPrice) {
                $symbol = $securityPrice['symbol'];
                $price = $securityPrice['price'];
                $security = Security::where('symbol', $symbol)
                    ->where('security_type_id', $securityType->id)
                    ->first();

                if (isset($security)) {
                    if (isset($security->securityPrice)) {
                        $securityPrice = $security->securityPrice;
                    } else {
                        $securityPrice = new SecurityPrice();
                        $securityPrice->security_id = $security->id;
                    }

                    $securityPrice->last_price = $price;
                    $securityPrice->as_of_date = Carbon::now();
                    $securityPrice->save();
                }
            }

            $this->sendNotification();
        }
    }

    /**
     * Send the notification to the authenticated user
     */
    private function sendNotification(): void
    {
        $user = auth()->user();

        if ($user) {
            Notification::send($user, new SecurityPricesSyncNotification());
        }
    }
}
