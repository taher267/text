<?php 
	if(!isset($_COOKIE["comMer"])){
		header("location:index.php");
	}
 ?>
<?php require_once("header.php") ?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h1>
				<?php 
				if(isset($_COOKIE["comMer"])){
					$comMerTargat=$_COOKIE["comMer"];
					$usrQry="SELECT * FROM myusers WHERE auth='$comMerTargat' AND authU='$comMerTargat' OR auth='$comMerTargat' OR authU='$comMerTargat'";
					$runUsrQry=mysqli_query($connect,$usrQry);
					$usrData=mysqli_fetch_array($runUsrQry);
					if($usrData==true){
						echo $usrData["fName"]." ".$usrData["lName"];
					}
				}


			 ?>
			</h1>
			
			 <p>This is freelancer <?php echo $usrData["mailAdr"]; ?>'s Profile </p>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<table class="table table-striped table-dark">
			  <tbody>
			    <tr>
			      <th scope="row" colspan="2"><center><img id="proPic" src="avatar/<?php echo $usrData["avatar"];?>" alt="Profile Picture"> </center></th> 
			    </tr>
			    <tr>
			      <th scope="row">Full Name</th>
			      <td><?php echo $usrData["fName"]." ".$usrData["lName"];?></td>
			    </tr>
			    <tr>
			      <th scope="row">User Name</th>
			      <td><?php echo $usrData["usrName"];?></td>
			    </tr>
			    <tr>
			      <th scope="row">Mail Address</th>
			      <td><?php echo $usrData["mailAdr"];?></td>
			    </tr>
			    <tr>
			      <th scope="row">Account ID</th>
			      <td>ID-11023</td>
			    </tr>
			    <tr>
			      <th scope="row">Genter</th>
			      <td>Male</td>
			    </tr>
			    <tr>
			      <th scope="row">Edit Profile</th>
			      <td><a href="edit.php">Edit</a></td>
			    </tr>
			  </tbody>
			</table>
		</div>
		<div class="col-md-3"></div>
	
	</div>
</div>

<?php require_once("footer.php") ?>
	
	