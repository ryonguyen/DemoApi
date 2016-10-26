<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function  success($data)
    {
        return response()->json(['code' => '0', 'msg' => 'success', 'data'=>$data]);
    }

    public function failed(){
        return response()->json(['code' => 400, 'msg' => 'unknown error']);
    }
    public function failedCode($code,$msg){
        return response()->json(['code' => $code, 'msg' => $msg]);
    }
}
