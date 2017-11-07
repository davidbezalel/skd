<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $apiresponse;
    public function __construct()
    {
        $this->apiresponse = new ApiResponse();
    }

    function isPost()
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
            return true;
        }
        return false;
    }

}
