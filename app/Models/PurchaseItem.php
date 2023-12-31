<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $table = 'purchase_items';
    protected $guarded = [];

    public function item() {
        return $this->BelongsTo(Item::class);
    }

}
