<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="/Hbuilder/PremierLeague/library/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
	$(function() {
		/* 用户名密码非空判定  */
		$('#id').blur(function() {
			if ($('#id').val() == '') {
				$('#tip1')[0].innerHTML = "请输入用户名";
				$('#id').focus();
			}
		});
		
		$('#pwd').blur(function(){
			if ($('#pwd').val() == ''){
				$('#tip2')[0].innerHTML = "密码不能为空";
				$('#pwd').focus();
			}
		})
	})
</script>
<title>后台登录页面</title>
</head>
<body>
	<form action="/Hbuilder/PremierLeague/admin.php/Login/register.html" method="post">
		<table border="1" cellspacing="0" align="center" width="600px">
			<tr>
				<th colspan=3>欢迎登录后台管理系统</th>
			</tr>
			<tr>
				<td>用户名：</td>
				<td><input id="id" type="text" name="mansname"
					placeholder="请输入用户名" /></td>
				<td width="200px" id="tip1"></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input id="pwd" type="password" name="password"
					placeholder="请输入密码" /></td>
				<td id="tip2"></td>
			</tr>
			<tr>
				<td colspan=3><input type="submit"	value="登录"/></td>
			</tr>
		</table>
	</form>
</body>
</html>