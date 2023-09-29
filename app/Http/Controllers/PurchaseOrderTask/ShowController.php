<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Http\Filters\TaskFilter;
use App\Http\Requests\PurchaseOrderTasks\FilterRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ShowController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);


        $tasks = PurchaseOrderTask::filter($filter)->get();

        if (isset($request->query()['comment'])) {
            $order = PurchaseOrder::find($request->query()['id']);
            $comment = $order->details->comment;
            return view('task.comment', compact('comment'));
        }
        switch (auth()->user()->role->id) {
            case 5:
            case 2:
                $employees = [
                    'cookers' => DB::table('users')->where('role_id', 3)->get(),
                    'couriers' => DB::table('users')->where('role_id', 4)->get(),
                ];
                return view('task.manager', compact('tasks', 'employees'));
            case 3:
                return view('task.cooker', compact('tasks'));
            case 4:
                return view('task.courier', compact('tasks'));
        }
    }
}
