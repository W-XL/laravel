<?php
namespace App\Http\Controllers;

use App\Models\Login;
//use View;
class HomeController extends Controller{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public $DAO;

    public function __construct() {

        $this->DAO = new Login();
    }

    public function index(){
        $user_info = $this->DAO->getUserInfo(session('usr_id'));
        if(empty($user_info) || $_COOKIE['token'] != $user_info['token']){
            header("location:/login");
        }else{
            //        return view('default.index')->with('name',array('id'=>111));    将数据传到视图层
            return view('default.index');
        }
    }

    public function login(){
        return view('default.login');
    }

    public function do_login(){
        //删除session
        session()->forget('login_error_msg');
        if($this->user_pwd_check()){
            header("location:/");
        }else{
            header("location:/login");
        }
    }

    public function user_pwd_check(){
        $account = $_POST["account"];//账号
        $password = $_POST["user_pwd"]; //密码
        $md5_pwd = md5($password);
        $user_info = $this->DAO->getUserAccount($account);
        if(!$user_info){
            return false;
        }
        if($user_info['type'] == 1){
//            session(['key' => 'value']);     这种也可以存储
            session()->put('login_error_msg','用户已被停用，无法登录');
            return false;
        }

        //如果加密后的密码和数据库里的相同 则返回true
        if(strtolower($md5_pwd)!= strtolower($user_info['usr_pwd'])){
            if($user_info){
                session()->put('login_error_msg','密码错误，请重新输入');
                $this->DAO->doLoginLog($account, $password, '密码错误', $this->clientIp(), $_SERVER['HTTP_USER_AGENT'],$user_info['id']);
                return false;
            }else{
                session()->put('login_error_msg','用户名不存在，请重新输入');
                $this->DAO->doLoginLog($account, $password, '用户名错误', $this->clientIp(), $_SERVER['HTTP_USER_AGENT']);
                return false;
            }
        }else{
            $menu_arr="";
            $perm_arr="";
            if($user_info['id']){
                $perm_info = $this->DAO->getPermissionsInfo($user_info['id']);
                $menu_arr =explode(',',$perm_info['module']);
                $perm_arr=explode(",",$perm_info['permissions']);
            }
            //获取菜单列表
            $m_list = $this->DAO->getModuleList();
            foreach($m_list as $key=>$data){
                if(!in_array($data['id'],$menu_arr)){
                    unset($m_list[$key]);
                    continue;
                }
                $p_menu_list = $this->DAO->getMenuList($data['id']);
                foreach($p_menu_list as $i=>$list){
                    if(!in_array($list['id'],$menu_arr)){
                        unset($p_menu_list[$i]);
                        continue;
                    }
                    $menu_list = $this->DAO->getMenuList($list['id']);
                    foreach($menu_list as $j=>$cList){
                        if(!in_array($cList['id'],$menu_arr)){
                            unset($menu_list[$j]);
                            continue;
                        }
                    }
                    $p_menu_list[$i]['c_menu']=$menu_list;
                }
                $m_list[$key]['p_menu']=$p_menu_list;
            }

            //保存用户名到session
            setcookie("token", $user_info['token'], time()+86400);
            session()->put('usr_name',$user_info['usr_name']);
            session()->put('usr_id',$user_info['id']);
            session()->put('real_name',$user_info['real_name']);
            session()->put('group_id',$user_info['group_id']);
            session()->put('last_ip',$user_info['last_ip']);
            session()->put('menu_list',$m_list);
            session()->put('perm_arr',$perm_arr);
            $this->DAO->loginLog($user_info['id'],$this->clientIp());
            $this->DAO->doLoginLog($account, $password, '登录成功', $this->clientIp(), $_SERVER['HTTP_USER_AGENT'],$user_info['id']);
            return true;
        }
    }

    public function clientIp(){
        $ip=false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }

    public function do_logout(){
        $this->DAO->updateUserActive(session('usr_id'), 0);
        if(session('group_id') == 2 || session('group_id') == 3){
            $this->DAO->updateRelationInfo(session('usr_id'));
        }
        session()->forget('usr_name');
        session()->forget('usr_id');
        session()->forget('real_name');
        session()->forget('group_id');
        session()->forget('last_ip');
        session()->forget('menu_list');
        session()->forget('perm_arr');
        header("location:/login");
    }
}
