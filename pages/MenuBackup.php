<?php
    include "connect.php";

    if(isset($_SESSION['User_LoggedIn'])){
        if(isset($_REQUEST["Home"]) )
            {header("Location:index.php");}
         else if(isset($_REQUEST["Student"]) )
            {header("Location:student.php");}
         else if(isset($_REQUEST["Subject"]) )
            {header("Location:subject.php");}
         else if(isset($_REQUEST["Religion"]) )
            {header("Location:religion.php");}
         else if(isset($_REQUEST["Programs"]) )
            {header("Location:program.php");}
         else if(isset($_REQUEST["Grades"]) )
            {header("Location:grades.php");}
         else if(isset($_REQUEST["Nationality"]) )
            {header("Location:nationality.php");}
         else if(isset($_REQUEST["Accounts"]) )
            {header("Location:accounts.php");}
    }
    else{
        header("Location:login.html");

    }
?>

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    button{
    padding: 10px;
    border: none;
    background: none;
    }
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

       <!-- /.navbar-header -->
       
           
       <form action="menu.php">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="margin-left:30px">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                       </li>
                        <li>
                          <i class="fa fa-dribbble fa-fw""></i><button type="submit" name="Home">Home</button>
                        </li>
                        <li>
                          <i class="fa fa-user fa-fw"></i><button type="submit"  name="Student">Student</button>
                        </li>
						<li>
                          <i class="fa fa-th-large"></i><button type="submit"  name="Subject">Subject</button>
                        </li>
						 <li>
                        <i class="fa fa-plus"></i><button type="submit"  name="Religion">Religion</button>
                        </li>
                         <li>
                        <i class="fa fa-desktop"></i><button type="submit"  name="Programs">Programs</button>
                        </li>
						 <li>
                        <i class="fa fa-mortar-board "></i><button type="submit"  name="Grades">Grades</button>
                        </li>
						 <li>
                         <i class="fa fa-flag-o"></i><button type="submit"  name="Nationality">Nationality</button>
                        </li>
						<li>
                         <i class="fa fa-book"></i><button type="submit" name="Accounts">Accounts</button>
                        </li>
						</ul></div></form>
						<li style="position:absolute; top:210%;left:65px;list-style: none; "  class="sidebar-search">
                            <form method ='post' action='logout.php'>
                            <input type='submit'><i class="fa fa-group fa-fw"></i>Logout</input>
                            </form>
                        </li>
                        
                       
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
   <form>

  
<!--justin lo--> 
      


     

