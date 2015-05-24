<?
$mysqli = mysqli_connect("127.0.0.1", "ayyash", "abc123", "money");

if (mysqli_connect_errno()) {
	printf("Connection Failed: %s\n", mysqli_connect_errno());
	exit();
} else {
	$amount = $_POST['amount'];
	$category = $_POST['category'];
	$reason = $_POST['reason'];
	$recurring = $_POST['recurring'];

	$recurring = $recurring === "YES" ? 1 : 0;

	echo "Amount = ".$amount."<br />";
	echo "Category = ".$category."<br />";
	echo "Reason = ".$reason."<br />";
	echo "Recurring = ".$recurring."<br />";

	$sql = "INSERT INTO money.expenses (amount, category, reason, recurring) VALUES('$amount', '$category', '$reason', $recurring)";

	echo "SQL = ".$sql."<br />";
	$res = mysqli_query($mysqli, $sql);


	if ($res == TRUE) {
		echo "recorded insterted";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}
?>
