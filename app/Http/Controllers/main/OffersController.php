<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffersController extends Controller {
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        //
    }

    /**
     * Redirects to /home, which is the post-login page.
     */
    public function homepage() {
        return view('home');
    }

     /**
     * showOffersPage
     * redirects to /offers, which is the page in which we will see the offers available.
     */
    public function showOffersPage() {
        return view('user.offers');
    }

     /**
     * showDetailsPage
     * redirects to /details, which is where we will see the list of promotional codes
     * available and where we can redeem a code.
     */
    public function showDetailsPage() {
        return view('user.details');
    }
}
