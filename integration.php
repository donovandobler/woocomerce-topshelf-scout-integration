<?php
	$db_host = "DB_HOST";
	$db_user = "DB_USER";
	$db_password = "DB_PASSWORD";
	$db_port = "DB_PORT";
	$db = "DB";
	$db_connect = mysqli_connect($db_host, $db_user, $db_password, $db);
	if(!$db_connect) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
//	echo "Success: A proper connection has been made to the MySQL database" . PHP_EOL;
//	echo "Host information: " . mysqli_get_host_info($db_connect) . PHP_EOL;
	if ($result = mysqli_query($db_connect, "SELECT * FROM wpstg2_woocommerce_order_items LIMIT 100")) {
		printf("Select returned %d rows.\n", mysqli_num_rows($result));
		while($row = mysqli_fetch_assoc($result)) {
			foreach($row as $cname => $cvalue) {
				print "$cname: $cvalue\t";
			}
			print "\r\n";
		}
		mysqli_free_result($result);
	}

	mysqli_close($db_connect);
?>
