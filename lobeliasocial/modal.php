<!-- ................Create Posts Modal................ -->
<div class="modal fade" id="create_post_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b><i class="fas fa-plus-circle"></i> Create Posts</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="post/insert.php"  enctype="multipart/form-data">
        	<input type="text" name="title" placeholder="Enter Title" class="form-control"><br>
        	<textarea name="description" placeholder="What's on your mind?" class="form-control"></textarea><br>
        	<b>Photo : </b><input type="file" name="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ................Edit Posts Modal................ -->
<div class="modal fade" id="edit_post_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b><i class="fas fa-edit"></i> Edit Posts</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="post/update.php" method="POST" enctype="multipart/form-data" >
          <input type="hidden" class="id" name="id">
          <input type="text" name="title" placeholder="Enter Title" class=" title form-control"><br>
          <textarea name="description" placeholder="What's on your mind?" class=" description form-control"></textarea><br>
          <img src="img/test.jpg" class=" photo w-100">
          <b>Photo : </b><input type="file" name="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-edit"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ---------user -->
<div class="modal fade" id="edit_user">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#333">
      <div class="modal-header">
        <h5 class="modal-title"><b><i class="fas fa-edit text-white"></i>Edit Profile</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="profile_update.php" method="POST" enctype="multipart/form-data" >
          <input type="hidden" class="uuid" name="uuid">
          <input type="text" name="uuname" placeholder="Enter Name" class=" uuname form-control"><br>
          <input type="text" name="uuemail" placeholder="Enter email" class=" uuemail form-control"><br>
          <input type="password" name="uupass" placeholder="Enter Password" class=" uupassword form-control"><br>
          <img src="" class=" photo w-100">
          <b>Photo : </b><input type="file" name="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class=" btn btn-secondary"><i class="fas fa-edit"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- ................Mail Modal................ -->
<div class="modal fade" id="mail_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b><i class="fas fa-envelope-open-text mr-1"></i>Mail Form</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="mail.php">
          <input type="text" name="to" placeholder="To:" class=" to form-control mb-2">
          <input type="text" name="from" placeholder="From" value="<?php echo $user['email'] ?>" class="form-control mb-2">
          <input type="text" name="subject" placeholder="Subject" class=" subject form-control mb-2">
          <textarea name="message" rows="5" placeholder="Message" class=" message form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit"  class="btn btn-secondary"><i class="fas fa-envelope-open-text mr-1"></i>Send</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- ................Search Modal................ -->
<div class="modal fade" id="search_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b><i class="fas fa-search mr-1"></i>Searched Results</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <button class="btn btn-outline-info all_btn" btn-sm>All</button>
        <button class="btn btn-outline-info people_btn" btn-sm>People</button>
        <button class="btn btn-outline-info post_btn" btn-sm>Posts</button> 
        

        <div class="search_area"></div>  

      
       

      
      
      </div>
    </div>
  </div>
</div>
<script>
    $('.all_btn').click(function()
  {
    $('.people,.posts').show();

  });

  $('.people_btn').click(function()
{
  $('.people').show();
  $('.posts').hide();
});

$('.post_btn').click(function()
{
  $('.people').hide();
  $('.posts').show();
});
</script>
