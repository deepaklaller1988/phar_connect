<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Plan;
use App\Models\User;
class PayPalPaymentController extends Controller
{
    public function handlePayment(Request $request, $id)
    {
        $plan =Plan::where('id', $id)->first();
        $user = User::where('id', auth()->user()->id)->first();
        $product = [];
        $product['items'] = [
            [
                'name' => $user->name,
                'price' => $plan->amount,
                'desc'  => $plan->title,
                'qty' => 1
            ]
        ];
  
        $product['invoice_id'] = rand(00000,99999);
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $plan->amount;
  
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
  
        return redirect($res['paypal_link']);
    }
   
    public function paymentCancel()
    {
        return view('payment-cancel');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $plan = Plan::where('amount',$response['AMT'])->first();
            $user = User::find(auth()->user()->id);
            $user->plan_id = $plan->id;
            $user->plan_status = 'active';
            $user->save();
            return view('payment-success',compact('response','user','plan'));
        }else{
            return view('payment-cancel');
        }
    }
}