<?php

namespace App\Http\Controllers\Ingredient;
use App\Http\Requests\Ingredient\UpdateRequest;
use App\Models\Ingredient;
use Illuminate\Routing\Controller as BaseController;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();
        $ingredient->update($data);
        return redirect()->route('ingredient.index');
    }

}
