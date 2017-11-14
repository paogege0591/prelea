<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){
    	$teams = M('teams')->select();
    	$this->assign('teams',$teams);
        $this->display();
    }
    public function add(){
    	$title = $_POST['title'];
    	$content = $_POST['content'];
    	echo $title,"<hr>";
    	echo $content;
    }
}