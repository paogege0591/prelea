<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class UserlistController extends Controller {
    public function index(){
        $totalRow = M('users')->count();
        
        /* 调用分页类，显示会员信息 */
        $page = new Page($totalRow,20);
        
        $users = M('users as u')->field('id,username,teamNameCn,articlenum,reviewnum,praisednum,userscore,userlevel,banned,bannedtime')
        ->join('teams as t on u.hteamid=t.teamid')->limit($page->firstRow,$page->listRows)->select();
        
        $this->assign('users',$users);
		$this->assign("pageList",$page->show());
        $this->display();
    }
    
    public function remove(){
        $id=$_GET['id'];
        
        /* 设置封号状态与解封时间 */
        $rst = M('users')->where("id={$id}")->save(["banned"=>0,"bannedtime"=>0]);
        
        if($rst){
            $this->success("解封成功！",U("Userlist/index"));
        }else{
            $this->success("解封失败！",U("Userlist/index"));
        }
    }
    
    public function ban(){
        $id=$_GET['id'];
        
        /* 设置封号状态,解封时间为当前时间的90天之后 */
        $rst = M('users')->where("id={$id}")->save(["banned"=>1,"bannedtime"=>(date('Y-m-d H:i:s',time()+7776000))]);
        if($rst){
            $this->success("封禁成功！",U("Userlist/index"));
        }else{
            $this->success("封禁失败！",U("Userlist/index"));
        }
    }
    
    public function zero(){
        $id=$_GET['id'];
        
        /* 清空会员积分与等级 */
        $rst = M('users')->where("id={$id}")->save(["userscore"=>0,"userlevel"=>1]);
        if($rst){
            $this->success("清零成功！",U("Userlist/index"));
        }else{
            $this->success("清零失败！",U("Userlist/index"));
        }
    }
}

















