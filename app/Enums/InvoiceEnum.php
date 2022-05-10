<?php
namespace App\Enums;

class InvoiceEnum {
    const STATUS_WAIT = 'wait';
    const STATUS_WAIT_TEXT = 'منتظر پرداخت';

    const STATUS_PENDING = 'pending';
    const STATUS_PENDING_TEXT = 'درحال بررسی';

    const STATUS_PAID = 'paid';
    const STATUS_PAID_TEXT = 'پرداخت شده منتظر ارسال';

    const STATUS_POSTED = 'posted';
    const STATUS_POSTED_TEXT = 'ارسال شده';

    const STATUS_FAILED = 'failed';
    const STATUS_FAILED_TEXT = 'رد شده';


}
