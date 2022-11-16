<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\cart;
use App\Models\ship;
use App\Models\order;
use App\Models\address;
use App\Models\ordered_products;
use Auth;
use Illuminate\Http\Request;
use Omnipay\Omnipay;


class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->middleware('auth');
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            
            $total=cart::select('*')->where('user_id',Auth::user()->id)->sum('total');
            $ship=ship::select('*')->where('id',1)->first();
            $amount=$total+$ship->price;
            $qty=cart::select('*')->where('user_id',Auth::user()->id)->get();
            $request->session()->put('qty', $qty);
              $response = $this->gateway->purchase(array(
                'amount' => $amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->user_id = Auth::user()->id;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
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
              
               return redirect()->route('index_order_details',['id'=>$payment->payment_id]);

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return redirect()->route('checkout');
        }
    }

    public function error()
    {
        return redirect()->route('mycart');   
    }

}
