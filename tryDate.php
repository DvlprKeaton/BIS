<?php


		date_default_timezone_set("Asia/Manila");
		$regTime = date("d/m/Y - l - h:i:sa", strtotime(' + 7 days'));
		echo $regTime;

?>