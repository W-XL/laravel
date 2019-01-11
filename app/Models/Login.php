<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Login extends Model{
    protected $table = 'admins';
    public $timestamps = false;

    public function getUserAccount($account){
//        return $this->where('account',$account)->first()->toArray();
        return $this->from('admins as a')
                    ->leftJoin('admins_relation_tb as b','a.id','=','b.user_id')     //左连接
                    ->whereRaw('a.is_del =? and a.account = ?',[0,$account])    //多个条件
                    ->select(['a.*','b.type'])       //取指定的值
                    ->first()                   //获取一条数据
                    ->toArray();                //结果返回数组
    }

    public function doLoginLog($usr_name, $pwd, $desc, $ip, $browser, $usr_id = 0){
        return $id = $this->from('admin_login_log')->insertGetId(
                ['usr_id' => $usr_id,
                'usr_name' => $usr_name,
                'desc' => $desc,
                'time' => date('Y-m-d H:i:s'),
                'ip' => $ip,
                'browser' => $browser,
                'pwd' => md5($pwd)]
        );
    }

    public function getPermissionsInfo($usr_id){
        return $this->from('admin_permissions')->where('usr_id',$usr_id)->first()->toArray();
    }

    public function getModuleList(){
        return $this->from('admin_menus')->whereRaw('status=0 and mid<>0 and is_del=0')->orderBy('mid','asc')->get()->toArray();
    }

    public function getMenuList($pid){
        return $this->from('admin_menus')->whereRaw('status=0 and pid=? and is_del=0',$pid)->get()->toArray();
    }

    public function loginLog($id,$ip){
        $this->from('admins')->where('id',$id)->update(
            array(
                'last_login'=>time(),
                'last_ip'=>$ip,
                'last_service_time'=>time()
            )
        );
    }

    public function getUserInfo($user_id){
        $userInfo = $this->from('admins')->where('id',$user_id)->first();
        if($userInfo){
            $userInfo = $userInfo->toArray();
        }
        return $userInfo;
    }

    public function updateUserActive($user_id,$time){
        $this->from('admins')->where('id',$user_id)->update(
            array(
                'last_service_time'=>$time
            )
        );
    }

    public function updateRelationInfo($user_id){
        $this->from('admins_relation_tb')->where('user_id',$user_id)->update(['is_online' => 2]);
    }
}