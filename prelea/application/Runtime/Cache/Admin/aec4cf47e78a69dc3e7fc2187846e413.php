<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后台系统头部</title>
	<link rel="stylesheet" type="text/css" href="/Hbuilder/PremierLeague/public/css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="/Hbuilder/PremierLeague/public/css/common.css"/>
	<style type="text/css">
	.top-body{
		background: url(/Hbuilder/PremierLeague/public/images/top_bg.gif);
	}
	.top-body .subject{
		font-size:36px;
		line-height: 80px;
		color: #fff;	
	}
	.top-body span{
		float:right;
		font-size:14px;
	}
	.top-body b{
		margin-right:10px;
	}
	.top-body a{
		margin-left:10px;
		color:#fff;
	}
	</style>
	<script type="text/javascript">
	  function logout()
	  {
	  		/* 退出登录按钮 */
		  if(confirm("是否退出后台管理系统？")){
			  window.parent.location = "/Hbuilder/PremierLeague/admin.php/Login/logout";
		  }
	  }
	</script>
</head>
<body class="top-body">
  <div class="wrap">
    <h1 class="subject">英糙网后台管理系统<span>您好，<?php echo ($_SESSION['mansMsg']['mansname']); ?>！&nbsp;|<a href="javascript:logout()">退出登录</a></span></h1>
  </div>
</body>
</html>