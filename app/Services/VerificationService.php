<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VerificationService
{



    public function verifyBVN($bvn)
    {
        try {
            $response = Http::withHeaders([
                'token' => env('API_TOKEN'), 
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->asForm()->post('https://api.sandbox.youverify.co/v2/api/identity/ng/bvn', [
                'id' => $bvn,
                'isSubjectConsent' => 'true',
            ]);

            if ($response->status() === 200) {
                $responseData = json_decode($response->body(), true);
                if ($responseData['success']) {
                    $data = $responseData['data'];

                    // Wrap the data in a common response format
                    $response = [
                        'success' => true,
                        'data' => $data,
                    ];

                    return $response;
                }
            } else {
                $responseData = json_decode($response->body(), true);

                // Wrap the error message in a common response format
                $errorResponse = [
                    'success' => false,
                    'message' => $responseData['message'],
                ];

                throw new \Exception(json_encode($errorResponse));
            }
        } catch (\Throwable $th) {
            // Wrap the exception message in a common response format
            $errorResponse = [
                'success' => false,
                'message' => 'Error: ' . $th->getMessage(),
            ];

            throw new \Exception(json_encode($errorResponse));
        }
    }
}
