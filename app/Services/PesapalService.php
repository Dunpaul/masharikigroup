<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Thin wrapper around the Pesapal API 3.0 REST calls we actually use —
 * same philosophy as the Flutterwave integration it replaces: plain HTTP
 * calls, no SDK. Unlike Flutterwave, Pesapal requires a short-lived bearer
 * token (RequestToken) and a one-time IPN URL registration (see the
 * `pesapal:register-ipn` artisan command) before orders can be submitted.
 */
class PesapalService
{
    public function registerIpn(string $url, string $notificationType = 'GET'): array
    {
        return $this->request()
            ->post('/api/URLSetup/RegisterIPN', [
                'url' => $url,
                'ipn_notification_type' => $notificationType,
            ])
            ->throw()
            ->json();
    }

    public function submitOrder(array $payload): array
    {
        return $this->request()
            ->post('/api/Transactions/SubmitOrderRequest', [
                ...$payload,
                'notification_id' => config('services.pesapal.ipn_id'),
            ])
            ->throw()
            ->json();
    }

    public function getTransactionStatus(string $orderTrackingId): array
    {
        return $this->request()
            ->get('/api/Transactions/GetTransactionStatus', [
                'orderTrackingId' => $orderTrackingId,
            ])
            ->throw()
            ->json();
    }

    protected function request(): PendingRequest
    {
        return Http::baseUrl(config('services.pesapal.base_url'))
            ->withToken($this->token())
            ->acceptJson();
    }

    /**
     * Pesapal tokens are valid ~5 minutes; cache for 4 to avoid
     * re-authenticating on every call without risking an expired token.
     */
    protected function token(): string
    {
        return Cache::remember('pesapal_access_token', now()->addMinutes(4), function () {
            return Http::baseUrl(config('services.pesapal.base_url'))
                ->acceptJson()
                ->post('/api/Auth/RequestToken', [
                    'consumer_key' => config('services.pesapal.consumer_key'),
                    'consumer_secret' => config('services.pesapal.consumer_secret'),
                ])
                ->throw()
                ->json('token');
        });
    }
}