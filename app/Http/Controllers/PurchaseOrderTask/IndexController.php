<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Http\Requests\PurchaseOrderTasks\FilterRequest;
use App\Models\PurchaseOrderTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(FilterRequest $request)
    {
            $tasks = PurchaseOrderTask::all();
            return view('task.index', compact('tasks'));
    }
}
