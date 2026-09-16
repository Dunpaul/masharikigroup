<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Thin wrapper around the two Flutterwave Standard (hosted payment page)
 * REST calls we actually use. Deliberately not a third-party SDK — the
 * v3 API is a handful of plain REST calls and Flutterwave's own docs
 * recommend calling it directly rather than depending on an unofficial
 * community package.
 */
class FlutterwaveService
{
    public function initiatePayment(array $payload): array
    {
        return $this->request()
            ->post('/payments', $payload)
            ->throw()
            ->json();
    }

    public function verifyTransaction(string $transactionId): array
    {
        return $this->request()
            ->get("/transactions/{$transactionId}/verify")
            ->throw()
            ->json();
    }

    protected function request(): PendingRequest
    {
        return Http::baseUrl(config('services.flutterwave.base_url'))
            ->withToken(config('services.flutterwave.secret_key'))
            ->acceptJson();
    }
}
