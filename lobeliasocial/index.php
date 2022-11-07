<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<?php include("cdn.php"); ?> 
  <style type="text/css">
html {
  overflow: hidden; /*FF fix*/
  height: 100%;
  font-family: Geneva, sans-serif;
  background: hsl(210, 30%, 0%) radial-gradient( hsl(210, 30%, 20%), hsl(210, 30%, 0%));
}

body {
  margin: 0;
  width: 100%;
  height: 100%;
  text-align: center;
  
  display: flex;
  justify-content: center;
  align-items: center;
}

p {
    margin: 0;
}


/* box ------------------------------------------------------ */

#box {
  padding-bottom: 10px;
  text-align: center;
  min-width: 500px;
  font-size: 3em;
  font-weight: bold;
  -webkit-backface-visibility: hidden; /* fixes flashing */
}


/* flashlight ------------------------------------------------------ */

#flashlight {
  color: hsla(0,0%,0%,0);
  perspective: 80px;
  outline: none;
}


/* flash ------------------------------------------------------ */

#flash {
  display: inline-block;
  text-shadow: #dbe1e0 0 0 1px, #fff 0 -1px 2px, #838383 0 -3px 2px, rgba(0,0,0,0.8) 0 30px 25px;
  transition: margin-left 0.3s cubic-bezier(0, 1, 0, 1);
}
    
#box:hover #flash {
  margin-left: 20px;
  transition: margin-left 1s cubic-bezier(0, 0.75, 0, 1);
}


/* light ------------------------------------------------------ */

#light {
  display: inline-block;
  text-shadow: #111 0 0 1px, rgba(255,255,255,0.1) 0 1px 3px;
}

#box:hover #light {
  text-shadow: #dbe1e0 0 0 4px, #d5dedb 0 0 20px;
  transform: rotateY(-60deg);
  transition: transform 0.3s cubic-bezier(0, 0.75, 0, 1), text-shadow 0.1s ease-out;
}

 /* -------------------------------------------------------------    */
 .thumb {
    width: 400px;
    height: 300px;
    margin: 70px auto;
    perspective: 1000px;
}

.thumb a {
    display: block;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
		url("img/fsfs.webp");
    background-size: 0, cover;
    transform-style: preserve-3d;
    transition: all 0.5s;
}

.thumb:hover a {
    transform: rotateX(80deg);
    transform-origin: bottom;
}
.thumb a:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 36px;
    background: inherit;
    background-size: cover, cover;
    background-position: bottom;
    transform: rotateX(90deg);
    transform-origin: bottom;
}
.thumb a span {
    color: white;
    text-transform: uppercase;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    font: bold 12px/36px "Open Sans";
    text-align: center;
    transform: rotateX(-89.99deg);
    transform-origin: top;
    z-index: 1;
}
.thumb a:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 100px 50px rgba(0, 0, 0, 0.5);
    transition: all 0.5s;
    opacity: 0.15;
    transform: rotateX(95deg) translateZ(-80px) scale(0.75);
    transform-origin: bottom;
}

.thumb:hover a:before {
    opacity: 1;
    box-shadow: 0 0 25px 25px rgba(0, 0, 0, 0.5);
    transform: rotateX(0) translateZ(-60px) scale(0.85);
}
  
  </style>
</head>
<body style="background:url('http://www.ultradrive.com/images/rdx_starfield.jpg');">
<div class="container pt-5">
	<!-- <h1 class="text-center mt-5"><b>WELCOME GAMERS BY GAMERS</b></h1><hr>  -->
  <div id="box">
  <p id="flashlight">
    <span id="flash">SOCIAL</span>
    <span id="light">CLUB</span>
  </p>
</div> 
 
  <div class="d-flex p-3 text-white justify-content-center"> 
	<button class="btn btn-outline-info text-right mr-2" data-toggle="modal" data-target="#registerModal"><i class="fas fa-registered mr-1"></i>Register</button>
	<button class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt mr-1"></i>Login</button>
  </div>

  <!-- <div class="text-center mt-5">
    <img src="img/entry.jpg" class="img-fluid" width="750px" height="100px">
  </div> -->

  <div class="thumb">
	  <a href="#">
		    <span>FOR GAMERS BY GAMERS</span>
	  </a>
</div>
</div>



<!--Register Modal -->
<div class="modal fade" id="registerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Registration Form</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="auth/register.php" enctype="multipart/form-data">
        	<input type="text" name="name" placeholder="Enter Username" class="form-control"><br>
        	<input type="password" name="password" placeholder="Enter Password" class="form-control"><br>
          <input type="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control"><br>
        	<input type="email" name="email" placeholder="Enter email" class="form-control"><br>
        	<input type="number" name="phone" placeholder="Enter Phone Number" class="form-control"><br>
        	<input type="date" name="dob" placeholder="Enter Date of Birth" class="form-control"><br>
        	<input type="radio" name="gender" value="male" checked class="mr-1">Male
        	<input type="radio" name="gender" value="female" class="mr-1">Female<br><br>
        	<input type="file" name="photo"> <br><br>
          <textarea class="form-control" placeholder="Enter Address" name="address"></textarea> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="register" class="btn btn-secondary"><i class="fas fa-registered mr-1"></i>Register</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Login Modal -->
<div class="modal fade" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Login Form</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="auth/login.php">
        	<input type="text" name="name" placeholder="Enter Username" class="form-control"><br>
        	<input type="password" name="password" placeholder="Enter Password" class="form-control"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-sign-in-alt mr-1"></i>Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>