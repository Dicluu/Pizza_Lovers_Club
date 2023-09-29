<?php


namespace App\Http\Controllers\Item;


use App\Http\Controllers\Controller;
use App\Services\Item\Service;

class BaseController extends Controller
{

    public $service;

    /**
     * BaseConrtoller constructor.
     * @param $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }


}
