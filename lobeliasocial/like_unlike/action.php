<?php
session_start();
include('../db.php');
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $sql=mysqli_query($conn,"SELECT * FROM like_data WHERE user_id='".$_SESSION['id']."' AND post_id='$id'");
    if(mysqli_num_rows($sql)>0)
    {
        mysqli_query($conn,"DELETE FROM like_data WHERE user_id='".$_SESSION['id']."' AND post_id='$id'");
    }
    else{
        mysqli_query($conn,"INSERT INTO like_data (user_id,post_id) VALUES ('".$_SESSION['id']."','$id')");
    }
}


?>