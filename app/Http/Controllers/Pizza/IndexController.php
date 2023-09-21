<?php

namespace App\Http\Controllers\Pizza;

use App\Models\Pizza;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke() {
        $pizzas = Pizza::all();
        return view('pizza.index', compact('pizzas'));
    }
}
