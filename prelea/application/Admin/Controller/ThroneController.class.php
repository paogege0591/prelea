<?php
namespace Admin\Controller;
use Think\Controller;
class ThroneController extends Controller {
    public function index(){
        $managers = M('managers')->order('level')->select();
        
        $this->assign('managers',$managers);
        $this->display();
    }
    
    public function changelevel(){
    	$c = $_GET['cc'];
    	$id=$_GET['id'];
    	$level=$_GET['level'];
    	
    	/* 根据视图页所传参数执行提升或降低操作 */
    	if($c==1){
    		$rst=M('managers')->where("id={$id}")->save(['level'=>$level*10]);
    		if($rst){
    			$this->success('提升权限成功！',U('Throne/index'));
    		}
    		else{
    			$this->success('提升权限失败！',U('Throne/index'));
    		}
    	}elseif($c==2){
    		$rst=M('managers')->where("id={$id}")->save(['level'=>$level/10]);
    		if($rst){
    			$this->success('降低权限成功！',U('Throne/index'));
    		}
    		else{
    			$this->success('降低权限失败！',U('Throne/index'));
    		}
    	}else{
    		$this->success('未知错误！',U('Throne/index'));
    	}
    	    	
    }
}
