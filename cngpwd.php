<?php
if(!isset($_COOKIE["comMer"])){
		
	header("location:index.php"); //
	}
	
?>
<?php require_once("header.php"); ?>

<div class="container">
	<div class="row">
		
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<center>
			<b style="color: green;">
				<?php 
					if(isset($_REQUEST["change_pwd"])){
						echo $_REQUEST["change_pwd"];
					}elseif (isset($_REQUEST["wrong_pwd"])) {
						echo "<span style='color: red;'>Old password or new password and confirm passwprd didn't match!</span>";
					}

				 ?>
			</b>
			</center>
		</div>
		<div class="col-md-3"></div>	
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="cngpwd_core.php" method="POST">
				<input class="col-md-12" type="text" name="oldPass" placeholder="Old Password">
				<input class="col-md-12" type="text" name="newPass" placeholder="New Password">
				<input class="col-md-12" type="text" name="cfmPass" placeholder="Confirm Password">
				<input class="col-md-12" type="submit" value="PASSWORD CHANGE">
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php require_once("footer.php"); ?>
