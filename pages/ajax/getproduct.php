<?php

$mysqli = new mysqli("localhost", "root", "", "loginsystem");

if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT hsn FROM products WHERE p_id = ?";
//echo $hsn

$stmt = $mysqli->prepare($sql);
$data = stripslashes(mysqli_real_escape_string($mysqli, $_GET['q']));

$stmt->bind_param("s", $data);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($hsn);
$stmt->fetch();
$stmt->close();

echo $hsn;

?>
