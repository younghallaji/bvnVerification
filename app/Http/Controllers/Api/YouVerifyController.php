<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VerificationService;

class YouVerifyController extends Controller
{
    protected $verificationService;

    public function __construct(VerificationService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function verify(Request $request)
    {
        try {
            $bvn = $request->bvn;
            $response = $this->verificationService->verifyBVN($bvn);
    
            // Handle successful response
            return response()->json([
                'success' => true,
                'data' => $response['data'],
            ]);
        } catch (\Exception $e) {
            // Handle error response
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}

