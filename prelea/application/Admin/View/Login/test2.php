<?php
	echo "insert users(mansname,password,hteamid) value</br>";
	for($j=0;$j<5;$j++){
				
		for($i=1;$i<21;$i++){
			echo "('team{$i}圈主{$j}','123456',{$i}),</br>";
		}
	}
?>