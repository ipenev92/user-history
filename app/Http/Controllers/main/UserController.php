<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        
    }

    /**
     * showRecoverPasswordForm
     * redirects to /recoverPassword, which is the password recovery form.
     */
    public function showRecoverPasswordForm() {
        return view('auth.recoverPassword');
    }

    /**
     * showChangePasswordForm
     * redirects to /changePassword, which is the change password form.
     */
    public function showChangePasswordForm() {
        return view('auth.changePassword');
    }

    /**
     * recoverPassword
     * 
     * @param \Illuminate\Http\Request $request
     * Recieves data from /recoverPassword (POST).
     * Finds the user via the E-mail provided. Checks if user's Secret Question and Answer
     * are equal to the ones provided. In case that they are, password is updated.
     * Redirects to Login if successful. Back if fails.
     */
    public function recoverPassword(Request $request) {
        $user = User::where('email', $request->get('email'))->get()[0];

        if ($user->question == $request->get('question') && $user->answer == $request->get('answer')) {
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return redirect()->route('login')->with("success", "Password reset successfully!");
        } else {
            return redirect()->back()->with("error", "One or more parameters are incorrect.");
        }
    }

    /** 
     * changePassword
     * 
     * @param \Illuminate\Http\Request $request
     * Receives data from /changePassword (POST).
     * Allows the user to change their password. Requires the user to be Authenticated.
     * Redirects to Dashboard if successful. Back if fails.
     */
    public function changePassword(Request $request) { 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // Password provided is incorrect.
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password are same.
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        // Change Password.
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('home')->with("success", "Password changed successfully!");
    }
}