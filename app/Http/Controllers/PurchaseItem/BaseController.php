<?php


namespace App\Http\Controllers\PurchaseItem;


use App\Http\Controllers\Controller;
use App\Services\PurchaseItem\Service;

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
