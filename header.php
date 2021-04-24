<?php session_start(); 
require_once("connect.php");
?>
<?php
if(isset($_COOKIE["comMer"])){
$cookAuth=$_COOKIE["comMer"];
$CkackCookAuth="SELECT * FROM myusers WHERE auth='$cookAuth'";
$runCookAuth=mysqli_query($connect,$CkackCookAuth);
$rowCount=mysqli_num_rows($runCookAuth);
if($rowCount===0){
	setcookie("comMer","",time()-(86400*50));
	header("location:login.php");
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PhP Tutorial</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid" id="headerBg">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				
				<div class="col-md-1"><a href="index.php">Home</a></div>
				
					<?php
						if(!isset($_COOKIE["comMer"])){
						echo '<div class="col-md-1"><a href="signup.php">Sign Up</a></div>';
					}if(isset($_COOKIE["comMer"])){
						echo '<div class="col-md-1"><a href="profile.php">Profile</a></div>';
					}if(!isset($_COOKIE["comMer"])){
						echo'<div class="col-md-1"><a href="login.php">Login</a></div>';
					}if(isset($_COOKIE["comMer"])){ ?>
						<div class="col-md-1" onclick="return confirm('Are you Sure?')"> <?php echo '<a href="logout_core.php">Logout</a>'; ?> </div>
					<?php	}
						
					 ?>
				<?php 
					if(isset($_COOKIE["comMer"])){
						echo '<div class="col-md-2"><a href="cngpwd.php">Change pwd</a></div>';
					}
				 ?>
				
				
				
				
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>