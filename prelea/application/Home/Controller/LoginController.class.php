<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	session_start();
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$verify = $_POST['verify'];
    	if(A("Verify")->check($verify)){
	    	$rst = M('users')->where("username='{$username}'&&password='{$password}'")->find();
	    	if($rst){
		    	$_SESSION['userMsg']=$rst;
	    		echo '1';
	    	}else{
	    		echo '0';
	    	}
    	}else{
    		echo "-1";
	    }
    }
    
    public function logout(){
    	session_start();
    	$_SESSION = array();
    }
}