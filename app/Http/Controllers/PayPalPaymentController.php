<?php
  
namespace App\Http\Controllers;
  
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Transaction;
  
class PayPalPaymentController extends Controller
{  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request,$id)
    {
        $plan = Plan::findOrFail($id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
  
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $plan->amount,
                    ]
                ]
            ]
        ]);
  
        if (isset($response['id']) && $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
            return view('payment-cancel');
  
        } else {
            return view('payment-cancel');
        }
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel()
    {
        return view('payment-cancel');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $plan = Plan::where('amount', $amount)->first();
            $user = User::find(auth()->user()->id);
            $user->plan_id = $plan->id;
            $user->plan_status = "active";
            $user->save();

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $amount;
            $transaction->mode = "paypal";
            $transaction->plan_id = $plan->id;
            $transaction->transaction_id = $response['id'];
            $transaction->order_id = '#'.rand(100000, 999999);
            $transaction->status = "completed";
            $transaction->save();
            return 
                view('payment-success')
                ->with(['response'=> $response,'plan'=>$plan]);
        } else {
            return view('payment-cancel');
        }
    }
}