<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新闻列表主页</title>
	</head>
	<body>
		<table border="1" cellspacing="0" align="center">
			<tr>
				<th>文章ID</th>
				<th>标题</th>
				<th>作者</th>
				<th>主队</th>
				<th>客队</th>
				<th>发表时间</th>
			</tr>
			<?php if(is_array($news)): foreach($news as $k=>$v): ?><tr>
					<td><?php echo ($v["articleid"]); ?></td>
					<td><?php echo ($v["title"]); ?></td>
					<td><?php echo ($v["mansname"]); ?></td>
					<td><?php echo ($v["team1"]); ?></td>
					<td><?php echo ($v["team2"]); ?></td>
					<td><?php echo ($v["dateandtime"]); ?></td>
				</tr><?php endforeach; endif; ?>
			<tr>
        		<td colspan="6" align="center"><?php echo ($pageList); ?></td>
      		</tr>
		</table>
	</body>
</html>