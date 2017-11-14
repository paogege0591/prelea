<?php
namespace Admin\Controller;
use Think\Controller;
class MatchscheduleController extends Controller {
    public function index(){
    	/* 从赛程表中取数据,队伍ID由teams表中多表联查获取 */
        $matches = M("matchschedule")->
        field("a.teamNameCn as aname,b.teamNameCn as bname,matchschedule.*")->
        join("teams as a on hteamId=a.teamID")->
        join("teams as b on vteamId=b.teamId")->select();
        $this->assign("matches",$matches);
        $this->display();
    }
    public function insertmatch(){
    	if($_POST){
    		/* 接受到post传输数据时执行此处 */
    		
    		/* 将表单数据中的年月日等转化为数据库时间戳格式 */
    		foreach($_POST['year'] as $k=>$v){
    			$timestamp[$k]=$_POST['year'][$k].'-'.$_POST['month'][$k].'-'.$_POST['day'][$k].' '.$_POST['hour'][$k].':'.
    						str_pad($_POST['minute'][$k],2,'0').':00'; 
    		}
    		$model = M('matchschedule');
    		
    		/* 添加事物,保证10组数据添加状态一致 */
    		$model->startTrans();
    		$i = 0;
    		foreach($timestamp as $k=>$v){
    			$data = [
    				"roundnum"=>$_POST['roundnum'],
    				"matchtime"=>$timestamp[$k],
    				"hteamId"=>$_POST['hteamId'][$k],
    				"vteamId"=>$_POST['vteamId'][$k]
    			];
    			$rst = $model->add($data);
    			if($rst){
    				$i++;
    			}
    		}
    		if($i==10){
    			/* 10条数据全部添加成功时,提交事物 */
    			$model->commit();
    			$this->success('添加赛程成功！',U("Matchschedule/index"));
    		}else{
    			$model->rollback();
    			$this->success('添加赛程失败！',U("Matchschedule/index"));
    		}
    	}else{
    		/* 未接受到post传输数据，即由赛程主页链接跳转时时执行此处 */
    		$teams=M('teams')->select();
	    	$this->assign('teams',$teams);
	    	$this->display();
    	}
    }
    
    public function update(){
    	if($_GET){
    		
    		/* 由赛程主页链接跳转时执行此处 */
    		$matchId=$_GET['matchId'];
	        $rst=M("matchschedule")->
	        field("a.teamNameCn as aname,b.teamNameCn as bname,matchschedule.*")->
	        join("teams as a on hteamId=a.teamID")->
	        join("teams as b on vteamId=b.teamId")->where("matchId={$matchId}")->select();
		    $this->assign("rst",$rst);
	        $this->display();
	    }elseif($_POST){
	    	
	    	/* 由录入赛果链接跳转时执行此处 */
	    	
	    	/* 获取表单所传数据*/
	    	$htg = $_POST['htg'];
        	$vtg = $_POST['vtg'];
        	$matchId = $_POST['matchId'];
        	
        	/* 根据两队进球数判断各自获得的积分 */
        	if($htg>$vtg){
            	$hts=3;
           	 $vts=0;
       		}
	        else if($htg==$vtg){
	            $hts=1;
	            $vts=1;
	        }
	        else{
	            $hts=0;
	            $vts=3;
	        }
	        
	        /* 录入赛果 */
	        $data=[
	            'hteamgoals'=>$htg,
	            'vteamgoals'=>$vtg,
	            'hteamscore'=>$hts,
	            'vteamscore'=>$vts
	        ];
	        $mrn = M("matchschedule")->where("matchId={$matchId}")->save($data);
	        if($mrn){
	            $this->success('赛果录入成功！',U("Matchschedule/index"));
	        }
	        else{
	            $this->success('赛果录入失败！',U("Matchschedule/index"));
	        }
		}else{
			$this->success('未知错误！',U("Matchschedule/index"));
		}
	    
    }
    
    
    public function updatetime(){
	    if($_GET){
	    	/* 由赛程主页跳转时执行此处 */
	    	
	        $matchId = $_GET['matchId'];
	        $model = M("matchschedule")->where("matchId={$matchId}")->select();
	        $curtime = $model[0]['matchtime'];
	        
	        /* 将数据库中的时间戳分割,视图页面将在不同文本框中分别显示年月日等 */
	        $data1 = explode(' ',$curtime);
	        $datal = explode('-',$data1[0]);
	        $datar = explode(':',$data1[1]);
	        $data = array_merge($datal,$datar);
	        $this->assign("matchId",$matchId);
	        $this->assign("data",$data);
	        $this->display();
	    }elseif($_POST){
	    	/* 由修改页面跳转时执行此处 */
	    	
	    	$matchId=$_POST['matchId'];
	        $year=$_POST['year'];
	        $month=$_POST['month'];
	        $day=$_POST['day'];
	        $hour=$_POST['hour'];
	        $minute=$_POST['minute'];
	        $timestamp = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':00';
	        $data=['matchtime'=>$timestamp];
	        
	        $trn=M("matchschedule")->where("matchId={$matchId}")->save($data);
	        
	        if($trn){
	            $this->success('修改时间成功！',U("Matchschedule/index"));
	        }
	        else{
	        	$this->success('修改时间失败！',U("Matchschedule/index"));
	        }
    	}else{
    		$this->success('未知错误！',U("Matchschedule/index"));
    	}
    }
    
}

















