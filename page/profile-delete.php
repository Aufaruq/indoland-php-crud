<?php
require_once "core/connection.php";

$id=$_GET['id'];

$query = "DELETE FROM aufa_users WHERE id='$id'";
$conn->query($query);

header("Location: ?page=adminPanel");

?>
