
<?php
require_once("connect.php");?>
<?php 
if(isset($_REQUEST["up_fName"])&& isset($_REQUEST["up_lName"])){
	$currUser=$_COOKIE["comMer"];
	$f_name=htmlentities(ltrim($_REQUEST["up_fName"]));
	$l_name=htmlentities(ltrim($_REQUEST["up_lName"]));
	//$avadarName=$_FILES["avatar"]["name"];
	$avadarTmp=$_FILES["proPic"]["tmp_name"];
	$locatio="avatar/";
	$NameFordb=uniqid();
	
	$chackUser="SELECT * FROM myusers WHERE auth='$currUser'";
	$runUsrQry=mysqli_query($connect,$chackUser);
	//$usrDitail=mysqli_fetch_array($runUsrQry);
	if($runUsrQry==true){
		move_uploaded_file($avadarTmp,$locatio."$NameFordb.jpg");
		
		$usrUpRequist="UPDATE myusers SET fName='$f_name',lName='$l_name', avatar='$NameFordb.jpg' WHERE auth='$currUser'";
		$runUpdtQry=mysqli_query($connect,$usrUpRequist);
		if($runUpdtQry==true){
			header("location:profile.php?Data_updated");
		}
	}
	
}

 ?>

	