<?php
set_time_limit(0);
include_once("../../db/connection.php");

$valid_extensions = array(".jpg", ".png", ".jpeg");
$absolute_path = "../../assets/img";
$size_bytes = 5000000;

if(isset($_FILES["file"]["name"])) {
  $id = $_POST["id"];
  $archive_name = $_FILES["file"]["name"];
  $extension = strrchr($archive_name, '.');
  $sizeArchive = $_FILES['file']['size'];
  $temporary_archive = $_FILES["file"]["tmp_name"];
  $name_new_archive = $id . $extension;
  if($sizeArchive > $size_bytes) {
    die("File must contain a maximum of {$size_bytes} bytes;warning");
  }

  if(!in_array($extension, $valid_extensions)) {
    die("Invalid image file extension;warning");
  }

  if(move_uploaded_file($temporary_archive, "$absolute_path/$name_new_archive")) {
    $sql = "UPDATE contacts SET name  = '{$archive_name}' WHERE id = '{$id}'";
    mysqli_query($connection, $sql);
    echo "./assets/img/{$name_new_archive};completed";
  } else {
    die("The file cannot be sent to the server;error"); 
  }

} else {
  die("Select a jpg, jpeg or png file;warning");
}