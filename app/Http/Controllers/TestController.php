<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function test()
    {
        $to = '09129342383';
        $text ='test';
        $api_key = 'sa860834070:ZJHjI1D9vxgnantqc5NQ7AKdhl8xHDUWTANW';
        $from = '90003002';
        $request = "https://api.sabanovin.com/v1/$api_key/sms/send.json?gateway=$from&to=$to&text=$text";
        Log::info('request---------'.print_r($request,true));
        // error_log('request---------'.print_r($request,true));
        try {
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $request );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $results = curl_exec( $ch );
            Log::info(print_r($results,true));
            // error_log(print_r($results,true));
            curl_close( $ch );
            $results = json_decode( $results );
            Log::info(print_r($results,true));
            // error_log(print_r($results,true));
            $response = false;
            if ( ! empty( $results->status->code ) && $results->status->code == 200 ) {
                Log::info('1111111111111');
                // error_log( '1111111111111');
                return $response = true;//success
            } else if ( ! empty( $results->status->message ) ) {
                Log::info('2222222222');
                // error_log( '2222222222');
                $response = $results->status->code . ":" . $results->status->message;
            } else {
                Log::info('33333333333');
                // error_log( '33333333333');
                $response = $results;
            }
        } catch ( Exception $ex ) {
            return $ex->getMessage();
            Log::info('aaaaaaaaaaaaaaaa');
            // error_log('aaaaaaaaaaaaaaaa');
        }
        return $response;
    }

}
