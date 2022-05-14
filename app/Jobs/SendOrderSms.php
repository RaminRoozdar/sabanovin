<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SendOrderSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admins = DB::table('users')->where('level' , 'admin')->pluck('mobile')->toArray();
        $text = 'مدیر عزیز سفارش جدید ثبت گردید.';
        $mobiles = implode(',', $admins);
        $text = view()->make('partials.typical', ['text'=>$text])->render();
        $client = new Client();
        $response = $client->request('POST', 'https://api.sabanovin.com/v1/sa860834070:ZJHjI1D9vxgnantqc5NQ7AKdhl8xHDUWTANW/sms/send.json', [
            'form_params' => [
                'gateway' => '300071432',
                'to' => $mobiles,
                'text' => $text,
            ]
        ]);
    }
}
