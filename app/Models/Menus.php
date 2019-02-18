<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Support\Facades\DB;

class Menus extends Model{
    public $timestamps = false; //updated_at ,created_at 设置不可用

    public function GetCateMenu($pid){
        return $this->from('admin_menus')->where('pid',$pid)->orderBy('id','desc')->get()->toArray();
    }

    public function Get($id){
        return $this->from('admin_menus as a')
            ->leftJoin('admin_menus as b','a.pid','=','b.id')
            ->where('a.id',$id)
            ->select(['a.*','b.pid as pp_id'])
            ->first()
            ->toArray();
    }

    public function updateMenu($params,$id){
        $this->from('admin_menus')->where('id',$id)->update(
            array(
                'name'=>$params['name'],
                'pid'=>$params['pid'],
                'url'=>$params['url'],
                'status'=>$params['status'],
                'is_del'=>$params['is_del'],
            )
        );
    }



}