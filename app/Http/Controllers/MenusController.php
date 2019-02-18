<?php
namespace App\Http\Controllers;

use App\Models\Menus;

class MenusController extends Controller{
    public $DAO;

    public function __construct(){
        $this->DAO = new Menus();
    }

    public function listView(){
        $top_list = $this->DAO->GetCateMenu(0);
        foreach($top_list as $k=>$v){
            $sub_list = $this->DAO->GetCateMenu($v['id']);
            $top_list[$k]['sub_list'] = $sub_list;
            foreach($sub_list as $kk=>$vv){
                $child_list = $this->DAO->GetCateMenu($vv['id']);
                $top_list[$k]['sub_list'][$kk]['child_list'] = $child_list;
            }
        }
        return view('default.menu_list')->with('dataList',$top_list);
    }

    public function editView($id){
        $info = $this->DAO->Get($id);
        if($info['pid']==0){
            $info['pp_id'] = 0;
        }
        $parents = $this->DAO->GetCateMenu($info['pp_id']);
        if($info['pid']==0){
            $parents[] = array("id"=>0, "name"=>"=顶级菜单=");
        }
        return view('default.menu_edit')
            ->with('info',$info)
            ->with('parents',$parents);
    }

    public function doEdit($id){
        if(!isset($_POST['pid']) || !$_POST['name'] || !isset($_POST['status']) || !isset($_POST['is_del'])){
            $this->error_msg("缺少必填项");
        }
        $this->DAO->updateMenu($_POST, $id);
        $this->succeed_msg();
    }


}