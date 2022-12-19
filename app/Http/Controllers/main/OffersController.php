<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Codes;
use App\Models\Offers;
use Auth;
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
     * Redirects to /offers, which is the page in which we will see the offers available.
     */
    public function showOffersPage() {
        $offers = Offers::all();
        return view('user.offers', ['offers' => $offers]);
    }

     /**
     * showDetailsPage
     * Redirects to /details, which is where we will see the list of promotional codes
     * available and where we can redeem a code.
     */
    public function showDetailsPage() {
        $codes = Codes::all();
        return view('user.details', ['codes' => $codes]);
    }

    /**
     * showCreateOfferForm
     * Redirects to /createOffer, which is where we are able to create offers. Usually,
     * only an authorized user should be able to do this.
     */
    public function showCreateOfferForm() {
        return view('user.createOffer');
    }

    /**
     * createOffer
     * @param  \Illuminate\Http\Request $request
     * Receives data from /createOffer (POST).
     * Creates an Offer and then redirects us back to Offers.
     */
    public function createOffer(Request $request) {
        $offer = Offers::create($request->all());

        return redirect()->route('goToOffers')->with("success", "Offer created successfully!");
    }

    /**
     * generatePromotionalCode
     * Creates a promotional code that can be redeemed.
     * Redirects to Offers.
     */
    public function generatePromotionalCode() {
        $code = Codes::create([
            'code' => $this->generateRandomString(16),
            'is_redeemed' => 0,
            'redeemed_by' => ''
        ]);

        return redirect()->route('goToOffers')->with("success", "Code generated successfully!");
    }

    /**
     * generateRandomString
     * Generates a random string for the promotional codes.
     */
    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * redeemPromotionalCode
     * Redeems a promotional code.
     * Redirects to Details.
     */
    public function redeemPromotionalCode($id) {
        $code = Codes::find($id);
        $code->is_redeemed = 1;
        $code->redeemed_by = Auth::user()->email;
        $code->save();

        return redirect()->route('goToDetails')->with("success", "Code redeemed successfully!");
    }
}
