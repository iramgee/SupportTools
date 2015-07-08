
<?php
ini_set('memory_limit', '300M');//add more memory to account for larger files
include 'config/config.php'; 


$fileName = $_POST['data'];


$string = file_get_contents("logFiles/".$fileName, "r");
$myFile = "C:/Program Files (x86)/EasyPHP-DevServer-14.1VC11/binaries/mysql/data/toUpload/".$fileName;
$fh = fopen($myFile, 'w') or die("Could not open: " . mysqli_error());
fwrite($fh, str_replace('\\', "\\\\",$string));
fclose($fh);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$noChar = preg_replace("/[^a-zA-Z0-9]+/","", $fileName);

// sql to create table
$sql = "CREATE TABLE `$noChar` (
Details VARCHAR(900) 
)";

if (mysqli_query($conn, $sql)) {
    echo 'Creating database and querying data...<img src="images/loading-cmd.gif">';
} else {
    echo "Error creating table: " . mysqli_error($conn)." Eh, I'll try anyway... gimme a sec <img src='images/loading-cmd.gif'>";
}




$result = mysqli_query($conn,"LOAD DATA INFILE '$myFile' INTO TABLE `$noChar` FIELDS TERMINATED BY '\n'");
if (!$result) {
    die("Could not load. " . mysqli_error($sql));
}


mysqli_close($conn);
?>

<input type="hidden" id="tableName" value="<?php echo $noChar; ?>" >
<!--loading JQuery-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



<script>
var fileName = document.getElementById('tableName').value;
console.log("Table name: '"+fileName+"'' Now sending to main3.php");
sendTheFile('main3.php', fileName);
</script>

