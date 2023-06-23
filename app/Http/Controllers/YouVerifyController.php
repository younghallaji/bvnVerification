<?php

namespace App\Http\Controllers;


use App\Services\VerificationService;
use Illuminate\Http\Request;

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

            $data = $this->verificationService->verifyBVN($bvn);

            return view('dashboard', ['data' => $data['data']]);
        } catch (\Throwable $th) {
            $responseData = json_decode($th->getMessage(), true);
            return redirect()->back()->withErrors(['message' => $responseData['message']]);
        }
    }

    


    public function index()
    {
        return view('dashboard');
    }
}
