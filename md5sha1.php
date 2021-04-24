<?php //require_once("header.php") ?>
<?php 

$Mail="al@gmail.com";
$usrName="alam267";
$pwd="3333";
 echo "auth=".$combind=md5(sha1($Mail.$pwd));
 echo "<br/>";
 echo "authU=".$combind=md5(sha1($usrName.$pwd));

 ?>
	
	