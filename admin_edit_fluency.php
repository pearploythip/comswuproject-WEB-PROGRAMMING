<!DOCTYPE html>

<?php session_start();
	
	if (isset($_SESSION["Username"]))
	 {
		if ($_SESSION["Status"] == 'USER') 
		{
		header("location:index_login.php"); 
		}
	}

mysql_connect("10.1.3.40","57102010282","57102010282")  or die("<center><h1 style=\"color:#E9A72B;\">SERVER FAILED</h1></center>");
mysql_select_db("57102010282");
include("admin_add_fluency_upload.php");
if(isset($_GET["edit"])){
		//load log file
		
			$strSQL = "SELECT * FROM menu WHERE Idmenu ='".$_GET["edit"]."'";
			$objQuery = mysql_query($strSQL) or die(mysql_error());
			$objResult = mysql_fetch_array($objQuery);
			
			$show_photo = "<div class=\"col-lg-12\"><img src=img/".$objResult["Photo"]." class=\"img-responsive\"/></div>";
			$name_log = $objResult["Name"];
			$by_log = $objResult["By"];
			$ingredient_log = $objResult["Ingredient"];
			$direction_log = $objResult["Direction"];
			

			
			$_GET["menu"]=$_GET["edit"];
		}
	if(isset($_GET['delete'])){
	$strSQL = "DELETE FROM menu ";
	$strSQL .="WHERE Idmenu = '".$_GET["delete"]."' ";
	$objQuery = mysql_query($strSQL);
	echo '<script language="javascript">';
			echo 'alert("$_POST["name"] delete successful")';
			echo '</script>';
			header("location:admin_list.php"); 
	}



//difine
if(!isset($show_photo))
{$show_photo="<div class=\"col-lg-12\"><img class=\"img-responsive\"/></div>";}

if(!isset($name_log))
{$name_log=null;}
if(!isset($ingredient_log))
{$ingredient_log=null;}
if(!isset($direction_log))
{$direction_log=null;}
if(!isset($by_log))
{$by_log=null;}
if(isset($_SESSION["show_photo"]))
{$show_photo=$_SESSION["show_photo"];}

if(!isset($_SESSION["photo_file"]))
{$_SESSION["photo_file"]=null;}
//update db
		
		if(isset($_POST["submit"])){
$_POST["ingredient"] = str_replace("\n","<br/>",$_POST["ingredient"]);
$_POST["direction"] = str_replace("\n","<br/>",$_POST["direction"]);
		$strSQL = "UPDATE menu SET Name= '".$_POST["name"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
		$strSQL = "UPDATE menu SET Photo= '".$_SESSION["photo_file"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
		$strSQL = "UPDATE menu SET Ingredient= '".$_POST["ingredient"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
		$strSQL = "UPDATE menu SET Direction= '".$_POST["direction"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
		
		$strSQL = "UPDATE menu SET Type= '".$_POST["type"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
		$strSQL = "UPDATE menu SET Direction= '".$_POST["direction"]."' WHERE Idmenu = '".$_GET["menu"]."' ";
		$objQuery = mysql_query($strSQL) 
		or die(mysql_error());
		
			echo '<script language="javascript">';
			echo 'alert("$_POST["name"] edit successful")';
			echo '</script>';
			header("location:admin_list.php"); 
		}
	

mysql_close();

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
                        <strong>Edit Menu</strong>
                    </h2>
                    <hr>
<form class="login" enctype="multipart/form-data" method="POST">
    <div class="col-lg-12"><label>Photo</label></div>
    <div class="col-lg-12"><?php echo $show_photo; ?></div>
    <div class="col-lg-12"><label><small>.jpg/.png supperted</small></label></div>
<div class="form-group">
<div class="col-lg-9"><input type="file" class="required form-control" placeholder="File" name="photo"></div>
<input name="upload_photo" type="submit" value="Upload File">
 	</div>
  </form>
  <form class="login"  method="post" >
      <div class="form-group">
        <label>Name</label>
<input type="text" class="required form-control" placeholder="Name" name="name" value="<?php echo $name_log ?>">
      </div>
      <div class="form-group">
        <label>By</label>
<input type="text" class="required form-control" placeholder="By" name="by" value="<?php echo $by_log ?>">
      </div>
       <div class="form-group">
        <label>Type</label>
       <select class="required form-control" name="type">
       <option value="Thai">Thai</option>
       <option value="International">International</option>
       </select>
      </div>
           
         
         <div class="form-group">
         <label>Ingredient</label>
<textarea name="ingredient" rows="8" class="form-control" placeholder="Ingredient"><?php echo $ingredient_log ?></textarea>
	  </div>
        
        <div class="form-group">
         <label>Direction</label>
		<textarea name="direction" rows="8" class="form-control" placeholder="Direction"><?php echo $direction_log ?></textarea>
		</div>
      <div class="form-group">
 <input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="SAVE">
  </div>
   </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
               
                        
                        
                 <h1 class="brand-before text-center">
                        <a href="admin_list.php"><strong>Go Back to Menu List </strong></a></strong>
						
                  </h1>
                    
              
                    
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
    <script src="js/bootstrap.min.js"> </script>
    
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    
    
</script>
</body>

</html>