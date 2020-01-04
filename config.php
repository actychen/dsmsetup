<?php

	$len = 2;
	$count = $len * $len;
	$image_id = "ami-0ae67124027d8102d";
	$instance_type = "t2.micro";
	$key_name = "ec2ymok";
	$security_group_id = "sg-0af76c0be3b5d69d2";
	$subnet_id = "subnet-090299c0796b8df0f";

	$tag = "exp_l4_dracena_node";

	$tags = array();

	for ( $i = 0; $i < $count; $i++ ){
		$tags[] = $tag."_$i";
	}

?>
