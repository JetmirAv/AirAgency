<?php
include '../../../databaseConfig.php';
include '../../../models/users.php';
session_start();
/*$_SESSION['deleteSucess'] = null;
$_SESSION['deleteError'] = null;*/

if (isset($_POST['bookId'])) {
    $id=$_POST['bookId'];
    $query = "delete from booked where id = ?";
    $stm = $conn->prepare($query);
    $stm -> execute([$id]);
    
    
}


    
