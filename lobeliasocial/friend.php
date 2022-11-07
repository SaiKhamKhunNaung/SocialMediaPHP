<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<?php include('cdn.php'); ?>

<style type="text/css">
	.side_left li,.side_right li{
		background:#F7F7F7;
	}
	.react{
		display: flex;
	}
	.react div{
		width: 33%;
		text-align: center;
	}
</style>

</head>
<body style="background:#222;">
<?php include ('nav.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
	<div class="row">
		<div class="col-md-2">
			<?php include('leftside.php'); ?>
		</div>
		<div class="col-md-5" >
			<div class="post_friend" >
	<ul class="list-group" >
	<?php
	 $limit=2;
	 $page=ceil($friend/$limit);
	//  -------------------
	 $start=0;
	 if(isset($_GET['id']))
	 {
		 $id=$_GET['id'];
		 $start=($id-1)*$limit;
	 }
	 else
	 {
		 $id=1;
	 }
	 $sql1=mysqli_query($conn,"SELECT * FROM user WHERE id!='".$_SESSION['id']."' LIMIT $start,$limit");

	 while($friend_list=mysqli_fetch_assoc($sql1)){
	// -------------------
	?>
  <li class="list-group-item" style="background-color:#333">
  	<a href="" class="card-link text-white">
  	<b class="mr-2"><?php echo $friend_list['name'] ?></b>
  	<small> Live in: <?php echo $friend_list['address'] ?></small>
  	<div class="float-right">
  	<img src="img/<?php echo $friend_list['photo'] ?>" class="rounded-circle" width="50px" height="50px">
  	</a>
  	<button class=" mbtn btn btn-outline-dark btn-sm text-white" email=<?php echo $friend_list['email'] ?> data-toggle="modal" data-target="#mail_Modal"><i class="fas fa-envelope-open-text"></i> Mail</button>
  	</div>
  </li>
  <?php } ?>
</ul>

<ul class="pagination justify-content-center mt-4" >
	<?php if($id>1) {  ?>
    <li class="page-item" ><a class="page-link" href="?id=<?php echo $id-1; ?>">Previous</a></li>
	<?php } ?>
	<?php  for($i=1;$i<=$page;$i++) {  ?>
    <li class="page-item"><a class="page-link" href="?id=<?php  echo $i; ?>"><?php echo $i; ?></a></li>
    <?php  }  ?>
	<?php if($id < $page) { ?>
    <li class="page-item"><a class="page-link" href="?id=<?php echo $id+1; ?>">Next</a></li>
	<?php } ?>
</ul>
		</div>
		</div>


		<div class="col-md-3">
			<?php include('popular.php'); ?>	
		</div>

		<div class="col-md-2">
			<ul class="list-group side_right" >
				
			</ul>
		</div>
	</div>
</div>

<?php include('modal.php'); ?>
<script>
	$('.mbtn').click(function(){
		var email=$(this).attr('email');
		

		$('.to').val(email);
		
	});

	// ---------active-------------
	$(document).ready(function(){
	$('.side_right').load('online.php');
		onlineRefresh();
});
function onlineRefresh()
{

	setTimeout(function() {
		$('.side_right').load('online.php');
		onlineRefresh();
	}, 1000);


}
</script>
</body>
</html>