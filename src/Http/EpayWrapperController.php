<?php

namespace Kondov\EpayWrapper\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kondov\EpayWrapper\Facades\Epay;


class EpayWrapperController extends Controller {

    /**
     * Show main billing form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm() {
        return view('epay::index');
    }

    /**
     * Show order overview before redirecting to ePay
     *
     * @param Request $request
     * @return mixed
     */
    public function sendRequest(Request $request) {
        $order = $request->input();
        //Remove the CRSF token's value from the array
        unset($order['_token']);
        //Store the order in the session so it can be accessed upon callback
        Session::put('order', $order);

        //Get the encoded data that is to be sent to ePay
        $encodedData = Epay::setEncodedData($order);
        //Hash payment information
        $hashedData = Epay::hashData($encodedData);
        //Get the page name from the config file
        $page = config('config.PAGE');

        return view('epay::review')->with('order', $order)
                                            ->with('page', $page)
                                            ->with('encodedData', $encodedData)
                                            ->with('hashedData', $hashedData)
                                            ->with('urlSubmit', config('config.SUBMIT_URL'))
                                            ->with('urlCompleted', config('config.URL_OK'))
                                            ->with('urlCanceled', config('config.URL_CANCEL'));
    }

    /**
     * Redirect after a successful payment
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function successfulTransfer(Request $request) {
        //Get the order from the session and then unset it
        $order = Session::get('order');
        Session::forget('order');

        //Set success message
        $message = array(
            'type' => 'success',
            'content' => 'Your order has been payed successfully!'
        );

        return view('epay::callback')->with('order', $order)
                                    ->with('message', $message);
    }


    /**
     * Redirect after a payment has been cancelled
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancelledTransfer(Request $request) {
        //Get the order from the session and then unset it
        $order = Session::get('order');
        Session::forget('order');

        //Set error message
        $message = array(
            'type' => 'danger',
            'content' => 'Your order has been cancelled!'
        );

        return view('epay::callback')->with('order', $order)
                                    ->with('message', $message);
    }

}