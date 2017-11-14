<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class VerifyController extends Controller {
    public function index($length=4){
        //实例化验证码类
		$verify = new Verify();
		//设置字符大小
		$verify->fontSize = 15;
		//验证码中字符的个数
		$verify->length = $length;
		//显示验证码
		$verify->entry();
    }
    
    public function check($checkcode){
    	$verify = new Verify();
		$rst = $verify->check($checkcode);
		if($rst){
			return 1;
		}else{
			return 0;
		}
    }
}