<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class DestroyController extends BaseController
{

    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

}
