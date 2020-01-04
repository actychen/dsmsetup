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

			$cmd = "ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@".$ips[$idx]." 'java -jar tiled-dsm/target/dsm-jar-with-dependencies.jar -port $port";
			if ( $n != "" ) $cmd.= " -a_n $n:$port";
			if ( $e != "" ) $cmd.= " -a_e $e:$port";
			if ( $s != "" ) $cmd.= " -a_s $s:$port";
			if ( $w != "" ) $cmd.= " -a_w $w:$port";
			$cmd.=" -log_filename $ips[$idx].$port -log_interval 5";
			$cmd.=" > $ips[$idx].$port.log' &\n";
			echo $cmd;
			$cmd = "ssh -i ~/.ssh/ec2ymok.pem -o StrictHostKeyChecking=no centos@".$ips[$idx]." 'dstat -a -t --output ~/dstat.$ips[$idx].$port.csv 1 > /dev/null &' &\n";
			echo $cmd;
		}
	}


?>
