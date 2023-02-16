<?php

namespace App\Integrations;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class UzumApiClient
{
    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::baseUrl(config('uzum.base_url'))
            ->withHeaders([
                'Accept-Language' => config('uzum.lang.current'),
                'Authorization' => sprintf(
                    '%s %s',
                    config('uzum.auth_type'),
                    config('uzum.auth_token')
                )
            ])
            ->acceptJson()
            ->throw()
            ->retry(
                config('uzum.max-retry'),
                config('uzum.sleep')
            );
    }

    public function getCity(): array
    {
        return $this->request->get('main/city')->json('payload');
    }

    public function getCities(): array
    {
        return $this->request->get('main/cities')->json('payload');
    }
}
