<?php

	require( "./config.php" );

	$fname = $argv[1];

	$ips = file($fname, FILE_IGNORE_NEW_LINES);

	if ( count( $ips ) != $count ) die( "size of ip list must equal to count" );

	$port = 1234;

	for ( $i = 0; $i < $len; $i++ ){
		for ( $j = 0; $j < $len; $j++ ){
			$n = ""; $e = ""; $s = ""; $w = "";
			$idx = $j + $i*$len;
			if ( $i != 0 ) $n = $ips[$idx-$len];
			if ( $i != $len-1 ) $s = $ips[$idx+$len];
			if ( $j != 0 ) $w = $ips[$idx-1];
			if ( $j != $len-1 ) $e = $ips[$idx+1];

			$cmd = "scp -i ~/.ssh/$key_name.pem centos@".$ips[$idx].":/home/centos/dstat.$ips[$idx].$port.csv ./logs/ \n";
			echo $cmd;
			$cmd = "scp -i ~/.ssh/$key_name.pem centos@".$ips[$idx].":/home/centos/logs/\* ./logs/ \n";
			echo $cmd;
		}
	}


?>
