<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;//注意use导入类

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function error_msg($message='操作失败'){
        $result['statusCode'] = "300";
        $result['closeCurrent'] = "false";
        $result['message'] = $message;
        die(json_encode($result));
    }

    public function succeed_msg($message='操作成功',$tabid=''){
        $result['statusCode']="200";
        $result['closeCurrent']="true";
        $result['message']=$message;
        if($tabid){
            $result['tabid']=$tabid;
        }
        $_SESSION['statusCode'] = "200";
        die(json_encode($result));
    }
}
