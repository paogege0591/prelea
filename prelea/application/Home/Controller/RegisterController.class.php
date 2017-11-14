<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class RegisterController extends Controller {
    public function index(){
    	$teams = M('teams')->select();
    	$this->assign('teams',$teams);
        $this->display();
    }
    
    public function checkname(){
    	$username = $_POST['username'];
    	$rst = M('users')->where("username='{$username}'")->find();
    	if($rst){
    		echo '1';
    	}else{
    		echo '0';
    	}
    }
    
    public function reg(){
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$verify = $_POST['verify'];
    	$hteamid = $_POST['hteamid'];
    	$data = [
    		"username"=>$username,
    		"password"=>$password,
    		"hteamid"=>$hteamid
    	];
    	
    	$checkcode = new Verify();
    	$verst = $checkcode->check($verify);
    	if($verst==0){
    		$this->success("验证码错误！",U("Register/index"));
    	}else{
    		$rst = M('users')->add($data);
    		if($rst){
    			$_SESSION['userMsg'] = M('users')->where("id={$rst}")->find();
    			$this->success("注册成功！",U("Index/index"));
    		}else{
    			$this->success("注册失败！",U("Register/index"));
    		}
    		
    	}
    	
    }
}