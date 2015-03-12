<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="test.php" method="post">
	    <input name="documentID" onmouseover="this.focus();" type="text">
	</form>
	<?php
		require("reader.php"); // php excel reader
		$file="sample.xls";
		$connection=new Spreadsheet_Excel_Reader(); // our main object
		$connection->read($file);
		$startrow=2;
		$endrow=4;
		$col1=3;

		for($i=$startrow;$i<$endrow;$i++){ // we read row to row

		echo $connection->sheets[0]["cells"][$i][$col1]."<br>"; // so we get [2][3] and [3][3]

		}

	?>
</body>
</html>