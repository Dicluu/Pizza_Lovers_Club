<?php

namespace App\Http\Controllers\Item;
use App\Models\Item;
use Illuminate\Routing\Controller as BaseController;

class DestroyController extends BaseController
{

    public function __invoke(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index');
    }

}
