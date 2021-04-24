<?php require_once("header.php"); ?>
<?php 
	if(isset($_COOKIE["comMer"])){
		header("location:profile.php");
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="login_core.php" method="POST" class="form"><br/> 
				<input class="col-md-12" type="text" name="logMail" placeholder="Enter email or user name"> <br/>  <br/>
				<input class="col-md-12" type="password" name="logPwd" placeholder="Password"> 
				<br/> <br/>
				<input class="col-md-12" type="submit" value="Login"> <br/> <br/>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php require_once("footer.php"); ?>
