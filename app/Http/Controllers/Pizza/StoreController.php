<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Requests\Pizza\StoreRequest;
use App\Models\Pizza;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $pizza = Pizza::Create($data);
        return redirect()->route('pizza.index');
    }
}
