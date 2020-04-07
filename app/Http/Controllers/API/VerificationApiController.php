<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;

use Illuminate\Auth\Events\Verified;

class VerificationApiController extends Controller
{
    use VerifiesEmails;

    /**
        * Mark the authenticated user’s email address as verified.
        *
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
    */

    public function verify(Request $request) {
        $userID = $request->id;
        $user = User::findOrFail($userID);
        $date = now();
        $user->email_verified_at = $date; // to enable the “email_verified_at field of that user be a current time stamp by mimicing the must verify email feature
        $user->save();

        return response()->json('El email ha sido verificado');
    }

    /**
        * Resend the email verification notification.
        *
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
    */

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail() != '') {
            return response()->json('El usuario ya se encuentra verificado.', 422);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json('El email ha sido reenviado.');
        // return back()->with(‘resent’, true);
    }
}
