<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
