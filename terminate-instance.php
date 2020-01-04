<?php

	require( "./config.php" );

	$fname = $argv[1];

	$instance_ids = file($fname, FILE_IGNORE_NEW_LINES);
	$instance_ids_line = implode( " ", $instance_ids );
	
	echo "instance id list\n";
	print_r( $instance_ids );

	echo "start ok ? (y/n) > ";
	$stdin = trim( fgets(STDIN), "\n");
	if ( $stdin == "y" ){
		$cmd = "aws ec2 terminate-instances --instance-ids $instance_ids_line | jq '.TerminatingInstances[] | {InstanceId, CurrentState: .CurrentState.Name, PreviousState: .PreviousState.Name}'";
		exec($cmd,$res);

		$i = 0;
		foreach( $instance_ids as $instance_id ){
			$out = $res[$i + 1].$res[$i + 2].$res[$i+3]."\n";
			echo $out;
			$i+=5;
		}
	}

?>
