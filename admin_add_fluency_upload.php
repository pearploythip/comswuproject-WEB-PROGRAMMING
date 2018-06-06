<?php
//photo upload
if(isset($_POST["upload_photo"])){
	$input_name = "photo";
	$set_name = "photo_fluency_";
	if(isset($_GET["menu"])){$get_value = "menu";}
	if(isset($_GET["edit"])){$get_value = "edit";}
	//filename = $set_name + $_GET[$get_value]
	$set_file = "photo_file";
	$get_type1 = "image/png";
	$set_type1 = ".png";
	$get_type2 = "img/jpeg";
	$set_type2 = ".jpg";
	$serv_dir = "pp/img/";
	$xamp_dir = "./img/";
	$set_result = "show_photo";
	$result_incomplete = "<div class=\"alert alert-warning\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong> Failed! </strong></div>";
	include("upload_serv.php");
	
	}
	?>