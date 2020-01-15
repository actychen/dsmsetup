<?php

	require( "./config.php");
	
$cmd = "aws ec2 run-instances --image-id $image_id --count $count --instance-type $instance_type --key-name $key_name --security-group-ids $security_group_id --subnet-id $subnet_id --block-device-mappings '[{\"DeviceName\":\"/dev/sda1\",\"Ebs\": { \"VolumeSize\":8, \"DeleteOnTermination\":true,\"VolumeType\":\"gp2\" }}]' | jq -r '.Instances[].InstanceId'";

	exec($cmd,$instance_ids);

	foreach( $instance_ids as $instance_id ){
		echo $instance_id."\n";
	}

?>
