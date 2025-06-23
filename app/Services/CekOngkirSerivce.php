<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CekOngkirSerivce
{
    protected $baseUrl;
    protected $apiKey;
    public function __construct()
    {

        $this->apiKey = env('BITESHIP_API_KEY');
        $this->baseUrl = 'https://api.biteship.com/v1';
    }

    public function checkRatesByCoordinates(
        float $originLat,
        float $originLong,
        float $destinationLat,
        float $destinationLong,
        array $items,
        $couriers
    ): ?array {

        if (empty($this->apiKey)) {
            Log::error('Biteship API Key is not set in .env');
            return null;
        }

        $payload = [
            'origin_latitude' => $originLat,
            'origin_longitude' => $originLong,
            'destination_latitude' => $destinationLat,
            'destination_longitude' => $destinationLong,
            'couriers' => $couriers,
            'items' => [$items],
        ];

             try {
                    $response = Http::withHeaders([
                        'Authorization' => $this->apiKey,
                        'Content-Type' => 'application/json',
                    ])->post("{$this->baseUrl}/rates/couriers", $payload);

                    if ($response->successful()) {
                        $data = $response->json();


                        if (isset($data['pricing'])) {
                            $pricingData = $data['pricing'];

                            foreach ($pricingData as $rate) {

                                if (
                                    isset($rate['type']) && $rate['type'] === 'instant' &&
                                    isset($rate['courier_code']) && $rate['courier_code'] === 'gojek'
                                ) {
                                    return  $rate;
                                }
                            }

                            Log::info('Gojek Instant price not found in Biteship response for the requested couriers.');
                            return null;

                        } else {

                            Log::error('Biteship API response missing expected "data" or "data.pricing" key, or "data" is not an array: ' . json_encode($data));
                            return null;
                        }
                    } else {
                        // Log error jika status HTTP bukan 2xx
                        Log::error('Biteship API HTTP Error: ' . $response->status() . ' - ' . $response->body());
                        return null;
                    }

                }  catch (Exception $e) {
                // Log exception jika ada masalah koneksi atau lainnya
                Log::error('Biteship API Request Exception: ' . $e->getMessage());
                return null;
            }
    }

    public function getGojekRates(
        float $originLat,
        float $originLong,
        float $destinationLat,
        float $destinationLong,
        array $items
    ): ?array {

        return $this->checkRatesByCoordinates(
            $originLat,
            $originLong,
            $destinationLat,
            $destinationLong,
            $items,
            'gojek'
        );
    }
}
