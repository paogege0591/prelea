<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index($articleid){
    	$article = M('newsarticles')->where("articleid={$articleid}")->find();
    	$this->assign('article',$article);
    	$this->display();
    }
}