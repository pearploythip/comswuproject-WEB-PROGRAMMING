<!DOCTYPE html>
<?php session_start();

	mysql_connect("10.1.3.40","57102010282","57102010282")  or die("<center><h1>SERVER FAILED</h1></center>");
    mysql_select_db("57102010282");
	
	
	if(isset($_POST["save"])){
$_POST["fmes"] = str_replace("\n","<br/>",$_POST["fmes"]);		
$strSQL = "INSERT INTO contact (cname,cemail,ctel,cmes) VALUES 
('".$_POST["fname"]."','".$_POST["femail"]."',
'".$_POST["ftel"]."','".$_POST["fmes"]."')";
$objQuery = mysql_query($strSQL);
if($objQuery) { // query  $result true
			echo '<script language="javascript">';
			echo 'alert("message successfully sent")';
			echo '</script>';
		} 	
		
		else {
			echo '<script language="javascript">';
			echo 'alert("message unsuccessfully sent")';
			echo '</script>';
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

    <title>Contact - Food Recipes - Start Bootstrap Theme</title>

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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>Food Recipes </strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map  -->
                   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d968.8893650490024!2d100.56546150484479!3d13.745221650994042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xfd15aa1c632d9677!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lio4Lij4Li14LiZ4LiE4Lij4Li04LiZ4LiX4Lij4Lin4Li04LmC4Lij4LiS!5e0!3m2!1sen!2sth!4v1448803310285" width="100%" height="400&" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone<br>
                        <strong>087-795-1385</strong>
                    </p>
                    <p>Email<br>
                        <strong><a href="mailto:pearploy.com@g.swu.ac.th">pearploy.com@g.swu.ac.th </a> <br>
                                <a href="mailto:tossaporn.com@g.swu.ac.th">tossaporn.com@g.swu.ac.th </a><br> 
								<a href="mailto:tossaporn.com@g.swu.ac.th">pannipa.naamj@g.swu.ac.th </a><br>
                        </strong>
                    </p>
                    <p>Address:
                        <strong>Faculty of Science <br> 
                                Computer Science <br>
                                Srinakharinwirot University<br></strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <form method="POST" role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="fname">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="femail">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" name="ftel">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" rows="6" name="fmes"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
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
