<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Requests\Ingredient\StoreRequest;
use App\Models\Ingredient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $ingredient = Ingredient::Create($data);
        return redirect()->route('ingredient.index');
    }
}
