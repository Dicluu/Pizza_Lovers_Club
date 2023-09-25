<?php

namespace App\Http\Controllers\PurchaseItem;
use App\Http\Requests\PurchaseItem\UpdateRequest;
use App\Models\PurchaseItem;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pizza;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, PurchaseItem $item)
    {


        $data = $request->validated();
        if ($data['action'] ==='+') {
            $item = PurchaseItem::find($data['item']);
            $item->update(['count' => ($item->count)+1]);
        }
        if ($data['action'] ==='-') {
            $item = PurchaseItem::find($data['item']);
            $item->update(['count' => ($item->count)-1]);
        }

        if ($item->count === 0) {
            $item->delete();
        }

        return redirect()->route('cart.index');
    }

}
