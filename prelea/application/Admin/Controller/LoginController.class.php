<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    
    /* 登录验证 */
    public function register(){
        $mansname = $_POST['mansname'];
        $password = $_POST['password'];
        
        $rst = M('managers')->where("(mansname='{$mansname}') & (password='{$password}')")->find();
        if($rst){
        	/* 保存登录信息到session中 */
            session_start();
            $_SESSION['mansMsg'] = $rst;
            $this->success("后台登录成功！",U("Index/index",array()));
        }else{
            $this->success("后台登录失败！",U("Login/index",array()));
        }
    }
    
    public function logout(){
    	session_start();
    	$_SESSION = [];
    	$this->success("退出成功！",U("Login/index"));
    }
}