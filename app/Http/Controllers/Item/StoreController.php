<?php

namespace App\Http\Controllers\Item;

use App\Http\Requests\Item\StoreRequest;
use App\Models\Item;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $item = Item::Create($data);
        return redirect()->route('item.index');
    }
}
