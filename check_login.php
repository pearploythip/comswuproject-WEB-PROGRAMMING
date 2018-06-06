<?php
	session_start();
	include 'sql.php';
	$strSQL = "SELECT * FROM member WHERE 
	Username = '".mysql_real_escape_string($_POST['username'])."' 
	and Password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
	echo "<script> alert ('Username and Password Incorrect!'); location='index.php';</script>";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Username"] = $objResult["Username"];
			$_SESSION["Fullname"] = $objResult["Fullname"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:adminpage.php");
			}
			else
			{
				header("location:index_login.php");
			}
	}
	mysql_close();
?>
