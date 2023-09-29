<?php

namespace App\Http\Controllers\PurchaseItem;
use App\Http\Requests\PurchaseItem\UpdateRequest;
use App\Models\PurchaseItem;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, PurchaseItem $item)
    {
        $data = $request->validated();

        $this->service->update($data);

        return redirect()->route('cart.index');
    }

}
