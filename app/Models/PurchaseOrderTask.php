<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderTask extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function employee() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}
