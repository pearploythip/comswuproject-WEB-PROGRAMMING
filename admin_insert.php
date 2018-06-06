<!DOCTYPE html>

<?php session_start();
$error = ''; // Variable To Store Error Message
$name = '';
$by = '';
$di = '';
$type = '';
$pic = '';
$ing = '';
	if (isset($_SESSION["Username"]))
	 {
		if ($_SESSION["Status"] == 'USER') 
		{
		header("location:index_login.php"); 
		}
	}
	
	
	if(isset($_POST['save'])){
	$_POST["Ingredient"] = str_replace("\n","<br/>",$_POST["Ingredient"]);
	$_POST["Direction"] = str_replace("\n","<br/>",$_POST["Direction"]);
	$err = "";
	$name = $_POST['name'];
	$by = $_POST["credit"];
	$di = $_POST["Direction"];
	$type = $_POST['Type'];
	$ing = $_POST["Ingredient"];
	$error = "";
	
	$target_dir = "./pp/img";
	$target_file = $target_dir . basename($_FILES["myFile"]["name"]);
	$uploadOk = 1;
	
		$ftp_server = "10.1.3.40";
	$ftp_conn = ftp_connect($ftp_server);
	$login = ftp_login($ftp_conn, '57102010282', '57102010282');

	$file = $_FILES["myFile"]["tmp_name"];

	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}

	 chmod ( $_FILES["myFile"]["tmp_name"] , 777 );
	 
	 ftp_pasv($ftp_conn, true);
	 
	 ftp_chdir($ftp_conn,'pp/img');
	//if (ftp_put($ftp_conn, "serverfile.jpg", $file,FTP_BINARY  ))

	$remoteFname = preg_replace('"\.tmp$"', '.jpg',basename($_FILES["myFile"]["tmp_name"]));

	if (ftp_put($ftp_conn, $remoteFname,$file,FTP_BINARY  )) {
		$pic .= $remoteFname;
			
	}
	else
	  {
		$err .= '<li>picture upload false</li>';
	  }
	  
	  
		if (empty($_POST['name']) || empty($_POST['credit']) || empty($_POST['Direction'])|| empty($_POST['Type'])) {
		if (empty($_POST['name'])){
		$error .= "<li>Input name</li>";
		}
		if (empty($_POST['Direction'])){
		$error .= "<li>Input direction</li>";
		}
		if (empty($_POST['Type'])){
		$error .= "<li>Select Type</li>";
		}
	}
	
else {	
$db = new mysqli("10.1.3.40","57102010282","57102010282","57102010282")or die(mysql_error());	
$sql = "INSERT INTO `menu`(`Name`, `By`, `Ingredient`, `Direction`, `Photo`, `Type`) VALUES ('$name','$by','$ing','$di','$pic','$type')";
$result = $db->query($sql) or die(mysql_error());
		if($result) { // query  $result true
			$error = "Insert $name Completed!<br>";
			$err .= 'Picture upload success :'.$remoteFname.' <br>';
			
		} 	
		
		else {
			$error .= "unsuccessful";
		}
	}


	
}

 ?>
 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Recipes</title>

    <!-- Bootstrap Core CSS -->
    <link href="../pp/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../pp/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body onload="myOnloadFunc();" >

    <div class="brand">Food Recipes</div>
    <div class="address-bar">Faculty of Science | Computer Science | Srinakharinwirot University</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="../pp/index.html">Food Recipes</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../pp/index.php">Home</a>
                    </li>
                    <li>
                        <a href="../pp/about.php">About Us</a>
                    </li>
                    <li>
                        <a href="../pp/blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="../pp/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
               
                        
                        
                 <h1 class="brand-before text-center">
                        <strong> Hello </strong>
						<?php echo $_SESSION["Fullname"] ;
						 ?>  
                  </h1>
                    
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                  <h1 class="brand-name">Food Recipes</h1>
                     <h1 class="brand-before text-center">
                        <strong> Admin Manager </strong> 
                    </h1>
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Add Menu</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="../pp/img/cooking2.jpg" alt="">
                    
                    <hr class="visible-xs">
      <?php if (isset($_POST['save'])) {
	echo '<div class="panel panel-warning"><div class="panel-heading"><h4>status</h4><ul>'.$error.$err.'</ul></div></div>';
			}else{
				echo '<br/>';
			} ?> 
    <form action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  method="POST">
     
     <p>
    <label for="photo">Photo:</label>
    <input type="file" name="myFile" id="myFile">
     </p>
     
     <p>
  <label for="name">Name:</label>
  <input name="name" type="text">
</p>
<p>
  <label for="credit">Credit:</label>
  <input type="text" name="credit" id="textfield">
  </p>
    <p>
    <label for="radio">Type :</label>
    <label for="radio">Thai</label>
    <input type="radio" name="Type" value="Thai">
    <label for="radio">International</label>
    <input type="radio" name="Type" value="International">
    </p>
 <p>
    <label for="textarea">Ingredient:<br></label>
<textarea name="Ingredient" cols="40" rows="8" id="textarea"></textarea>
  </p>
  <p>
    <label for="textarea">Direction:<br></label>
<textarea name="Direction" cols="40" rows="8" id="textarea"></textarea>
  </p>

  <p>
    <input type="submit" name="save" id="submit" value="Add">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>
  </form>

                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
               
                        
                        
                 <h1 class="brand-before text-center">
                        <a href="adminpage.php"><strong>Go Back to Admin Page </strong></a></strong>
						
                  </h1>
                    
              
                    
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>
        
        
        
    </div>
                

<!-- /.container --><!-- /.container -->
    
    
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
				<form method="POST" action="../pp/logout.php">
				<button type="submit" name="submit">Logout</button>
				</form>
                    <p>Copyright &copy; PP 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../pp/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../pp/js/bootstrap.min.js"> </script>
    
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    
    
        
    
</script>
</body>

</html>