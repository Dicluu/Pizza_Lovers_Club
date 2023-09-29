<?php

namespace App\Services\PurchaseOrder;

use App\Models\PurchaseOrderDetails;
use App\Models\PurchaseOrderTask;

class Service
{

    public function store($data) {

        $orders = (auth()->user()->cart->orders()->get());
        $order = null;
        foreach ($orders as $item) {
            if ($item->status->id == 1) {
                $order = $item;
                break;
            }
        }

        $data += ['purchase_order_id' => $order->id];
        PurchaseOrderDetails::Create($data);
        $order->update([
            'status_id' => 2
        ]);
        PurchaseOrderTask::Create([
            'purchase_order_id' => $order->id
        ]);

    }


}
