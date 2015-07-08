<?php
if( $_FILES['file']['name'] != "" ) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "<strong>Upload:</strong> " . $_FILES["file"]["name"] . "<br>";
    echo "<strong>Type:</strong> " . $_FILES["file"]["type"] . "<br>";
    echo "<strong>Size:</strong> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    if (file_exists("logFiles/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "logFiles/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "logFiles/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}
?>
