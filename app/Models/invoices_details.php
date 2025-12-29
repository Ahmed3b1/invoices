<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoices_details extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->belongsTo(invoices::class);
    }
}
