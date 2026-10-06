<?php

namespace App\Console\Commands;

use App\Services\PesapalService;
use Illuminate\Console\Command;

/**
 * One-time setup per environment: Pesapal requires a registered IPN
 * (webhook) URL before any order can be submitted, and hands back an
 * `ipn_id` that must be sent with every order. Re-running this is safe —
 * Pesapal just returns a new registration — but there's no need to unless
 * the webhook URL itself changes (e.g. a domain change).
 */
class RegisterPesapalIpn extends Command
{
    protected $signature = 'pesapal:register-ipn';

    protected $description = 'Register this app\'s Pesapal webhook URL and print the ipn_id to put in .env as PESAPAL_IPN_ID';

    public function handle(PesapalService $pesapal): int
    {
        $url = route('market.payments.webhook');

        $this->info("Registering IPN URL: {$url}");

        $response = $pesapal->registerIpn($url, 'GET');

        if (! isset($response['ipn_id'])) {
            $this->error('Pesapal did not return an ipn_id. Response: '.json_encode($response));

            return self::FAILURE;
        }

        $this->info('Registered successfully. Add this to your .env:');
        $this->line('PESAPAL_IPN_ID='.$response['ipn_id']);

        return self::SUCCESS;
    }
}