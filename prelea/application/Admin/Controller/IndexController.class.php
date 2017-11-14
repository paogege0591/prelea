<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if($_SESSION['mansMsg']!=''){
	        $this->display();
    	}else{
    		$this->success("请先登录！",U("Login/index"));
    	}
    }
}