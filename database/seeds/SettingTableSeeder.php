<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings()->set('EMAIL', 'info@sabanovin.net');
        settings()->set('ADDRESS', 'فارس ، شیراز ، خیابان 7 تیر ، نبش کوچه 10 ، ساختمان شیرین عسل ، طبقه سوم');
        settings()->set('SITE_TITLE', 'پرداخت یار صبانوین');
        settings()->set('SITE_DESCRIPTION', 'خدمات تخصصی وب سرویس پیام کوتاه');
        settings()->set('SITE_URL', 'sms.sabanovin.com');
        settings()->set('SITE_URI', 'http://sabanovin.com');
        settings()->set('SITE_URI_SSL', 'https://sabanovin.com');
        settings()->set('SUPPORT_TEL', '07132922');
        settings()->set('FAX', '07132922-2');
        settings()->set('ZIP_CODE', '71345/1135');
        settings()->set('SMS_FA_PRICE', '50');
        settings()->set('SMS_EN_PRICE', '100');
        settings()->set('WHATSAPP', 'https://wa/me/9337288808');
        settings()->set('TELEGRAM', 'https://t.me/RaminR1375');
        settings()->set('INSTAGRAM', 'https://instagram.com/raminroozdar');
        settings()->set('TWITTER', 'https://twitter.com/login?lang=fa');
        settings()->set('LINKEDIN', 'https://www.linkedin.com/');
        settings()->set('FACEBOOK', 'https://www.facebook.com/');




    }
}
