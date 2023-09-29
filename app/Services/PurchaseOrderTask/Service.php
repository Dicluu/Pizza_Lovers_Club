<?php

namespace App\Services\PurchaseOrderTask;

use App\Http\Filters\TaskFilter;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderTask;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Service
{

    public function show($data, $query)
    {
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);


        $tasks = PurchaseOrderTask::filter($filter)->get();

        if (isset($query['comment'])) {
            $order = PurchaseOrder::find($query['id']);
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

    public function update($data, $task) {
        date_default_timezone_set('Europe/Moscow');
        $employee = User::find($data['employee_id']);
        $status = Status::find($data['status_id']);
        $isDrop = false;
        $isEnd = false;

        switch ($data['status_id']) {
            case 4:
                $isDrop = true;
                break;
            case 7:
                $isEnd = true;
        }

        if ($task->employee) {
            $task->update([
                'title' => $task->order->status->title,
                'ended_at' => date("Y-m-d H:i:s")
            ]);
            if (!$isEnd) {
                $order = PurchaseOrderTask::Create([
                    'purchase_order_id' => $task->order->id
                ]);
                if (!$isDrop) {
                    $order->employee()->associate($employee);
                    $order->update([
                        'started_at' => date("Y-m-d H:i:s")
                    ]);
                }
            }

        } else {
            $task->update([
                'started_at' => date("Y-m-d H:i:s")
            ]);
            $task->employee()->associate($employee);
        }
        $task->order->status()->associate($status);
        $task->save();
        $task->order->save();
    }
}
