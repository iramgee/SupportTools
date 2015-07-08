<?php
include 'main.php';
$a = $GLOBALS['a'];
$dname = $GLOBALS['dname'];
$query = $_POST['search'];
echo "<h2>Device Name: ".$dname."</h2>"
	?>
<table id="myTable" >
<thead>
	<th>Line</th>
	<th>Time</th>
	<th>Details</th>
</thead>
<tbody>
<?php
$index=0;
	foreach ($a as $st){
	$index++;
	   if (strpos($st, $query) !== false) {
		$result = explode(": ",$st);
		$sliced = array_slice($result, 1, count($result));
		$time = substr($result[0], 0, +8);
		echo "<tr><td>".$index."</td><td>".$time."</td>";
		foreach($sliced as $slice){
			echo "<td> ".$slice."</td>";
			$index++;
		}
		echo "</tr>";
	  }

	}   
	?>
</tbody>
</table>

<script>
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script>