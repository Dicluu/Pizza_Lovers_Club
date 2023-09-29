<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Requests\PurchaseOrderDetails\StoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $this->service->store($data);

        return view('cart.payment_success');
    }
}
