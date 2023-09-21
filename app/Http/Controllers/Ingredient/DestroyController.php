<?php

namespace App\Http\Controllers\Ingredient;
use App\Models\Ingredient;
use Illuminate\Routing\Controller as BaseController;

class DestroyController extends BaseController
{

    public function __invoke(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredient.index');
    }

}
