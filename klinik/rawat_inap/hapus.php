<?php
include '../config/database.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM rawat_inap WHERE id=$id");
header('Location: index.php');
exit;
