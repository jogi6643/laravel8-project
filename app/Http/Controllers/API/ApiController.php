<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function firstapi()
    {
        $arr = [
            'status'=>'Ok',
            "Number"=>22
        ];
        return response()->json($arr,200);
    }

}
