<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Http\Requests\PurchaseOrder\SetRequest;
use App\Http\Requests\PurchaseOrder\UpdateRequest;
use App\Models\PurchaseOrderTask;
use App\Models\Status;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, PurchaseOrderTask $task)
    {
        date_default_timezone_set('Europe/Moscow');
        $data = $request->validated();
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

        return redirect()->route('task.list');
    }
}
