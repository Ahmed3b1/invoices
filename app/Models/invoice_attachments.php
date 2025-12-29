<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice_attachments extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->belongsTo(invoices::class);
    }

}
