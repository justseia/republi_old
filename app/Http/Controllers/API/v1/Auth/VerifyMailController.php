<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyMailRequest;
use App\Models\EmailVerifyCode;

class VerifyMailController extends Controller
{
    public function __invoke(VerifyMailRequest $request)
    {
        $verified = EmailVerifyCode::where('email', $request->email)->first();

        if ($verified->code != (string)$request->code) {
            return response()->json([
                'status' => '400',
                'message' => 'Error'
            ], 400);
        }

        $verified->delete();

        return response()->json([
            'status' => '200',
            'message' => 'Success'
        ], 200);
    }
}
