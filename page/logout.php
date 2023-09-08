<?php
 require_once "core/connection.php";
session_start();
session_destroy();

header("Location: index.php?");


?>
