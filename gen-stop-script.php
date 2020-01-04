<?php

	require( "./config.php" );

	$fname = $argv[1];

	$ips = file($fname, FILE_IGNORE_NEW_LINES);

	if ( count( $ips ) != $count ) die( "size of ip list must equal to count" );

	for ( $i = 0; $i < $len; $i++ ){
		for ( $j = 0; $j < $len; $j++ ){
			$idx = $j + $len*$i;
			$cmd = "ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@".$ips[$idx]." \"pgrep -f dsm | xargs kill -KILL\"\n";
			echo $cmd;
			$cmd = "ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@".$ips[$idx]." \"pgrep -f dstat | xargs kill -KILL\"\n";
			echo $cmd;
		}
	}


?>
