
<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
$tableName = $_POST['data'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM `$tableName`";

$results = mysqli_query($conn, $sql);

//Loading the file array and device info
$dname = "No name available";
$agentVersion = "No agent info available";
$os = "No OS info available";
$fingerPrint = "No information available";
$oss = array();
	 while($row = mysqli_fetch_assoc($results)) {
         if (strpos($row['Details'], 'device_name') !== false) {
	   	$result = explode("\":\"",$row['Details']);
	   	$sliced = array_slice($result, 4);
		$sliced2 = array_slice($sliced, 0);
		$dname = substr($sliced2[0], 0, -16);
	   
    }
	   if (strpos($row['Details'], 'host_version') !== false) {
		$result = explode("\": \"",$row['Details']);
		$agentVersion = substr($result[1], 0, -2);
	  }
	   if (strpos($row['Details'], 'fingerprint :')  !== false) {
		$result = explode(" : " ,$row['Details']);
		$fingerPrint = substr($result[1], 0, strlen($result[1]));
	  }
	  else if(strpos($row['Details'], 'device_fingerprint') !== false){
	  	$result = explode(": " ,$row['Details']);
		$fingerPrint = substr($result[1], 1, -2);
	  }
	   if (strpos($row['Details'], '"name": ') !== false) {
		$result = explode("\": \"",$row['Details']);
		foreach ($result as $OSys) {
			if (strpos($OSys, 'Windows') !== false) {
				array_push($oss, $OSys);
				$os = substr($oss[0], 0, -3);
			}
		}
		
	  }
	  
	}


//End loading


function getCpuStats(){
		include 'config/config.php';
		$tableName = $_POST['data'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM `$tableName`";
		$results = mysqli_query($conn, $sql);

	 $cpuStats = array();
	 $ioStats = array();
	while($row = mysqli_fetch_assoc($results)) {
	   if (strpos($row['Details'], 'Stats') !== false) {
		$result = explode("|",$row['Details']);
	    $sliced = array_slice($result, 2, 1);
	    foreach($sliced as $slice){
			if ($slice !== "CpuUser%"){
				array_push($cpuStats, $slice);
			}
	    }
	    $sliced = array_slice($result, 17,1);
	    foreach($sliced as $slice){
			if ($slice !== "IoDataBytesPerSec"){
				array_push($ioStats, $slice);
			}
	    }
	  }
	} 
	$maxCpu = max($cpuStats);
	$maxCpuPos = array_search($maxCpu,$cpuStats);
	$CpuAverage = array_sum($cpuStats) / count($cpuStats);
	$maxIo = number_format(max($ioStats));
	$ioAverage = array_sum($ioStats) / count($ioStats);

	echo "<table>
				<tr>
					<td><strong>Max CPU Usage:</strong></td><td> ".$maxCpu."%</td>
				</tr>
				<tr>
					<td><strong>Average CPU:</strong> </td><td>".round($CpuAverage,1)."%</td>
				</tr>
				<tr>
					<td><strong>Max IO:</strong> </td><td>".$maxIo."</td>
				</tr>
				<tr>
					<td><strong>Average IO:</strong> </td><td>".number_format(round($ioAverage,1))."</td>
				</tr>
				</table>
				<em>(Average CPU is calculated from ".count($cpuStats)." CPU measurements)</em><br/><em>(Average IO is calculated from ".count($ioStats)." IO measurements)</em>"; 
}

function showFirstPart($inputid){
	include 'config/config.php';
	$tableName = $_POST['data'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `$tableName`";
	$results = mysqli_query($conn, $sql);
	$statCount = 0;
	$index =0;	
	 while($row = mysqli_fetch_assoc($results)) {
		$index++;
	   if (strpos($row['Details'],'] Stats') !== false) {
	   	$statCount++;
		$result = explode("|",$row['Details']);	
		$sliced = array_slice($result, 1, 10);
		$time = substr($result[0], 0, +8);
		echo "<tr><td>Line ".$index." at ".$time."</td>";
		foreach($sliced as $slice){
			echo "<td> ".$slice."</td>";

				
		}
		echo "</tr>";
	  }

	} 
	echo "<input type='hidden' id='".$inputid."' value='".$statCount."'/>";
}

function showSecondPart(){
	include 'config/config.php';
	$tableName = $_POST['data'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `$tableName`";
	$results = mysqli_query($conn, $sql);

	$index = 0;
	 while($row = mysqli_fetch_assoc($results)) {
		$index++;
	   if (strpos($row['Details'],'] Stats') !== false) {
		$result = explode("|",$row['Details']);
		$sliced = array_slice($result, 11, count($result));
		$time = substr($result[0], 0, +8);
		echo "<tr><td>Line ".$index." at ".$time."</td>";;
		foreach($sliced as $slice){
			echo "<td> ".$slice."</td>";
		}
		echo "</tr>";
	  }

	}
}


function grabData($filter, $explode,$inputid){
	include 'config/config.php';
	$tableName = $_POST['data'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `$tableName`";
	$results = mysqli_query($conn, $sql);

	$index = 0;
	$waived = 0;
	echo "<table class='tablesorter'>
			<thead>
				<th>Line</th>
				<th>Time</th>
				<th>Details</th>
			</thead>
			<tbody>";

		 while($row = mysqli_fetch_assoc($results)) {
			$index++;
		   if (strpos($row['Details'], $filter) !== false) {
			$result = explode($explode,$row['Details']);
			$sliced = array_slice($result, 1, count($result));
			$time = substr($result[0], 0, +8);
			echo "<tr><td>".$index."</td><td>".$time."</td>";
			foreach($sliced as $slice){
				echo "<td> ".$slice."</td>";
				$waived++;
			}
			echo "</tr>";
		  }
		}
		echo "</tbody>
		</table><br/>".$waived." files<input type='hidden' id='".$inputid."' value='".$waived."'/>";
}

function grabDataOR($filter, $filter2, $explode, $ex2, $inputid){

	include 'config/config.php';
	$tableName = $_POST['data'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `$tableName`";
	$results = mysqli_query($conn, $sql);

	$index = 0;
	$waived = 0;
	echo "<table class='tablesorter'>
			<thead>
				<th>Line</th>
				<th>Time</th>
				<th>Details</th>
			</thead>
			<tbody>";
		 while($row = mysqli_fetch_assoc($results)) {
			$index++;
		   if (strpos($row['Details'], $filter) || strpos($row['Details'], $filter2) !== false) {
			$result = preg_split("/($explode|$ex2)/",$row['Details']);
			$sliced = array_slice($result, 1, count($result));
			$time = substr($result[0], 0, +8);
			echo "<tr><td>".$index."</td><td>".$time."</td>";
			foreach($sliced as $slice){
				echo "<td> ".$slice."</td>";
				$waived++;
			}
			echo "</tr>";
		  }
		}
		echo "</tbody>
		</table><br/>".$waived." files<input type='hidden' id='".$inputid."' value='".$waived."'/>";
}

function grabDataOROR($filter, $filter2, $filter3, $explode, $ex2, $ex3, $inputid){

	include 'config/config.php';
	$tableName = $_POST['data'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM `$tableName`";
	$results = mysqli_query($conn, $sql);

	$index = 0;
	$waived = 0;
	echo "<table class='tablesorter'>
			<thead>
				<th>Line</th>
				<th>Time</th>
				<th>Details</th>
			</thead>
			<tbody>";
		 while($row = mysqli_fetch_assoc($results)) {
			$index++;
		   if (strpos($row['Details'], $filter) || strpos($row['Details'], $filter2) || strpos($row['Details'], $filter3) !== false) {
			$result = preg_split("/($explode|$ex2|$ex3)/",$row['Details']);
			$sliced = array_slice($result, 1, count($result));
			$time = substr($result[0], 0, +8);
			echo "<tr><td>".$index."</td><td>".$time."</td>";
			foreach($sliced as $slice){
				echo "<td> ".$slice."</td>";
				$waived++;
			}
			echo "</tr>";
		  }
		}
		$files = $waived/4;
		echo "</tbody>
		</table><br/>".$files." files found and uploaded.<input type='hidden' id='".$inputid."' value='".$files."'/>";
}


mysqli_close($conn);
?>	