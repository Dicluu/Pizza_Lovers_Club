<?php

namespace App\Http\Controllers\PurchaseItem;
use App\Models\Item;
use App\Models\PurchaseItem;
use Illuminate\Routing\Controller as BaseController;

class DestroyController extends BaseController
{

    public function __invoke(PurchaseItem $item)
    {
        $item->delete();
        return redirect()->route('cart.index');
    }

}
