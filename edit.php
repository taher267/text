<?php require_once("header.php"); ?>
<?php 
	if(isset($_COOKIE["comMer"])){
		$currentUsr=$_COOKIE["comMer"];
		$chackUser="SELECT * FROM myusers WHERE auth='$currentUsr'";
		$runChackQry=mysqli_query($connect,$chackUser);
		if($runChackQry==true){
			$usrData=mysqli_fetch_array($runChackQry);
			
			
		}
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form enctype="multipart/form-data" action="edit_core.php" method="POST" class="form"><br/> 
				<input class="col-md-12" value=" <?php echo $usrData["fName"]; ?> " type="text" name="up_fName"> <br/>  <br/>
				<input class="col-md-12" value=" <?php echo $usrData["lName"]; ?> " type="text" name="up_lName"> 
				<br/> <br/>
				<input class="col-md-12" type="file" name="proPic"> 
				<br/> <br/>
				<input class="col-md-12" type="submit" value="Update"> <br/> <br/>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php require_once("footer.php"); ?>
