<?php
echo "hello hello";
$mysqli = mysqli_connect("127.0.0.1", "ayyash", "abc123", "money");

if (mysqli_connect_errno()) {
	printf("Connection Failed: %s\n", mysqli_connect_errno());
	exit();
} else {
	printf("Host Information: %s\n", mysqli_get_host_info($mysqli));
}

?>
