<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';
    protected $guarded = [];

    public function status() {
        return $this->BelongsTo(Status::class);
    }

    public function items() {
        return $this->hasMany(PurchaseItem::class);
    }


}
