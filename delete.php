<?php
session_start();
include("./database/db_conn.php");
 
if(isset($_GET['deleteid'])){
    $id = mysqli_real_escape_string($conn, $_GET['deleteid']);

    $sql = "DELETE FROM register WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    $success = mysqli_stmt_execute($stmt);

    if($success){
        echo "<script>alert('Record Deleted Successfully'); window.location='admin.php';</script>";
    }else{
        echo "<script>alert('Error in Deleting');</script>.";
    }
    
    mysqli_stmt_close($stmt);
}
?>
