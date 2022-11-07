<?php

if(isset($_POST['to']))
{
    $to=$_POST['to'];
    $from="From: ".$_POST['from'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    mail($to, $subject,$message,$from);
    header("location:friend.php");
}

?>