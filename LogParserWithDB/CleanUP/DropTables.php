<html>
<head>
<title>Cylance Log Viewer</title>
<link href="https://p6.zdassets.com/hc/settings_assets/296219/200008063/G7faR2ZSJImMkGBe9eEITA-favicon.png" rel="shortcut icon">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<style>
body{
	margin:50px;
}
td{
	padding: 8px;
}
th{
	padding: 8px;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
ul{
    list-style-type: none;
}
#header-container{
    width: 100%;
    height: 50px;
  left: 0px;
  z-index: 50;
  position: fixed;
  top: 0px;
  background-color: #333333;

  
}
#getStats{
  display:none;
  float:right;
  padding-right: 30px;
margin-top: -25px;
}
#header-image{
  margin-left: 50px;

}

</style>
</head>
<body>
<nav class="navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../"><img src="../images/cylance-logo-white-green.png" height="18px" width="auto"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../../EmailSetup/">Emails</a>
        <li><a href="../">Log File Parser</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<a href="../"><--Back</a><br/>
<?php 
	include '../config/config.php';

	// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$res = mysqli_query($conn,"SHOW TABLES");

$tables = array();

while($row = mysqli_fetch_array($res, MYSQL_NUM)) {
    $tables[] = "$row[0]";
}

$length = count($tables);

if($length != 0){
	for ($i = 0; $i < $length; $i++) {
	    $res = "DROP TABLE $tables[$i]";
	    mysqli_query($conn, $res);
	    echo "Successfully removed data for <strong>$tables[$i]</strong><br />";
	}
	exec("cmd /c deleteOldDBLogs.bat");
}
else{
	echo "Nothing to clean up.";
}


?>
</body>
</html>
