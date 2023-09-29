<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DetailsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(PurchaseOrderTask $task)
    {
        $details = $task->order->details;
        $order = $task->order;
            return view('task.order-details', compact('details', 'order'));
    }
}
