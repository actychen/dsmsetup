<?php

	require( "./config.php" );

	$fname = $argv[1];

	$instance_ids = file($fname, FILE_IGNORE_NEW_LINES);
	$instance_ids_line = implode( " ", $instance_ids );

	$cmd = "aws ec2 describe-instances --instance-ids $instance_ids_line | jq -r '.Reservations[].Instances[].PrivateIpAddress'";
	exec($cmd,$ips);
	foreach( $ips as $ip ){
		echo $ip."\n";
	}

?>
