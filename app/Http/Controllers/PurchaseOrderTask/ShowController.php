<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Http\Requests\PurchaseOrderTasks\FilterRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ShowController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $query = $request->query();
        return $this->service->show($data, $query);
    }
}
