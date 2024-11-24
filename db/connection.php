<?php
  include("config.php");

  $connection = mysqli_connect(SERVER, USER, PASSWORD,DB) or die("Connection with server failed!" .  mysqli_connect_error());