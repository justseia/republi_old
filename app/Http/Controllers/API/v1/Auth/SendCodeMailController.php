<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SendCodeMailRequest;
use App\Http\Requests\Auth\VerifyMailRequest;
use App\Http\Requests\Auth\VerifyRequest;
use App\Mail\VerifyMail;
use App\Models\EmailVerifyCode;
use Illuminate\Support\Facades\Mail;

class SendCodeMailController extends Controller
{
    public function __invoke(SendCodeMailRequest $request)
    {
        $email_verify = EmailVerifyCode::where('email', $request->email)->first();
        $code = mt_rand(1000, 9999);

        if ($email_verify) {
            $email_verify->update(['email' => $request->email, 'code' => $code]);

            return response()->json([
                'status' => '200',
                'message' => 'Resend'
            ]);
        }

        $email_verify = EmailVerifyCode::create([
            'email' => $request->email,
            'code' => $code
        ]);

        Mail::to($email_verify->email)->send(new VerifyMail($email_verify->code));

        return response()->json([
            'status' => '200',
            'message' => 'Send verify'
        ]);
    }
}
