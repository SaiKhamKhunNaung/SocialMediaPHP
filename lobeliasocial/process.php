<?php
include('db.php');
$output='';

$sql="SELECT * FROM user WHERE name LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
   $output.='<button class="btn btn-outline-info" btn-sm>All</button>
   <button class="btn btn-outline-info" btn-sm>People</button>
   <button class="btn btn-outline-info" btn-sm>Posts</button>';
   while($row=mysqli_fetch_array($result))
   {
       $output .= '<ul class="list-group mt-2"  >

       <li class="list-group-item py-1 bg-light" >
         <a href="" class="card-link text-dark">
         <b class="mr-2">'.$row["name"].'</b>
         <small> Live in: '.$row["address"].'</small>
         <img src="img/'.$row["photo"].'" class="rounded-circle float-right" width="50px" height="50px">
         </a>
       </li>
    </ul> ';
   }
    echo $output;
}
else
{
    echo'Data Not Found';
}
?>