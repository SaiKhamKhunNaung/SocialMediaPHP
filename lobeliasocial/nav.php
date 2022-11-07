<?php
 include('db.php');
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM user WHERE id='".$_SESSION['id']."'");

 $user=mysqli_fetch_assoc($sql);

 if(!$_SESSION['id']){
   header("location:index.php");
 }
?>
<nav class="navbar navbar-expand-lg shadow-sm navbar-light container-fluid fixed-top" style="background:#333;">
<div class="container">
  <a class="navbar-brand" href="home.php">
    <img src="img/logooo.png" style="width:45px;">
    <b class="text-white">Gaming</b> <sub><small class=" font-weight-bold text-white" >Social</small></sub></a>
  <i class="far fa-list-alt navbar-toggler left_side_btn"></i>
  <i class="fas fa-users navbar-toggler right_side_btn"></i>
  <i class="fas fa-fire navbar-toggler pop_btn"></i>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="home.php"><img src="img/<?php echo $user['photo']; ?>" class="rounded-circle mr-1" width="30px;" height="30px;"><?php echo $user['name']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-user-friends"></i></a>
      </li>
      <li class="nav-item">
        <i data-toggle="modal" data-target="#create_post_Modal" class="nav-link text-white fas fa-plus-circle mt-1"></i>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-bell"></i></a>
      </li>
       
  
      <li class="nav-item dropdown">
        <a class="nav-link font-weight-bold text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
        </a>
        <?php $query=mysqli_query($conn,"SELECT * FROM user WHERE id='".$_SESSION['id']."'");
              $uurow=mysqli_fetch_assoc($query)?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class=" uubtn dropdown-item"  data-toggle="modal" data-target="#edit_user"
           user_id="<?php echo $uurow['id'];  ?>"
           name="<?php echo $uurow['name'];  ?>"
           email="<?php echo $uurow['email'];  ?>"
           password="<?php echo $uurow['password']; ?>"
           photo="<?php echo $uurow['photo']; ?>"
          
          >Profile Update</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="auth/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white"><input type="" name="search_text"  placeholder="Search Here" class="mr-1 search_input" style="display: none; width: 300px;border:none;outline: none;border-bottom: 1px solid #aaa;"><i class="fas fa-search search_btn"></i></a>
      </li>
      
      

  </div>

</div>
</nav>

<script type="text/javascript">
  $('.search_btn').click(function(){
    $('.search_input').toggle('slow');
  });
  $('.left_side_btn').click(function(){
    $('.side_left').toggle();
  })
  $('.right_side_btn').click(function(){
    $('.side_right').toggle();
    $('.post_friend').toggle();
  })
  $('.pop_btn').click(function(){
    $('.pop').toggle();
    $('.post_friend').toggle();
  })

  $('.search_input').change(function(){
    var search= $(this).val();

    $.ajax({
      url:"search.php",
      type:"POST",
      data:{search},
      success:function(data)
      {
        $('.search_area').html(data);
        $('#search_Modal').modal('show');
      }

    });
  });


</script>