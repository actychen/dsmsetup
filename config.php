<?php

	$len = 5;
	$count = $len * $len;
	$image_id = "ami-05275306922a50eef";
	$instance_type = "t2.micro";
	$key_name = "ymok";
	$security_group_id = "sg-0bbcec0ba985248b6";

	$subnet_id = "subnet-8de82ec5";


	$tag = "dsm_node_l5_20200115_00";

	$tags = array();

	for ( $i = 0; $i < $len; $i++ ){
		for ( $j = 0; $j < $len; $j++ ){
			$tags[] = $tag."_".$i."_".$j;
		}
	}

?>
