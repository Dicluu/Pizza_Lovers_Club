<?php

namespace App\Http\Controllers\Pizza;

use App\Models\Pizza;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EditController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Pizza $pizza) {
        return view('pizza/edit', compact('pizza'));
    }
}
