<?php

include('db.php');
if(isset($_POST['uuname']) || isset($_POST['uupassword']))

{
    $id=$_POST['uuid'];   
    $name=$_POST['uuname'];
    $password=$_POST['uupass'];  
    
 

    $photo=$_FILES['photo']['name'];
    $tmp=$_FILES['photo']['tmp_name'];
    if($photo)
    {
         move_uploaded_file($tmp,"img/$photo");
         mysqli_query($conn,"UPDATE user SET name='$name', password='$password',photo='$photo',modified_date=now() WHERE id='$id'");

    }
    else
    {
        mysqli_query($conn,"UPDATE user SET name='$name', password='$password',modified_date=now() WHERE id='$id'");
    }

header("location:home.php");
}

?>