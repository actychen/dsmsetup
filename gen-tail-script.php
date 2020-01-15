<?php

	require( "./config.php" );

	$fname = $argv[1];

	$ips = file($fname, FILE_IGNORE_NEW_LINES);

	if ( count( $ips ) != $count ) die( "size of ip list must equal to count" );

	$port = 1234;
	for ( $i = 0; $i < $len; $i++ ){
		for ( $j = 0; $j < $len; $j++ ){
			$idx = $j + $len*$i;
			$cmd = "ssh -i ~/.ssh/$key_name.pem -t -o StrictHostKeyChecking=no centos@".$ips[$idx]." \"tail -f $ips[$idx].$port.log\" &\n";
			echo $cmd;
		}
	}


?>
