<?php
include "db_connect.php";

$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");

header("Location: select.php");
exit;
?>
