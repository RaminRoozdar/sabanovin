<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\Product;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Larabookir\Gateway\Gateway;
use Larabookir\Gateway\Exceptions\InvalidRequestException;
use Larabookir\Gateway\Exceptions\NotFoundTransactionException;
use Larabookir\Gateway\Exceptions\PortNotFoundException;
use Larabookir\Gateway\Exceptions\RetryException;
use Larabookir\Gateway\Irankish\IrankishException;
use Larabookir\Gateway\JahanPay\JahanPayException;
use Larabookir\Gateway\Mellat\MellatException;
use Larabookir\Gateway\Parsian\ParsianErrorException;
use Larabookir\Gateway\Pasargad\PasargadErrorException;
use Larabookir\Gateway\Paypal\PaypalException;
use Larabookir\Gateway\Sadad\SadadException;
use Larabookir\Gateway\Saman\SamanException;
use Larabookir\Gateway\Zarinpal\ZarinpalException;


class CartController extends Controller
{
    public function information()
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach($cart as $details)
        {
            $total += $details['amount'] * $details['quantity'];
        }
        if($total <= 0)
        {
            session()->flash('color', 'warning');
            session()->flash('message', 'سبد خرید شما خالی می باشد.');
            return redirect()->back();
        }
        if(Auth::guest()) {
            session()->flash('color', 'warning');
            session()->flash('message', 'برای تکمیل سفارش نیاز است شما در سایت ثبت نام کنید لذا ابتدا فرم زیر را تکمیل کنید، در صورتی که پیش تر در سایت ثبت نام کردید از گزینه ورود استفاده نمایید');
            return redirect()->route('register');
        } else {
            $provinces = Province::all();
            if(Auth::user()->province_id) {
                $cities = City::where('province_id', Auth::user()->province_id)->get();
            } else {
                $cities = City::where('province_id', $provinces->first()->id)->get();
            }
            return view('frontend.cart.information',compact('provinces','cities'));
        }
    }

    public function store_information(Request $request)
    {

        // $mobile = preg_replace('~^[0\D]++|\D++~', '', $request->mobile);
        $request->validate([
            // 'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'zip_code' => 'required|numeric',
            'address' => 'required|string',
            'city_id' => 'required|numeric',
            'province_id' => 'required|numeric',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        // $user->mobile = $request->mobile;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->city_id = $request->city_id;
        $user->province_id = $request->province_id;
        $user->active = 'yes';
        $user->save();
        return redirect()->route('payment');

    }

    public function payment(Request $request)
    {
        //payment
        $cart = session()->get('cart');
        $total = 0;
        foreach($cart as $details)
        {
            $total += $details['amount'] * $details['quantity'];
        }
        $amount = $total.'0';
        $price = get_real_amount($amount);
//        $price = addVat($price);
        $bank = 'ZARINPAL';
        try {
            $gateway = Gateway::{$bank}();
            $gateway->setCallback(url('/cart/payment/callback'));
            $gateway->price($price)->ready();
            $refId =  $gateway->refId();
            $transID = $gateway->transactionId();
            return $gateway->redirect();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function callback(Request $request)
    {
        $isOk = 0;
        $msg = null;
        $trackingCode = null;
        try {
            $isOk = 1;
            $msg = "پرداخت با موفقیت انجام شد.";
            $gateway = Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            if ($isOk == 1){
                $invoice=new Invoice();
                $invoice->user_id = Auth()->user()->id;
                $invoice->save();
                $cart = session()->get('cart');
                foreach($cart as $details)
                {
                    $invoice_item = new InvoiceItems();
                    $invoice_item->invoice_id = $invoice->id;
                    $invoice_item->product_id = $details['id'];
                    $invoice_item->quantity = $details['quantity'];
                    $invoice_item->save();
                    $product = Product::findOrFail($details['id']);
                    $product->count -= $details['quantity'];
                    $product->save();

                }

            }
            return view('frontend.shop.callback', compact( 'msg','isOk' , 'trackingCode'));
        } catch (IrankishException $e) {
            $msg = $e->getMessage();
        } catch (SaderatException $e) {
            $msg = $e->getMessage();
        } catch (PayirReceiveException $e) {
            $msg = $e->getMessage();
        } catch (SadadException $e) {
            $msg = $e->getMessage();
        } catch (MellatException $e) {
            $msg = $e->getMessage();
        } catch (SamanException $e) {
            $msg = $e->getMessage();
        } catch (ZarinpalException $e) {
            $msg = $e->getMessage();
        } catch (PasargadErrorException $e) {
            $msg = $e->getMessage();
        } catch (ParsianErrorException $e) {
            $msg = $e->getMessage();
        } catch (PaypalException $e) {
            $msg = $e->getMessage();
        } catch (JahanPayException $e) {
            $msg = $e->getMessage();
        }catch (RetryException $e) {
            $msg = $e->getMessage();
        } catch (PortNotFoundException $e) {
            $msg = $e->getMessage();
        } catch (InvalidRequestException $e) {
            $msg = $e->getMessage();
        } catch (NotFoundTransactionException $e) {
            $msg = $e->getMessage();
        } catch (Exception $e) {
            $msg = $e->getMessage();
        }
        return view('frontend.shop.callback', compact( 'msg'));
    }

}
