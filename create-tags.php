<?php

	require( "./config.php" );

	$fname = $argv[1];

	$instance_ids = file($fname, FILE_IGNORE_NEW_LINES);
	
	echo "instance id list\n";
	print_r( $instance_ids );

//	echo "create tags ok ? (y/n) > ";
//	$stdin = trim( fgets(STDIN), "\n");
//	if ( $stdin == "y" ){
		$i = 0;
		foreach( $instance_ids as $instance_id ){
			$cmd = "aws ec2 create-tags --resources $instance_id --tags Key=Name,Value=".$tags[$i];
			$res = [];
			echo $cmd."\n";
			exec($cmd,$res);
			print_r( $res );
			$i++;
		}
//	}

?>
