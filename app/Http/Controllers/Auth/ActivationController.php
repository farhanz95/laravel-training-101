<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;

class ActivationController extends Controller
{
    public function activate($token)
    {
        // find token based on id
        $user = User::where('activation_token', $token)->first();

        if ($user) {

        	$diff = Carbon::now()->diffInSeconds($user->expired_at);
        	//handle expire token
        	//if negative, less than 0

            // update activation account details
            $user->activation_token = null;
            $user->activated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();

            // login using id
            auth()->loginUsingId($user->id);

            // redirect to home
            return redirect('/home');
        } else {
            return 'invalid token provided';
        }
    }
}