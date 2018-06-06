<!DOCTYPE html>

<?php session_start();
	include 'sql.php';
	if (isset($_SESSION["Username"]))
	 {
		if ($_SESSION["Status"] == 'USER') 
		{
		header("location:index_login.php"); 
		}
	}
		
	if(isset($_GET["search"])){
	$strSQL = "SELECT * FROM member WHERE (Fullname LIKE '%".$_GET["search"]."%' or Username LIKE '%".$_GET["search"]."%' or UserId LIKE '".$_GET["search"]."' )";
	}
if(!isset($_GET["search"])){
$strSQL = "SELECT * FROM member";}


$objQuery = mysql_query($strSQL) or die 
("<center><h1 style=\"color:#E9A72B;\">QUERY FAILED</h1></center>");

if(!isset($info)){$info=null;}

if(isset($_GET['u'])){
	$info = "<div class=\"alert alert-info\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><center>
		<strong>Username : ".$_GET['u']."<br/>
		Password : ".$_GET['p']."<br/>
		Fullname : ".$_GET['n']."<br/>
		Email : ".$_GET['e']."<br/></strong></center></div>";
	}

if(isset($_GET['c']) && isset($_GET['id'])){
	if($_GET['c']=="ADMIN"){
		$strSQL = "UPDATE member SET Status = '"."USER"."' WHERE UserId = '".$_GET['id']."' ";
		$objQuery = mysql_query($strSQL);
	}else{
		$strSQL = "UPDATE member SET Status = '"."ADMIN"."' WHERE UserId = '".$_GET['id']."' ";
		$objQuery = mysql_query($strSQL);
		}

		header("location:adminpage.php");
	}


if(isset($_GET['id']) && !isset($_GET['c'])){
	$strSQL = "DELETE FROM member ";
	$strSQL .="WHERE UserId = '".$_GET["id"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:adminpage.php");
	}
	if(isset($_GET['idc'])){
	$strSQL = "DELETE FROM contact ";
	$strSQL .="WHERE idc = '".$_GET["idc"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:adminpage.php");
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
                        <a href="admin_insert.php"><strong>Foods Menu Insert</strong></a></strong>
                    </h2>
                    <hr>
                    <img src="img/cooking2.jpg" alt="" width="325" class="img-responsive img-border img-left">
                    <p></p>
               
                </div>
            </div>
        </div>
      
                 <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <a href="admin_list.php"><strong>Edit | Delete Foods Menu </strong></a></strong>
                    </h2>
                    <hr>
                    <img src="img/cooking2.jpg" alt="" width="325" class="img-responsive img-border img-left">
                    <p></p>
                    </div>
            </div>
        </div>
      

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Edit Member Data</strong>
                    </h2>
                    <hr>
                  <form style="width:200px; margin:auto" method="get" 
    action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
   <input style="width:100%;" type="text" autocomplete="off" class="required form-control" placeholder="search..." name="search" value="">
      <input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="GO">
  </form>
    
    <br/><br/>
    <?php echo $info; $info = null;?>
         
    
	<div class="course_list">
    	<div class="table-header clearfix">
            <div class="col-lg-2">ID</div>
            <div class="col-lg-4">USERNAME (FULLNAME)</div>
            <div class="col-lg-2">STATUS</div>
            <div class="col-lg-4">ACTION</div>
        </div>
        <ul class="table-list">
			<?php
            while($objResult = mysql_fetch_array($objQuery))
            {
            ?>
            <li class="clearfix">
            <div class="col-lg-2">
			<?php echo $objResult["UserId"];?>
            </div>
            <div class="col-lg-4">
            <a  href="?u=<?php echo $objResult["Username"]; ?>
            &n=<?php echo $objResult["Fullname"]; ?>
            &p=<?php echo $objResult["Password"]; ?>
            &e=<?php echo $objResult["Email"]; ?>">
            <?php echo $objResult["Username"] ?>
			<?php echo " (".$objResult["Fullname"].")";?> 
            </a>
            </div>
            <div class="col-lg-2">
            <a href="?c=<?php echo $objResult["Status"];?>
            &id=<?php echo $objResult["UserId"];?>">
			<?php echo $objResult["Status"];?>
            </a>
            </div>
            <div class="col-lg-4">
            <a href="?id=<?php echo $objResult["UserId"];?>">Delete</a> 
            </td>
            </li>
          <?php
			}
			?>
          </ul>
    </div>    
         
         
         
         
              </div>
            </div>
        </div>

<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Contact Message</strong>
                    </h2>
                    <hr>
                 
    
  
    <?php 
	
$strSQL = "SELECT * FROM contact";

$objQuery = mysql_query($strSQL) or die ("<center><h1 style=\"color:#E9A72B;\">QUERY FAILED</h1></center>");
	echo $info; $info = null;?>
         
    
	<div class="course_list">
    	<div class="table-header clearfix">
            <div class="col-lg-2">NAME</div>
            <div class="col-lg-4">EMAIL</div>
            <div class="col-lg-2">TEL.</div>
            <div class="col-lg-4">MESSAGE.</div>
        </div>
        <ul class="table-list">
			<?php
            while($objResult = mysql_fetch_array($objQuery))
            {
            ?>
            
            <div class="col-lg-2">
			<?php echo $objResult["cname"];?>
            </div>
            <div class="col-lg-4">
            <?php echo $objResult["cemail"]; ?>
            </div>
            <div class="col-lg-2">
           <?php echo $objResult["ctel"];?>
            </div>
            <div class="col-lg-4">
           <a href="?idc=<?php echo $objResult["idc"];?>"><?php echo $objResult["cmes"];?></a>
           </div>
           
            </td>
          
          <?php
			}
			?>
          </ul>
    </div>    
         
         <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Please Click Message to Delete</strong>
                    </h2> 
         
         			</div>
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