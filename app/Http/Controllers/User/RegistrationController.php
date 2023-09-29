<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RegistrationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        return $this->service->registration($data);
    }
}
