<?php

namespace App\Http\Controllers\PurchaseOrderTask;

use App\Http\Requests\PurchaseOrder\UpdateRequest;
use App\Models\PurchaseOrderTask;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, PurchaseOrderTask $task)
    {
        $data = $request->validated();

        $this->service->update($data, $task);

        return redirect()->route('task.list');
    }
}
