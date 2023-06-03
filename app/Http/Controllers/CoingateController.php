<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class CoingateController extends Controller
{
    //

    public function redirectToGateway(Request $request)
    {

        try{
           $pay = Order::create([
                'user_id' => $request->input('user_id'),
                'reference'=>$request->input('reference'),
                'email' => $request->input('email'),
                'amount' => $request->input('amount'),
            ]);
            // $pay->save();

            $paymentData = [
                'email' => $request->input('email'),
                'amount' => $request->input('amount') * 100,
                "reference" => $request->input('reference'),
                "currency" => "NGN",
                'metadata' => [
                    'order_id' => $pay->id,
                ],
            ];

            $payment = Paystack::getAuthorizationUrl($paymentData)->redirectNow();

            return $payment;
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        $paymentReference = $request->input('reference');
        // Call Paystack API to verify payment
        $paymentStatus = Paystack::getPaymentData($paymentReference);

        if ($paymentStatus['data']['status'] === 'success') {
            $order = Order::find($paymentStatus['data']['metadata']['order_id']);
            $order->payment_date = Carbon::now();
            $order->status = 'paid';
            $order->save();

            return redirect()->route('orders.show', ['order' => $order])
                ->with('success', 'Payment successful');
        } else {
            return redirect()->route('orders.index')
                ->with('error', 'Payment failed');
        }
    }

}
