<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lbs;
use App\Models\Location;
use Yajra\DataTables\Facades\DataTables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

class LbsController extends Controller
{
    public function lbs()
    {
        $allLocations= Location::select('id' , 'name')
        ->get();
        return view('frontend.page.lbs',compact('allLocations'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'count' => 'required',
            'message' => 'required',
        ]);
        $count = replaceDecimalDot($request->count);
        $start_time = $request->start_time;
        $item = new Lbs();
        $item->user_id = Auth()->id();
        if( $request->scenario == 'login'){
            $item->scenario = 'ورود';
        }else{
            $item->scenario = 'خروج';
        }
        $locations = $request->input('locations');
        $loc = implode(' - ', $locations);
        $item->location = $loc;
        $item->message = $request->message;
        $item->start_date = $request->start_date;
        $item->end_date = $request->end_date;
        $item->strat_time = $start_time;
        $item->end_time = $request->end_time;
        $item->days = $request->days;
        $item->count = $count;
        $item->status = 'nok';
        if($request->language == 'fa')
        {
            $item->language = 'فارسی';
            $amount = $count * settings()->get('SMS_FA_PRICE') * $request->messageCount;
        }else{
            $item->language = 'انگلیسی';
            $amount = $count * settings()->get('SMS_EN_PRICE') * $request->messageCount;
        }
        $item->amount = $amount;
        $item->message_count = $request->messageCount;
        $item->save();
        return view('frontend.lbs.factor',compact('item','start_time'));
    }

    public function payment($id, Request $request)
    {
             $item = Lbs::find($id);
             $amount = $item->amount*10;
             $price = get_real_amount($amount);
             $bank = 'ZARINPAL';
             Session::put('item_id', $item->id);
              try {
                  $gateway = Gateway::{$bank}();
                  $gateway->setCallback(url('/lbs/payment/callback'));
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
        $item_id = Session::get('item_id');
        try {
            $isOk = 1;
            $msg = "پرداخت با موفقیت انجام شد.";
            $gateway = Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            if ($isOk == 1){
                DB::table('lbs')->where('id', $item_id)->update(['status' => 'ok']);
                session()->forget('item_id');
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

    public function list()
    {
        return view('frontend.lbs.list');
    }

    public function data()
    {
        $items= Lbs::select('*')->where('user_id' , Auth::id())->where('status','!=','nok')->get();
        return DataTables::of($items)
        ->addColumn('scenario', 'admin.lbs.scenario')
        ->addColumn('status', 'admin.lbs.status')
        ->make(true);
    }
}
