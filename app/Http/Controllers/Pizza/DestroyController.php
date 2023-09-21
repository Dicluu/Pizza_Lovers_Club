<?php

namespace App\Http\Controllers\Pizza;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pizza;

class DestroyController extends BaseController
{

    public function __invoke(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizza.index');
    }

}
