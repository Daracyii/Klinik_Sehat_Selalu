<?php
include '../config/database.php';
$id = intval($_GET['id'] ?? 0);
if ($id) {
    mysqli_query($conn, "DELETE FROM dokter WHERE id=$id");
}
header('Location: index.php');
exit;
