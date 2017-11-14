<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	
    	$pic6 = M('newsarticles')->where("imagepath!='img'")->order("dateandtime desc")->select();
    	$matchrst = M('newsarticles')->where("teamid2!=21")->order("dateandtime desc")->select();
    	
    	    	
    	
    	
    	
    	
    	
    	
    	$this->assign('matchrst',$matchrst);
    	$this->assign('pic6',$pic6);
        $this->display();
    }
}