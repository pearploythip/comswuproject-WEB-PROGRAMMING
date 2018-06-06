<!DOCTYPE html>

<?php session_start();
	
	if (isset($_SESSION["Username"]))
	 {
		if ($_SESSION["Status"] == 'USER') 
		{
		header("location:index_login.php"); 
		}
	}
	if (!isset($_SESSION["Username"]))
	 {
		header("location:index.php"); 
		
	}

mysql_connect("10.1.3.40","57102010282","57102010282") or die("<center><h1 style=\"color:#E9A72B;\">SERVER FAILED</h1></center>");
	mysql_select_db("57102010282");
	if(!isset($_GET["page"])){$_GET["page"]=1;}
	$row=10;
	$total_data=mysql_num_rows(mysql_query("SELECT * FROM menu"));
	$total_page=ceil($total_data/$row);
	$start_page=($_GET["page"]-1)*$row;
	
	$strSQL = "SELECT * FROM menu ORDER BY Name ASC Limit $start_page,$row";
	$objQuery = mysql_query($strSQL) or die ("<center><h1 style=\"color:#E9A72B;\">QUERY FAILED</h1></center>");
	



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
                        <strong>Menu List</strong>
                    </h2>
                    <hr>
                    <div class="col-md-12 about_left">
    
    
    <?php
            while($objResult = mysql_fetch_array($objQuery))
            {
				$src = "img/".$objResult["Photo"];
            ?>
     <div class="event-page">
	       	 <div class="row">
             <div class="course_list">
             <ul class="table-list"><li class="clearfix">
	       	 	<div class="col-xs-8 col-sm-2">
	       	 	  <div class="event-img">
	       	 		<a href="?menu=<?php echo $objResult["Idmenu"]; ?>">
                    <img src="<?php echo $src; ?>" class="img-responsive" alt=""/></a>
	       	 		<div class="over-image"></div>
                    
	       	 	  </div>
	       	 	</div>
                
	       	 	<div class="col-xs-4 col-sm-8 event-desc">
	       	 	<h2><a href="admin_edit_fluency.php?edit=<?php echo $objResult["Idmenu"];?>"><?php echo $objResult["Name"];?></a>
                    </h2>
                    
	       	 	    <div class="event-info-text">
	       	 		   <div class="event-info-middle">
                       <p style="display:inline;">
					  <small> <?php echo substr($objResult["Direction"],0,256);?>.......... </div>
	       	 	    </div>
	       	  </div>
              <div style="float:right";>
              
 <a href="admin_edit_fluency.php?delete=<?php echo $objResult["Idmenu"];?>">
                    <span class="icon-social "><i class="fa fa-trash-o">DELETE MENU</i></a></small>
                    
                  
                   
		  </div>
              </li> </ul></div>
              
          <?php
			}
			?>
            
			<nav><center>
              <ul class="pagination">
                
                <?php if($_GET["page"]!=1) { ?>
                  <a href="?page=<?php echo $_GET["page"]-1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                <?php } ?>
    
                
                
                
                <?php for($i=1; $i <= $total_page  ;$i++) { ?>
                <li><a href="?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                <?php } ?>

				
                <li>
                <?php if($_GET["page"]!= $total_page && $total_page != 0) { ?>
                <a href="?page=<?php echo $_GET["page"]+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
                <?php } ?>
                </li>
              </ul>
            </center></nav>
                    
  

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
    
    
</body>

</html>