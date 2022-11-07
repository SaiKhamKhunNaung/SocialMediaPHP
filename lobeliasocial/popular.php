

<div class="alert pop" style="background-color:#333">
				<b class="text-white">Popular Posts/Authors</b><hr>
		<?php
			$sql4=mysqli_query($conn,"SELECT post_id FROM like_data ");
			$a="";
			while($pop=mysqli_fetch_assoc($sql4))
			{
				$a .=$pop['post_id'].",";
			}
				$b=substr($a,0,-1);
				$d=explode(',',$b);
				
				$c=array_count_values($d);
				arsort($c);
				$e=array_keys($c);
				$f=array_slice($e,0,2);

				foreach ($f as $key=>$value){
					$sql5=mysqli_query($conn,"SELECT post.*,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.post_id='$value'");
					$popular=mysqli_fetch_assoc($sql5);
				
			 
		?>
			<div class="media border border-white-50 mb-2">
				<a href="" class="card-link text-white">
			  <div class="media-left">
				<?php if($popular['post_photo']) {?>
			    <img src="img/<?php echo $popular['post_photo']?>" class="media-object my-2 ml-2" width="120px">
					<?php } ?>
			</div>
			  <div class="media-body ml-2">
			    <h6 class="media-heading mt-3"><?php echo $popular['title']?></h6>
			    <small><?php echo substr($popular['description'],0,100)?></small></a><br>

			    <a href="" class="text-white"><small>Posted by : <b><?php echo $popular['name']?></b></small>
			    <img src="img/<?php echo $popular['photo']?>" class="rounded-circle float-right mr-2 mb-1" width="30px" height="30px">
			    </a>
			  </div>
			</div>
				<?php } ?>

</div>