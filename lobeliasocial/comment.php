<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<style type="text/css">
	.comment_box{
	border:none;
    resize: none;
    width: 98%;
  	height: 34px;
    outline:none;
    padding:5px 15px;
	}
	.comment_area{
		height: 300px;
		overflow-y: scroll;
	}
	.comment_area::-webkit-scrollbar {
    display: none;
}



	</style>
	<?php include('cdn.php'); ?>

</head>
<body  style="background-color:#222">
<?php include ('nav.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-5">
		<?php
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				$_SESSION['pid']=$id;
				$sql="SELECT * FROM post INNER JOIN user ON post.user_id= user.id WHERE post.post_id='$id' ";
				$ret=mysqli_query($conn,$sql);
				$post=mysqli_fetch_assoc($ret);
			
		?>
			<div class="card border border-dark">
				<div class="card-header"  style="background-color:#333">	
				<a href="" class="card-link text-white">		
					<img src="img/<?php echo $post['photo'] ?>" height="30px" width="30px" class="rounded-circle mr-1">
					<b><?php echo $post['name'] ?></b></a>				
				</div>
				<div class="card-body"  style="background-color:#333">
				<h5 class="text-justify text-white"><?php echo $post['title'] ?></h5>
					<p class="text-justify text-white"><?php echo $post['description'] ?></p>
					<img src="img/<?php echo $post['post_photo'] ?>" width="100%;">
				</div>
			</div>
				<?php } ?>

		</div>
		<div class="col-md-3">
			
			<div class="card border border-dark">
				<div class="card-body text-white" style="background-color:#333">
					<div class="comment_area">

			

					</div>

					<div class="media pt-2 px-3 border-top">
  					<img src="img/<?php echo $user['photo'] ?>" height="35px" width="35px" class="rounded-circle">
  					<div class="media-body">
						  <input type="hidden" class="post_id" value="<?php echo $post['post_id'] ?>">
    					<input class="comment_box ml-2 bg-dark text-white" placeholder="Write a comment..."></input>
  					</div>
				</div>

				</div>
			</div>

		</div>
	</div>
</div>
<script>
$('.comment_box').change(function(){
	var comment=$(this).val();
	var post_id=$('.post_id').val();
	$.ajax({
		url:"comment/insert.php",
		type:"POST",
		data:{comment,post_id},
		success:function()
		{
			$('.comment_box').val("");
		}
	});
});
// -----------------------------------------comment----------------------------------------
$(document).ready(function(){
	$('.comment_area').load('comment/select.php');
		commentRefresh();
});
function commentRefresh()
{

	setTimeout(function() {
		$('.comment_area').load('comment/select.php');
		commentRefresh();
	}, 1000);


}
</script>
</body>
</html>