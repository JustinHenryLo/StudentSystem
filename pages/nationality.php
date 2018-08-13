<?php

include "connect.php";
if(!(isset($_SESSION['nationality'])&&$_SESSION['nationality'][0]==1)) {header("Location: index.php");}

if(isset($_REQUEST['Edit'])){
        $query=" select *,count(id) from nationality where name='".$_REQUEST['name']."';";

        $result= mysqli_query($conn, $query);
         while ($row=mysqli_fetch_assoc($result)){
           if($row["count(id)"]>=1){
            echo"<script>alert('This entry has already been added')</script>";
           }
   else{mysqli_query($conn,"UPDATE `school`.`nationality` SET `name`='".$_REQUEST['name']."' WHERE `id`='".$_REQUEST['id']."';");}
}
}

if(isset($_REQUEST['Insert'])){
      $query=" select *,count(id) from nationality where name='".$_REQUEST['name']."';";

        $result= mysqli_query($conn, $query);
         while ($row=mysqli_fetch_assoc($result)){
           if($row["count(id)"]>=1){
            echo"<script>alert('This entry has already been added')</script>";
           }
            else{mysqli_query($conn,"INSERT INTO `school`.`nationality` (`name`) VALUES ('".$_REQUEST['name']."');");}
        }
}

if(isset($_REQUEST['Delete']))
{
    mysqli_query($conn,"DELETE FROM `school`.`nationality` WHERE `id`='".$_REQUEST['Delete']."';");

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
                         <?php if(isset($_SESSION['home'])) echo"<li><i class='fa fa-dribbble fa-fw'></i><a href='index.php'>Home</a></li>";?>
                        <?php if(isset($_SESSION['student'])&&$_SESSION['student'][0]==1) echo"<li><i class='fa fa-user fa-fw'></i><a href='student.php'>Student</a></li>";?>
                        <?php if(isset($_SESSION['subject'])&&$_SESSION['subject'][0]==1) echo"<li><i class='fa fa-th-large'></i><a href='subject.php'>Subject</a></li>";?>
                        <?php if(isset($_SESSION['religion'])&&$_SESSION['religion'][0]==1) echo"<li><i class='fa fa-plus'></i><a href='religion.php'>Religion</a></li>";?>
                        <?php if(isset($_SESSION['program'])&&$_SESSION['program'][0]==1) echo"<li><i class='fa fa-desktop'></i><a href='program.php'>Program</a></li>";?>
                        <?php if(isset($_SESSION['grade'])&&$_SESSION['grade'][0]==1) echo"<li><i class='fa fa-mortar-board'></i><a href='grade.php'>Grade</a></li>";?>
                        <?php if(isset($_SESSION['nationality'])&&$_SESSION['nationality'][0]==1) echo"<li><i class='fa fa-flag-o'></i><a href='nationality.php'>Nationality</a></li>";?>
                        <?php if(isset($_SESSION['account'])&&$_SESSION['account'][0]==1) echo"<li><i class='fa fa-book'></i><a href='account.php'>Accounts</a></li>";?>
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
  </form>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nationality List</h1>
                </div>

<!--justin lo--> 
                <!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
                <?php if($_SESSION['nationality'][1]==1){ echo"&nbsp &nbsp &nbsp &nbsp <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' id='insert' onclick='buttonInsert()''>Insert</button>'";}?>
                    
                <!-- Trigger the modal with a button -->

        <br/><br/><br/>
        <!-- Modal -->
    <form method='get' action='nationality.php'>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
    
        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>
                <div class="modal-body">
      
    <center><table>
        <tr>
            <td><label>Name</label></td>
            <td><input type="text" class="form-control" name="name" id=name required></input></td>
        </tr>
        
        <tr>
        <input type="hidden" id='id' name ='id'>

        </tr>
    </table>
    </center>
    

        </div>
        <div class="modal-footer">
        <!--sadksa-->

          <input type="submit" class="btn btn-default" value="Insert" id="modalAccept"/>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="hideMe" onclick="buttonNormal()">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  
 </form>


<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    
                                        <th>Name</th>
                                        <?php if ($_SESSION['nationality'][2]==1){echo"<th></th><th></th>";} ?>
                                         
                                      
                                    
                                        
                                
                                    </tr>
                                </thead>
                                <tbody>
                          
                                    <?php
                                             $query="SELECT * from nationality";
                                                 $result= mysqli_query($conn, $query);
                                                $x=1;
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    
                                                    print("
                                                        <tr class='odd gradeX'>
                                                        <td id=name$x>".$row['name']."</td>
                                                        <input type=hidden name=name$x value=".$row['id']." id=id$x>
                                                        ");

                                                    if($_SESSION['nationality'][2]==1){echo "<td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' onclick='buttonEdit($x)'>Edit</button></center></td>";}
                                                    if($_SESSION['nationality'][2]==1){echo"<form method='get' action='nationality.php'><td style='width:50px;'><center><input type='submit' class='btn btn-info btn-lg' value='Delete'></button></center></td>
                                                     <input type='hidden' name='Delete' value=".$row['id']." >
                                                     </form>";}
                                                        echo"</tr>";
                                                
                                                  
                                                    $x++;
                                            }

                                      ?>
                                  

                                </tbody>
                            </table>
                           
                         </div>
                    </div>
                </div>
            </div>
    


    <script type="text/javascript">
        function buttonEdit(x){
            
                 document.getElementById("modalAccept").name = "Edit";
                document.getElementById("modalAccept").value = "Edit";
                document.getElementById("id").value=document.getElementById("id"+x).value;
                document.getElementById("name").value=document.getElementById("name"+x).innerHTML;
                

        }
        
        function buttonInsert(){
                document.getElementById("modalAccept").name = "Insert";
                document.getElementById("modalAccept").value = "Insert";
        }
        function buttonNormal(){
                document.getElementById("modalAccept").name = "Normal";
                document.getElementById("modalAccept").value = "Normal";
        }

    </script>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
<!--justin lo--> 