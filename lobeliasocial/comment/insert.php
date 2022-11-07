<?php
session_start();
include('../db.php');
if(isset($_POST['post_id']) && isset($_POST['comment']))
{
    $post_id=$_POST['post_id'];
    $comment=$_POST['comment'];
    mysqli_query($conn,"INSERT INTO comment (comment,user_id,post_id) VALUES ('$comment','".$_SESSION['id']."','$post_id')");
}


?>