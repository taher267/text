<?php
if(isset($_COOKIE["comMer"])){
		
		header("location:profile.php"); //
	}
	
?>
<?php require_once("header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="signup_core.php" method="POST">
				<input class="col-md-12" type="text" name="sFName" placeholder="Fast Name">
				<input class="col-md-12" type="text" name="sLName" placeholder="Last Name">
				<input class="col-md-12" type="text" name="sUsrName" placeholder="User Name">
				<input class="col-md-12" type="email" name="sMailAddr" placeholder="Mail Address">
				<input class="col-md-12" type="password" name="sPwd" placeholder="Password">
				<input class="col-md-12" type="submit" value="SIGN UP">
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php require_once("footer.php"); ?>
