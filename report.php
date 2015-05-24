<html>

	<head>
		<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		th, td {
			padding: 5px;
		}

		th {
			text-align: left;
		}
		</style>
		<title>
			Finance Report
		</title>
	</head>

	<body>
	<?php
		$mysqli = mysqli_connect("127.0.0.1", "ayyash", "abc123", "money");

		if (mysqli_connect_errno()) {
			printf("Connection Failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$sql = "SELECT * FROM expenses";
			$res = mysqli_query($mysqli, $sql);

			if ($res) {
				echo "<table border='1' style='width:100%'>";
				echo "<tr>";
				echo "<th>";
				echo "Amount";
				echo "</th>";
				echo "<th>";
				echo "Reason";
				echo "</th>";
				echo "<th>";
				echo "Category";
				echo "</th>";
				echo "<th>";
				echo "Recurring";
				echo "</th>";
				echo "</tr>";
				$total_amount = 0;

				while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
					echo "<tr>";
					$reason = $newArray['reason'];
					$amount = $newArray['amount'];
					$category = $newArray['category'];
					$recurring = $newArray['recurring'];
					$total_amount += $amount;

					#echo "The ID is ".$id." For an amount of ".$amount."<br />";
					echo "<td>";
					echo $amount;
					echo "</td>";
					echo "<td>";
					echo $reason;
					echo "</td>";
					echo "<td>";
					echo $category;
					echo "</td>";
					echo "<td>";
					echo $recurring;
					echo "</td>";

					echo "</tr>";
				}
				echo "</table>";
				echo "<h1>";
				echo "Total Amount = ".$total_amount;
				echo "</h1>";

			} else {
				printf("Could not retrieve results: %s\n", mysqli_error($mysqli)); 
			}

		}

		mysqli_free_result($res);
		mysqli_close($mysqli);
	?>
	</body>

</html>
