<?php
require_once("connect.php");
if(isset($_REQUEST["sFName"])&& isset($_REQUEST["sLName"]) && isset($_REQUEST["sUsrName"]) && isset($_REQUEST["sMailAddr"])&& isset($_REQUEST["sPwd"])){
	$snF_name=htmlentities($_REQUEST["sFName"]);
	$snL_name=htmlentities($_REQUEST["sLName"]);

	$snUsr_name=htmlentities($_REQUEST["sUsrName"]);

	$sMail_adr=htmlentities($_REQUEST["sMailAddr"]);
	$sn_pwd=htmlentities($_REQUEST["sPwd"]);
	$authMail=htmlentities(md5(sha1($sMail_adr.$sn_pwd))); // Mail & pass
	$authUserNm=htmlentities(md5(sha1($snUsr_name.$sn_pwd))); // User Name & pass

	$chackMail="SELECT * FROM myusers WHERE mailAdr='$sMail_adr'";
	$runMailQry=mysqli_query($connect,$chackMail);
	$countMail=mysqli_num_rows($runMailQry);

	$chackUsrNm="SELECT * FROM myusers WHERE usrName='$snUsr_name'";
	$runUsrNmQry=mysqli_query($connect,$chackUsrNm);
	$countUsrNm=mysqli_num_rows($runUsrNmQry);
	
	if($countMail===1 OR $countUsrNm===1){		
		header("location:signup.php?mail_exist");
	}elseif($countMail>1 OR $countUsrNm>1){
		header("location:signup.php?more_usr");
	}elseif($countMail===0 OR $countUsrNm===1){		
		$signConfirm="INSERT INTO myusers (fName,lName,usrName,mailAdr,pass,auth,authU) VALUES ('$snF_name','$snL_name','$snUsr_name','$sMail_adr','$sn_pwd','$authMail','$authUserNm')";
		$runSgnQry=mysqli_query($connect,$signConfirm);
		if($runSgnQry==true){
			header("location:wel.php?sgnConf");
		}
	}
}








?>