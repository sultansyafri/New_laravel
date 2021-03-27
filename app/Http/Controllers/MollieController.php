<?php

namespace App\Http\Controllers;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{   

    public function  __construct() {
        Mollie::api()->setApiKey('test_SrJbfJDmuBUBamz74KaWa2s9Wjqjna'); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {   
        

        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'Malaysian Ringgit-MYR', // Type of currency you want to send
            'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => 'Payment By LetsPhilonthropy', 
        'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);
    
        $payment = Mollie::api()->payments()->get($payment->id);
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        echo 'payment has been received';

    }
}