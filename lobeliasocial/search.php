<?php
include('db.php');

if(isset($_POST['search']))
{
    $search=$_POST['search'];
    $sql1=mysqli_query($conn,"SELECT * FROM user WHERE name LIKE '%$search%'");
    $data="";
    $data.='<ul class="list-group mt-2 people" >';
    while($people=mysqli_fetch_assoc($sql1))
    {
        $data.='<li class="list-group-item py-1 bg-light" >
        <a href="" class="card-link text-dark">
        <b class="mr-2">'.$people['name'].'</b>
        <small> Live in: '.$people['address'].'</small>
        <img src="img/'.$people['photo'].'" class="rounded-circle float-right" width="50px" height="50px">
        </a>
      </li>
      ';
    }
    $data.=' </ul>

              <br>

              <div class="bg-light posts">';

    $sql2=mysqli_query($conn,"SELECT * FROM post INNER JOIN user ON post.user_id=user.id WHERE post.title LIKE '%$search%' OR post.description LIKE '%$search%'");
    while($posts=mysqli_fetch_assoc($sql2))
    {
        if($posts['post_photo']=="")
        {
            $data.='<div class="media border">
        <a href="" class="card-link text-dark">
        <div class="media-left">
        
          
         
        </div>
        <div class="media-body ml-2">
          <h6 class="media-heading mt-3">'.$posts['title'].'</h6>
          <small>'.substr($posts['description'],0,100).'</small></a><br>

          <a href="" class="text-dark"><small>Posted by : <b>'.$posts['name'].'</b></small>
          <img src="img/'.$posts['photo'].'" height="30px" class="rounded-circle float-right mr-2 mb-1" width="30px">
          </a>
        </div>
        </div>';
        }
        else
        {
            $data.='<div class="media border">
            <a href="" class="card-link text-dark">
            <div class="media-left">
            
              <img src="img/'.$posts['post_photo'].'" class="media-object my-2 ml-2" width="120px">
             
            </div>
            <div class="media-body ml-2">
              <h6 class="media-heading mt-3">'.$posts['title'].'</h6>
              <small>'.substr($posts['description'],0,100).'</small></a><br>
    
              <a href="" class="text-dark"><small>Posted by : <b>'.$posts['name'].'</b></small>
              <img src="img/'.$posts['photo'].'" height="30px" class="rounded-circle float-right mr-2 mb-1" width="30px">
              </a>
            </div>
            </div>';
        }
        
    }
    $data.='</div>';
    echo $data; 
}


?>