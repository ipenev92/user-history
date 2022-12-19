<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Auth;

class UserController extends Controller {
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        //
    }

    public function showRecoverPasswordForm() {
        return view('auth.recoverPassword');
    }

    public function recoverPassword(Request $request) {
        $user = User::where('email', $request->get('email'))->get()[0];

        if ($user->question == $request->get('question') && $user->answer == $request->get('answer')) {
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return Redirect::route('login')->with('success', 'Password reset successfully.');
        } else {
            return redirect()->back()->with("danger", "One or more parameters are incorrect.");
        }
    }
}