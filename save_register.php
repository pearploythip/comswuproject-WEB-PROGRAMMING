<!DOCTYPE html>

<?php session_start();
	include 'sql.php';
	/*if (isset($_SESSION["Username"])) {
	header("location:inproceed/index_login.php"); }*/
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
<?php
	include 'sql.php';
	
	if(trim($_POST["user"]) == "")
	{
		echo "Please input your Username!";
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}
	
	if(trim($_POST["pass"]) == "")
	{
		echo "Please input your Password!";
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}	
	if(trim($_POST["name"]) == "")
	{
		echo "Please input your Fullname!";
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}
		
	if($_POST["pass"] != $_POST["cpass"])
	{
		echo "Password and Confirm Password are not Match!";
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}
	
	if(trim($_POST["email"]) == "")
	{
		echo "Please input E-mail!";	
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}	
		if(trim($_POST["agree"]) != "yes")
	{
		echo "Please accept our agreement";
		echo "<br> Go back to <a href='register.php'>Register page</a>";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM member WHERE 
	Username = '".trim($_POST['user'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
			echo "<br> Go back <a href='register.php'>Register page</a>";
	}
	else
	{	
	$strSQL = "SELECT * FROM member WHERE 
	Email = '".trim($_POST['email'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "This Email has already used!";
			echo "<br> Go back <a href='register.php'>Register page</a>";
	}
	
	else
	
	{
		$strSQL = "INSERT INTO member (Username,Password,Email,Fullname) 
		VALUES ('".$_POST["user"]."', 
		'".$_POST["pass"]."','".$_POST["email"]."','".$_POST["name"]."')";
		$objQuery = mysql_query($strSQL);
		
		echo "Register Completed!<br>";		
		echo $_POST["name"] ;
		echo "<br> Go to <a href='index.php'>Home page</a> to Login";
		
	}
	}
	mysql_close();
?>

                    <hr class="tagline-divider">
                </div>
            </div>
        </div>


    </div>
    <!-- /.container -->
  
    
    
    
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
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
