<?php
	mysql_connect("10.1.3.40","57102010282","57102010282") or die("<center><h1 style=\"color:#E9A72B;\">SERVER FAILED</h1></center>");
	mysql_select_db("57102010282");
	$strSQL = "SELECT * FROM menu ORDER BY Name ASC";
	$objQuery = mysql_query($strSQL) or die ("<center><h1 \">QUERY FAILED</h1></center>");

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog </title>

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

    <div class="brand">Food Recipes </div>
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
                <a class="navbar-brand" href="index.html">Food Recipe</a>
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
                 
                 <h1 class="brand-before text-center">
                       
                  <?php if(isset($_SESSION["Fullname"])){
						 echo $_SESSION["Fullname"] ;
				}?>  
                  </h1>
                  <h1 class="brand-before text-center">
       <a href="userthai_list.php">Thai Menu List</a><br>
                   
   <a href="userinter_list.php">International Menu List</a> 
                    </h1>
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>
    
    
    
    
    
<?php
            while($objResult = mysql_fetch_array($objQuery))
            {
				$src = "img/".$objResult["Photo"];
            ?>
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h1 class="intro-text text-center">
                      <strong><?php echo $objResult["Name"]; ?></strong>
                        Recipe
                  </h1>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                 <img class="img-responsive img-border img-full" src="<?php echo $src; ?>" alt="">
                  <h4><?php echo $objResult["By"];
				   ?>
                      <br>
                    </h4>
            <form method="post" action="show.php">
            <input type="hidden" name="menu" value ="<?php echo $objResult["Idmenu"]; ?>" >
            <input type="submit" name="submit" value="Readmore">
                    </form>
                    <hr>
                     <?php
			}
			?>
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

</body>

</html>
