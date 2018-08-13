<?php
include "connect.php";
 if(!(isset($_SESSION['program'])&&$_SESSION['program'][3]==1)) {header("Location: index.php");}

if(isset($_REQUEST['Edit'])){
     $query="select count(id) FROM school.curriculum where yeartaken='".$_REQUEST['year']."' and semester='".$_REQUEST['semester']."' and program_id='".$_REQUEST['program_id']."' and subject_id='".$_REQUEST['subject']."' and ismajor='".$_REQUEST['major']."'";
  
    //echo"$query";
 $result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
    $a="UPDATE `school`.`curriculum` SET `yeartaken`='".$_REQUEST['year']."', `semester`='".$_REQUEST['semester']."', `ismajor`='".$_REQUEST['major']."', `program_id`='".$_REQUEST['program_id']."', `subject_id`='".$_REQUEST['subject']."' WHERE `id`='".$_REQUEST['curriculum_id']."';";
    //echo"$a";
        mysqli_query($conn,$a);
    }
 
    }
}

if(isset($_REQUEST['Insert'])){

$query="select count(id) FROM school.curriculum where program_id='".$_REQUEST['program_id']."' and subject_id='".$_REQUEST['subject']."'";
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
    //echo"INSERT INTO `school`.`curriculum` (`yeartaken`, `semester`, `ismajor`, `program_id`, `subject_id`) VALUES ('".$_REQUEST['year']."', '".$_REQUEST['semester']."', '".$_REQUEST['major']."',   '".$_REQUEST['program']."', '".$_REQUEST['subject']."');";
     $a="INSERT INTO `school`.`curriculum` (`yeartaken`, `semester`, `ismajor`, `program_id`, `subject_id`) VALUES ('".$_REQUEST['year']."', '".$_REQUEST['semester']."', '".$_REQUEST['major']."',   '".$_REQUEST['program_id']."', '".$_REQUEST['subject']."');";
     mysqli_query($conn,$a);
    //echo"$a";
    }
 
    }
    }
      //echo"INSERT INTO `school`.`curriculum` (`yeartaken`, `semester`, `ismajor`, `program_id`, `subject_id`) VALUES ('".$_REQUEST['year']."', '".$_REQUEST['semester']."', '".$_REQUEST['major']."',   '".$_REQUEST['program']."', '".$_REQUEST['subject']."');";
       
    

if(isset($_REQUEST['Delete']))
{
    mysqli_query($conn,"DELETE FROM `school`.`curriculum` WHERE `id`='".$_REQUEST['Delete']."';");

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
                    <h1 class="page-header">Curriculum</h1>
                </div>

<!--justin lo--> 
                <!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
                &nbsp &nbsp &nbsp &nbsp<a href="program.php">Back</a><br/><br/><br/>
                <?php if($_SESSION['program'][4]==1){echo"&nbsp &nbsp &nbsp &nbsp <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' id='insert' onclick='buttonInsert()''>Insert</button>";}?>

                    
                <!-- Trigger the modal with a button -->

        <br/><br/><br/>
        <!-- Modal -->
    <form method='get' action='curriculum.php'>
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
             <td><label>Subject</label></td>
             <td><select  class="form-control"  name="subject" id=subjectcode >
                 <?php
                             $query="select * from subject";
                            $result= mysqli_query($conn, $query);
                                while ($row=mysqli_fetch_assoc($result)){
                                    print("<option value=".$row['id'].">".$row['code']."</option>");
                                }
                        ?>
                  </select></td>
             </tr>
            <tr>
              <td><label>Year</label></td>
            <td><input type="number" class="form-control" name="year" id=year required></input></td>
             </tr>
               <td><label>Semester</label></td>
            <td>1st Sem<input type="radio"  name="semester" checked value=1 id=semesterA></input> &nbsp &nbsp</td>
              <td>  2nd Sem<input type="radio"  name="semester"  value=2 id=semesterB></input></td>
             </tr>
               <td><label>Type</label></td>
             <td>Major<input type="radio"  name="major" checked value=1 id=major></input> &nbsp &nbsp &nbsp &nbsp</td>
              <td>  Minor<input type="radio"  name="major"  value=2 id=minor></input></td>
             </tr>
             </tr>
            <tr>
             <input type="hidden" id='program_id' name ='program_id' value=<?php echo $_REQUEST['program_id'];?>>
            </tr>
            <tr>
             <input type="hidden" id='curriculum_id' name="curriculum_id">
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
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Year</th>
                                        <th>Semister</th>
                                        <th>Major</th>
                                        <?php if($_SESSION['program'][5]==1){echo"<th></th><th></th>";}?>
                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                          
                                    <?php
   
                                             $query="select *,subject.code as classcode ,curriculum.id as curriculum_id,subject.id as subject_id, subject.title as subjects ,if(ismajor=1 ,'Major','Minor') from subject inner join  curriculum on curriculum.subject_id = subject.id inner join program on program_id = program.id where program_id=".$_REQUEST['program_id'];
                                                 $result= mysqli_query($conn, $query);
                                                $x=1;
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    
                                                    print("
                                                        <tr class='odd gradeX'>
                                                        <td id=code$x >".$row['classcode']."</td>
                                                        <td id=subject$x>".$row['subjects']."</td>
                                                        <input type=hidden id=subject_id$x value=".$row['subject_id'].">
                                                        <td id=year$x>".$row['yeartaken']."</td>
                                                        <td id=semester$x>".$row['semester']."</td>
                                                        <td id=major$x>".$row['if(ismajor=1 ,\'Major\',\'Minor\')']."</td>
                                                        <input type=hidden value=".$row['curriculum_id']." id=curriculum$x>");

                                                        if($_SESSION['program'][5]==1){echo "<td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' onclick='buttonEdit($x)'>Edit</button></center></td>";}

                                                        if($_SESSION['program'][5]==1){echo "<form method='get' action='curriculum.php'>
                                                        <td style='width:50px;'><center><input type='submit' class='btn btn-info btn-lg' value='Delete'></button></center></td>
                                                        <input type='hidden' name='Delete' value=".$row['curriculum_id'].">
                                                        <input type='hidden' value=".$_REQUEST['program_id']." name='program_id'>
                                                        </form>";}
                                                  
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
                document.getElementById("curriculum_id").value=document.getElementById("curriculum"+x).value;
                document.getElementById("subjectcode").value=document.getElementById("subject_id"+x).value;
                document.getElementById("year").value=document.getElementById("year"+x).innerHTML;
                if(document.getElementById("semester"+x).innerHTML=="1"){document.getElementById("semesterA").checked=true} else{document.getElementById("semesterB").checked=true}
                if(document.getElementById("major"+x).innerHTML=="Major"){document.getElementById("major").checked=true} else{document.getElementById("minor").checked=true}
               

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