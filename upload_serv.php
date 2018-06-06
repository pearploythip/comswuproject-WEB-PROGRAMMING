<?php
if ($_FILES[$input_name]["error"] > 0){
			echo "Error: " . $_FILES[$input_name]["error"] . "<br />"; //check erroe
	  }
	  else{
		//define
		$file_name = $set_name.$_GET[$get_value];
		$file_type = $_FILES[$input_name]["type"];
		$file_temp = $_FILES[$input_name]["tmp_name"];
		$serv_file_dir = $serv_dir;
		
		//change name
		if($file_type==$get_type1) { $file_name=$file_name.$set_type1;}
		else{ if($file_type==$get_type2){ $file_name=$file_name.$set_type2;}}
		$_SESSION[$set_file] = $file_name;
		//cennect serv
		$conn = ftp_connect("10.1.3.40") or die("Could not connect");
		ftp_login($conn,"57102010282","57102010282");
		//change dir
		ftp_chdir($conn,$serv_file_dir);
		//upload
		copy($_FILES[$input_name]["tmp_name"],$xamp_dir.$file_name);
		if (ftp_put($conn,$file_name,$file_temp,FTP_BINARY)){
			if($file_type=="img/png" || $file_type=="img/jpeg"){
				$_SESSION[$set_result]="<div class=\"col-lg-12\"><img src=img/".$file_name." class=\"img-responsive\"/></div>";
			}	
		}else{
			$_SESSION[$set_result]=$result_incomplete;
		}
	  }
?>