<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<?php include('cdn.php'); ?>

<style type="text/css">
	.react{
		display: flex;
	}
	.react div{
		width: 33%;
		text-align: center;
	}
</style>

</head>
<body  style="background-color:#222">
<?php include ('nav.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
	<div class="row">
		<div class="col-md-2">
			<?php include('leftside.php'); ?>
		</div>


		<div class="col-md-5 ">
				<div class="post_friend">
			<div class="card mb-3"  style="background-color:#333">
				<div class="card-header text-white"><b>Create Posts</b></div>
				<div class="card-body">
					
				<div class="media">
				  <img src="img/<?php echo $user['photo'] ?>" width="50px;" height="50px" class="mr-3 rounded-circle" alt="...">
				  <div class="media-body">
				    <textarea class="form-control"  style="background-color:#222" data-toggle="modal" data-target="#create_post_Modal"></textarea>
				  </div>
				</div>

				</div>
				<div class="card-footer ">
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="fas fa-images mr-1"></i>Photo/Video</button>
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="fas fa-plus-circle text-white mr-1"></i>Create</button>
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="far fa-smile mr-1"></i>Feeling/Activity</button>
				</div>
			</div>

			
<!-- ----------------------------------- -->
<?php
				if(isset($_GET['id'])){
				$id=$_GET['id'];
				
					$sql="SELECT * FROM post INNER JOIN user ON post.user_id= user.id WHERE post.user_id='$id' ORDER BY post.post_id DESC ";
					$ret=mysqli_query($conn,$sql);
				} 
				else
				{
					$sql="SELECT * FROM post INNER JOIN user ON post.user_id= user.id ORDER BY post.post_id DESC ";
					$ret=mysqli_query($conn,$sql);	
				}
                while($row=mysqli_fetch_assoc($ret))
                  { 
					
					?>
			<div class="card mb-2"  style="background:#333;">
				<div class="card-header"  style="background:#333;">			
					<a href="" class="card-link text-white" ><img src="img/<?php echo $row['photo']  ?>" width="30px" height="30px" class="rounded-circle mr-1">
					<b><?php echo $row['name'] ?></b></a>				
					<?php if($_SESSION['id'] == $row['user_id']) {  ?>
					<div style="float: right;">
						 <i class=" ebtn fas fa-circle text-warning" data-toggle="modal" data-target="#edit_post_Modal"
						 
						 post_id="<?php echo $row['post_id']?>" 
						 title="<?php echo $row['title']?>" 
						 description="<?php echo $row['description']?>" 
						 photo="<?php echo $row['post_photo']?>" 
						 
						 ></i>


						<a href="post/delete.php?id=<?php echo $row['post_id'] ?>" ><i class="fas fa-times-circle text-danger"></i></a>
					</div>
					<?php } ?>
				</div>
				<div class="card-body text-white"   style="background:#333;">
					<h6><?php echo $row['title'] ?> </h6>
					<p class="text-justify"><?php echo $row['description']   ?></p>
					<?php if($row['post_photo']) { ?>
					<img src="img/<?php echo $row['post_photo']; ?>" width="100%;">
					<?php  } ?>
				</div>
				<div class="card-footer react">
					<div>
						<?php
						  $sql3=mysqli_query($conn,"SELECT * FROM like_data WHERE post_id='".$row['post_id']."' AND user_id='".$_SESSION['id']."'");
						  if(mysqli_num_rows($sql3)>0)
						 {?>
						<i class=" unlike fas fa-thumbs-up text-primary mr-1" post_id="<?php echo $row['post_id']; ?>"></i> 
						<?php } else {?>
							<i class=" like fas fa-thumbs-up mr-1 text-white"  post_id="<?php echo $row['post_id']; ?>"></i>
						<?php } ?>


						<span class="badge badge-light text-white"  style="background:#333;" id="like_area<?php echo $row['post_id']; ?>">
					<?php
							$sql2=mysqli_query($conn,"SELECT * FROM like_data WHERE post_id='".$row['post_id']."'");
							echo mysqli_num_rows($sql2);
					?>
					</span></div>
					<div><a href="comment.php?id=<?php  echo $row['post_id'];?>" class="text-white card-link"><i class="far fa-comment-alt mr-1"></i>Comment</a></div>
					<div class="text-white"><i class="fas fa-share mr-1"></i></i>Share</div>
				</div>
			</div>
			<?php   }?>

			
<!-- --------------------------> 
			</div>
		</div>


		<div class="col-md-3">
			<?php include('popular.php'); ?>	
		</div>

		<div class="col-md-2">
			<ul class="list-group side_right">
				

			 

			</ul>
		</div>
	</div>
</div>

<?php include('modal.php'); ?>
<script>
	$('.ebtn').click(function(){
		var post_id=$(this).attr('post_id');
		var title=$(this).attr('title');
		var description=$(this).attr('description');
		var photo=$(this).attr('photo');

		$('.id').val(post_id);
		$('.title').val(title);
		$('.description').val(description);
		$('.photo').attr('src',"img/"+photo);
	})

	$('.uubtn').click(function(){
		var user_id=$(this).attr('user_id');
		var name=$(this).attr('name');
		var email=$(this).attr('email');
		var password=$(this).attr('password');
		var photo=$(this).attr('photo');
		

		$('.uuid').val(user_id);
		$('.uuname').val(name);
		$('.uuemail').val(email);
		$('.uupassword').val(password);
		$('.photo').attr('src',"img/"+photo);
	})

	$(document).ready(function(){
$('.like').click(function(){
	var id=$(this).attr('post_id');
	$(this).toggleClass('like');
	if($(this).hasClass('like'))
	{
		$(this).removeClass('text-primary');
	}
	else 
	{
		$(this).addClass('text-primary');
	}
	$.ajax({
		url:"like_unlike/action.php",
		type:"post",
		data:{id},
		success:function()
		{
			likeCount(id);
		}
	});
});

$('.unlike').click(function(){
	var id=$(this).attr('post_id');
	$(this).toggleClass('unlike');
	if($(this).hasClass('unlike'))
	{
		$(this).addClass('text-primary');
	}
	else 
	{
		$(this).removeClass('text-primary');
	}
	$.ajax({
		url:"like_unlike/action.php",
		type:"post",
		data:{id},
		success:function()
		{
			likeCount(id);
		}
	});
});
function likeCount(id)
{
	$.ajax({
		url:"like_unlike/count.php",
		type:"POST",
		data:{id},
		success:function(data)
		{
		   $('#like_area'+id).text(data);
		}
	});
}
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