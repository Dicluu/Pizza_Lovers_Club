<?php

namespace App\Http\Controllers\Pizza;
use App\Http\Requests\Pizza\UpdateRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pizza;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Pizza $pizza)
    {
        $data = $request->validated();
        $pizza->update($data);
        return redirect()->route('pizza.index');
    }

}
