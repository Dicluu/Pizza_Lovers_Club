<?php

namespace App\Http\Controllers\PurchaseItem;

use App\Http\Requests\PurchaseItem\StoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $query = $request->query();
        return $this->service->store($data, $query);
    }
}
