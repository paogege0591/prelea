<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/prelea/public/css/reset.css" />
<link rel="stylesheet" href="/prelea/public/css/common.css" />
<link rel="stylesheet" href="/prelea/public/css/main.css" />
<title></title>
</head>
<body>
	<script src="/prelea/library/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
  //退出登陆
	function logout()
	{
		if(confirm("是否退出登陆？")){
			$.ajax({
				type:"post",
				url:"/prelea/index.php/Login/logout",
				success:function(){
					window.location.reload();
				}
			});
		}
	}
  function reload(obj)
  {
  	obj.src="/prelea/index.php/Verify/index";
  }
	
	$(function(){
		$('#login-form').hide();
		$('#login').click(function(){
			$('#login-form').slideDown();
			$('<div></div>').appendTo($(document.body)).attr('id','mask');	
		});
		$('#close-button').click(function(){
			$('#login-form').slideUp(400,function(){
				$('#mask').remove();					
			});
		});
		$('#register').click(function(){
			window.location="/prelea/index.php/Register/index";
		});
		$('#sub').click(function(){
			var username = $("#username").val();
	  	var password = $("#password").val();
	  	var verify = $('#verify').val();
	  	
		  //验证
		  if(username == ""){
			  alert("请输入用户名！");
			  $("#username").focus();
		  }
		  else if(password == ""){
			  alert("请输入密码！");
			  $("#password").focus();
		  }else if(verify == ""){
	  		alert("请输入验证码！");
			  $("#verify").focus();
	  	}else{
		  	$.ajax({
		  		type:"post",
		  		url:"/prelea/index.php/Login/index",
		  		data:"username="+username+"&password="+password+"&verify="+verify,
		  		success:function(re){
		  			if(re == 0){
						  alert("用户名或密码不正确！");
					  }else if(re == -1){
					  	alert("验证码错误！");
					  }
					  else{
					  	window.location.reload();
			  		}
					}
		  	});
		  }
			
		})
	})
</script>

<!-- 登录表单，点击登录后出现 -->
<?php if($_SESSION['userMsg']==null): ?><div id="login-form">
	<div id="close-button-container"><span id="close-button">X</span></div>
		<table>
			<tr>
				<td>用户名</td>
				<td><input type="text"  id="username"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password"  id="password" /></td>
			</tr>
			<tr>
				<td>验证码</td>
				<td><input type="text" id="verify" /></td>
				<td><img src="/prelea/index.php/Verify/index" onclick="reload(this)"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="button" value="提交" id="sub"/></td>
			</tr>
		</table>
</div><?php endif; ?>
<!-- 导航栏 -->
<div class="topnavi">
	<div class="top">
		<div class="top-left">
			<a href="#"><img src="/prelea/public/images/img/prelogo.jpg" style="float:left;height:40px;margin-right:10px"/></a>
			<a href="#"><img src="/prelea/public/images/img/logo2.jpg" style="float:left;height:30px;margin:5px 10px"/></a>
			<ul>
				<li><a href="/prelea/index.php/Index/index">首页</a></li>
				<li><a href="#">圈子</a></li>
				<li><a href="#">数据</a></li>
				<li><a href="#">专栏</a></li>
			</ul>
		</div>
		<div class="top-right">
			<?php if($_SESSION['userMsg']!=null): ?><span class="top-right-greet1">您好，</span><span class="top-right-greet2"><?php echo ($_SESSION['userMsg']['username']); ?></span>
				<a href="javascript:logout()" class="top-right-logout">退出登录</a>
			<?php else: ?>
				<a href="#" id="login" class="top-right-login">登录</a>
				<a href="#" id="register" class="top-right-register">注册</a><?php endif; ?>
		</div>
	</div>
</div>
<br /><br />
	<div name="title" class="area">
		<h1><?php echo ($article["title"]); ?></h1>
	</div>
	<hr />
	<div name="content" class="area">
		<?php echo ($article["content"]); ?>
	</div>
	
	<div class="area foot">
	<p>email:2359871550@qq.com&nbsp;&nbsp;|&nbsp;&nbsp;TEL:15581600303</p>
	<p>Copyright &copy;1992-2017&nbsp;Yid·<a href="/prelea/admin.php">Z</a>hou,All Rights Reserved</p>
</div>
</body>
</html>