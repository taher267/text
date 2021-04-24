<?php if(isset($_COOKIE["comMer"])){header("location:profile.php");}else{header("location:login.php");
}?>
<?php
require_once("connect.php");
if(isset($_REQUEST["logMail"])&& isset($_REQUEST["logPwd"])){
	$logMail_adr=htmlentities($_REQUEST["logMail"]);
	$log_pwd=htmlentities($_REQUEST["logPwd"]);
	$authUsr=htmlentities(md5(sha1($logMail_adr.$log_pwd))); // Mail & pass
	$chackMail="SELECT * FROM myusers WHERE mailAdr='$logMail_adr' OR usrName='$logMail_adr'";
	$runMailQry=mysqli_query($connect,$chackMail);
	$rowMailCount=mysqli_num_rows($runMailQry);

	if($rowCntMailAdAuth>1){
			header("location:login.php?more_usr");
		}elseif($rowMailCount===1){
		$mailAndAuth="SELECT * FROM myusers WHERE mailAdr='$logMail_adr' AND auth='$authUsr' OR authU='$authUsr'";
		$runMailAndAuth=mysqli_query($connect,$mailAndAuth);
		$rowCntMailAdAuth=mysqli_num_rows($runMailAndAuth);
		if($rowCntMailAdAuth===1){
			setcookie("comMer",$authUsr,time()+(86400*7));
			header("location:profile.php");
		}
	}
	if($rowCnt_usr_authU>1){
			header("location:login.php?more_usr");
		}elseif($rowMailCount===1){
		$usr_AuthU="SELECT * FROM myusers WHERE usrName='$logMail_adr' AND authU='$authUsr' AND authU='$authUsr'";
		$run_usr_authU=mysqli_query($connect,$usr_AuthU);
		$rowCnt_usr_authU=mysqli_num_rows($run_usr_authU);

		if($rowCnt_usr_authU===1 && $rowCntMailAdAuth===1){ // It Will be AND gate and and make sure to varify auth===1
			while($authData=mysqli_fetch_array($run_usr_authU)){
				echo $authToAuthU=$authData["auth"];
				setcookie("comMer",$authToAuthU,time()+(86400*7));
			header("location:profile.php");
			}
		}
		}else{
		header("location:login.php?wrong_info");
		}
}
