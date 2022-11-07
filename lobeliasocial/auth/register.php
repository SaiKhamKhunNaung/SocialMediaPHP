<?php
include('../db.php');
if(isset($_POST['register']))
{
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$cpassword=$_POST['cpassword'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$password=$_POST['password'];
// $hash_password=hash('md5',$password);

$gender=$_POST['gender'];

$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
if($photo)
{
    move_uploaded_file($tmp,"../img/$photo");
}
else if(empty($photo))
{
    $photo = "empty.png";
    
}

$sql=mysqli_query($conn,"SELECT * FROM user WHERE name='$name'");
    if(mysqli_num_rows($sql)>0) 
    {
        //username already exist
        echo"<script>alert('Email already exist');window.location.href='../index.php' </script>";
    }
    else if ($password==$cpassword)
    {
       //insert
       $sql="INSERT INTO user (name,password,cpassword,email,phone,dob,gender,photo,address,created_date,modified_date) 
       VALUES ('$name','$password','$cpassword','$email','$phone','$dob','$gender','$photo','$address',now(),now())";
        mysqli_query($conn,$sql);
        echo"<script>alert('Sucessfully Registered,Please Login');window.location.href='../index.php' </script>";
       
    }
    else
    {
        //password do not match
        echo"<script>alert('password do not much');window.location.href='../index.php' </script>";
    }

}

?>