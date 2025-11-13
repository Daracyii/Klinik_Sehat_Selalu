<?php
include '../config/database.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM pasien WHERE id=$id");
header('Location: index.php');
exit;
