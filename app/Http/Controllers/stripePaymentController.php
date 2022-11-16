<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\cart;
use App\Models\ship;
use App\Models\order;
use App\Models\address;
use App\Models\ordered_products;
use Auth;
use Exception;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class stripePaymentController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->middleware('auth');
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

 

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cardholder' => 'required',
            'cardnumber' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'cvv' => 'required|numeric'
        ]);

        if ($validator->fails()) {
           $validerror= $validator->errors()->first();
            return response()->json(['validerror'=>$validerror]);
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
           $token_error=  $token['error'];
            return response()->json(['token_error'=>$token_error]);
        }
        if (empty($token['id'])) {
            
            return response()->json(['payment_failed'=>$payment_failed]);
        }

        $total=cart::select('*')->where('user_id',Auth::user()->id)->sum('total');
        $ship=ship::select('*')->where('id',1)->first();
        $amount1=$total+$ship->price;
        $qty=cart::select('*')->where('user_id',Auth::user()->id)->get();
        $request->session()->put('qty', $qty);
        $charge = $this->createCharge($token['id'], $amount1*100);
        if (!empty($charge) && $charge['status'] == 'succeeded') {

            $payment = new Payment();
            $payment->user_id = Auth::user()->id;
            $payment->payment_id = $charge->id;
            $payment->payer_id = 'stripe';
            $payment->payer_email = 'stripe';
            $payment->amount =$charge->amount/100 ;
            $payment->currency = $charge->currency;
            $payment->payment_status =$charge->status ;
            $payment->save();

            $address = $request->session()->pull('address', 'default');
            $order = new order();
            $order->user_id = Auth::user()->id;
            $order->payment_id= $payment->id;
            $order->status= 'preparing';
            $order->address_id=$address;
            $order->save();

            $cart  = $request->session()->pull('qty', 'default');
           
            foreach ($cart as $cart ) {
              $ordered_products =new ordered_products();
              $ordered_products->order_id=$order->id;
              $ordered_products->user_id= Auth::user()->id;
              $ordered_products->product_id=$cart->product_id;
              $ordered_products->qty=$cart->qty;
              $ordered_products->price=$cart->total;
            
              $ordered_products->save();
            }
            

            return response()->json(['Payment_completed'=>$payment->payment_id]);
        } else {
            return response()->json(['Payment_failed2'=>'Payment failed.']);
        }
        return response()->redirectTo('/');
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardnumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' =>Auth::user()->id,
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
