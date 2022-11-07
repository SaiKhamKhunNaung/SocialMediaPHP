<?php

include('../db.php');

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="DELETE FROM post WHERE post_id='$id'";
        $sql="DELETE FROM like_data WHERE post_id='$id'";
        $sql="DELETE FROM comment WHERE post_id='$id'";

        $ret=mysqli_query($conn,$sql);

        header("location:../home.php");

    }


?>