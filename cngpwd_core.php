<?php
require_once("connect.php");
if(!isset($_COOKIE["comMer"])){
		
	header("location:index.php");
};
if(isset($_REQUEST["oldPass"])&& isset($_REQUEST["newPass"]) && isset($_REQUEST["cfmPass"])){
	$getCurrUsr=$_COOKIE["comMer"];
	$old_pwd=htmlentities($_REQUEST["oldPass"]);
	$new_pwd=htmlentities($_REQUEST["newPass"]);
	$cfm_pwd=htmlentities($_REQUEST["cfmPass"]);
	
	$chackOld="SELECT * FROM myusers WHERE auth='$getCurrUsr'";
	$runOldQry=mysqli_query($connect,$chackOld);
	if($runOldQry==true){
		while($currUsrInfo=mysqli_fetch_array($runOldQry)){
			$currUsrMail= $currUsrInfo["mailAdr"];
			$currUsrName= $currUsrInfo["usrName"];
			$currUsrID= $currUsrInfo["id"];
		}
		
	}
	$currAuth=md5(sha1($currUsrMail.$old_pwd));

	
	if($currAuth===$getCurrUsr && $new_pwd===$cfm_pwd){
		$newReqstFrMil=md5(sha1($currUsrMail.$cfm_pwd));
		$newReqstFrUsrNam=md5(sha1($currUsrName.$cfm_pwd));
		
		$cng_info="UPDATE myusers SET pass='$cfm_pwd', auth='$newReqstFrMil', authU='$newReqstFrUsrNam' WHERE id='$currUsrID'";
		$freshPass=mysqli_query($connect,$cng_info);
		if($freshPass==true){
			setcookie("comMer","",time()-(86400*50));
			setcookie("comMer","$newReqstFrMil",time()+(86400*7));
			header("location:cngpwd.php?change_pwd=Password Changed!");
		}
	}else{
			header("location:cngpwd.php?wrong_pwd");
		}
	

	
} 

?>