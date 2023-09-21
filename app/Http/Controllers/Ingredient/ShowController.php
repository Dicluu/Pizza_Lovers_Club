<?php

namespace App\Http\Controllers\Ingredient;

use App\Models\Ingredient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ShowController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Ingredient $ingredient) {
        return view('ingredient.show', compact('ingredient'));
    }
}
