<?php 
	session_start();
	if(!isset($error)){$error=null;}
	include 'sql.php';
	$strSQL = "SELECT * FROM member WHERE Username = '".$_SESSION['Username']."' ";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
			
	if(isset($_POST['submit'])){
		
		if($_POST["Fullname"]!=""){
			$strSQL = "UPDATE member SET Fullname= '".trim($_POST['Fullname'])."' WHERE Username = '".$_SESSION["Username"]."' ";
					$objQuery = mysql_query($strSQL);
			}
		
		
		if($_POST["newPassword"]!="" || $_POST["password"]!="" || $_POST["conformPassword"]!=""){
			if($_POST["newPassword"] != $_POST["conformPassword"]){
			$error .=  "<div class=\"alert alert-warning\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
		<strong>New password not Match!</strong></div>";
			}else{
				if($_POST["password"] != $objResult["Password"]){
					$error .=  "<div class=\"alert alert-danger\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Password incorrect!</strong></div> ";
				}else{
					$strSQL = "UPDATE member SET Password = '".trim($_POST['newPassword'])."' WHERE Username = '".$_SESSION["Username"]."' ";
					$objQuery = mysql_query($strSQL);
				}
			}
		}
			
			
			if($_POST["email"]!="" || $_POST["conformEmail"]!=""){
				if($_POST["email"] != $_POST["conformEmail"]){
					$error .=  "<div class=\"alert alert-warning\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
		<strong>Email not Match!</strong></div>";
				}else{
					$strSQL = "UPDATE member SET Email = '".trim($_POST['email'])."' WHERE Username = '".$_SESSION["Username"]."' ";
					$objQuery = mysql_query($strSQL);
					}
			}
	}

?>>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Recipes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

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

<body>

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
                <a class="navbar-brand" href="index.html">Food Recipes</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
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
               
                        <!-- Indicators -->
                       

                        <!-- Wrapper for slides -->
                       

                        <!-- Controls -->
                        
                 <h1 class="brand-before text-center">
                        <strong>
                        Hello </strong>
						<?php echo $_SESSION["Fullname"] ;
						 ?>
                        
                    </h1>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Food Recipes</h1>
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box"><span class="pull-left"></span>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Edit Profile</strong>
                    </h2>
                    <hr>
                    
                   <form class="login"  method="post" >
     
     <?php echo $error ?>
     <label>Name</label>
     <input name="Fullname" type="text" class="required form-control" placeholder="<?php echo $objResult["Fullname"];?>" autocomplete="off" value="" size="64">
     
     <label>Password</label>
     
     <input type="password" class="required form-control" placeholder="Old Password" name="password" value="">
    
    
     <input type="password" class="required form-control" placeholder="New Password" name="newPassword" value="">

     <input type="password" class="required form-control" placeholder="Conform Password" name="conformPassword" value="">
     
     <label>Email</label>
    
     <input type="text" autocomplete="off" class="required form-control" placeholder="<?php echo $objResult["Email"];?>" name="email" value="">
     
     
     <input type="text" autocomplete="off" class="required form-control" placeholder="New Email" name="conformEmail" value="">
     <br>
     <input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="Save">
     
    </form>
                </div>
            </div>
        </div>
        
        
      

    </div>
    <!-- /.container -->
  
    
    
    
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
				<form method="POST" action="logout.php">
				<button type="submit" name="submit">Logout</button>
				</form>
                    <p>Copyright &copy; PP 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
