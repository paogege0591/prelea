<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;//导入文件上传类
use Think\Page;//导入分页类


class NewsController extends Controller {
    public function index(){
    	$totalRow = M('newsarticles')->count();
    	
    	$page = new Page($totalRow,15);
    	
    	
    	$news = M('newsarticles as n')->field('n.articleid,n.title,n.dateandtime,m.mansname,t.teamNameCn as team1,t1.teamNameCn as team2')
    	->join('managers as m on m.id=n.userid')  //与managers表联查，将新闻表中管理员id换成管理员姓名
    	->join('teams as t on t.teamId=n.teamid') //与teams表联查，将主队id换成主队名字
    	->join('teams as t1 on t1.teamId=n.teamid2')//与teams表联查，将客队id换成主队名 字
    	->order('n.articleid desc')->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('news',$news);
    	$this->assign("pageList",$page->show());
        $this->display();
    }
    
    public function addnews(){
	    	if($_POST){
	    		/* 获取表单传输的基本数据 */
	    		$title = $_POST['title'];
	    		$content = $_POST['content'];
	    		$userid = $_POST['userid'];
	    		$teamid = $_POST['teamid'];
	    		$teamid2 = $_POST['teamid2'];
	    		$data = [
	    			"teamid"=>$teamid,
	    			"teamid2"=>$teamid2,
	    			"userid"=>$userid,
	    			"title"=>$title,
	    			"content"=>$content
	    		];
	    		$model = M('newsarticles');
    		
	    		$model->startTrans();	    		
	    		/* 添加新闻并获取主键值 */
	    		$rst = $model->add($data);
	    		
	    		if($rst){
		    		/* 给图片所在文件夹取名 */
		    		if($_FILES['pic']['name']==NULL){
		    			/* 表单图片为空时，无需上传文件 */
		    			$imagepath='img';
		    			$model->commit();
    					$this->success('新闻上传成功！',U("News/index"));
		    		}else{
		    			//获得文件后缀名
		    			$exts = substr($_FILES['pic']['name'],strrpos($_FILES['pic']['name'],'.'));
		    			// 表单图片不为空时，执行上传文件操作 
		    			$imagepath=str_pad($rst,8,'0',STR_PAD_LEFT).$exts;
		    			//实例化上传类
						$upload = new Upload();
						//设置上传文件的大小
						$upload->maxSize = 5000000;
						//设置允许上传文件的扩展名
						$upload->exts = array("jpg","gif","png");
						//是否生成子目录
						$upload->autoSub = true;
						//设置上传文件的根目录
						$upload->rootPath = "./";
						//设置子目录创建方式
						$upload->subName = array('str_pad', [$rst,8,'0',STR_PAD_LEFT ]);
						//设置保存路径
						$upload->savePath = "public/images/news/";
						//上传文件命名规则
						$upload->saveName =  array('str_pad', [$rst,8,'0',STR_PAD_LEFT ]);
						//多上传文件
						$result = $upload->upload();
						
						if($result)
						{
							$rst2 = $model->where("articleid={$rst}")->save(["imagepath"=>$imagepath]);
			    			if($rst2){
			    				$model->commit();
	    						$this->success('新闻上传成功！',U("News/index"));
			    			}else{
			    				$model->rollback();
	    						$this->success('新闻上传失败！',U("News/index"));
			    			}
						}
						else
						{	
							//获得上传失败的信息
							$errorMsg = $upload->getError();
							$model->rollback();
							$this->success($errorMsg,U("News/index"));
						}
		    		}
		    	}else{
					$model->rollback();
	    			$this->success("新闻上传失败！",U('News/index'));
	    		}
	    }else{
	    	$teams = M('teams')->select();
	    	$this->assign('teams',$teams);
    		$this->display();
    	}
    	
    	
    	
    }
}