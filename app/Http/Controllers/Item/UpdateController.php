<?php

namespace App\Http\Controllers\Item;
use App\Http\Requests\Item\UpdateRequest;
use App\Models\Item;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pizza;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Item $item)
    {
        $data = $request->validated();
        $item->update($data);
        return redirect()->route('item.index');
    }

}
