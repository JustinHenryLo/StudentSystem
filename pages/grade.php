<?php
include "connect.php";
 if(!(isset($_SESSION['grade'])&&$_SESSION['grade'][0]==1)) {header("Location: index.php");}


if(isset($_REQUEST['Edit'])){

$query="select count(id) from grade where subject_id='".$_REQUEST['subject']."' and student_id='".$_REQUEST['student']."' and schoolyear='".$_REQUEST['year']."' and semester='".$_REQUEST['semester']."'and grade='".$_REQUEST['grade']."'";
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
    mysqli_query($conn,"UPDATE `school`.`grade` SET `student_id`='".$_REQUEST['student']."', `subject_id`='".$_REQUEST['subject']."', `schoolyear`='".$_REQUEST['year']."', `semester`='".$_REQUEST['semester']."', `grade`='".$_REQUEST['grade']."' WHERE `id`='".$_REQUEST['grade_id']."';");

    }
 
    }
}

if(isset($_REQUEST['Insert'])){

$query="select count(id) from grade where subject_id='".$_REQUEST['subject']."' and student_id='".$_REQUEST['student']."' and schoolyear='".$_REQUEST['year']."' and semester='".$_REQUEST['semester']."'";
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
    mysqli_query($conn,"INSERT INTO grade ( student_id, subject_id, schoolyear, semester, grade) VALUES ( '".$_REQUEST['student']."', '".$_REQUEST['subject']."', '".$_REQUEST['year']."', '".$_REQUEST['semester']."', '".$_REQUEST['grade']."');");

    }
 
    }
}

if(isset($_REQUEST['Delete']))
{
    mysqli_query($conn,"DELETE FROM `school`.`grade` WHERE `id`='".$_REQUEST['Delete']."';");

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
                    <h1 class="page-header">Class List</h1>
                </div>
                
            <form action= grade.php method="get">
             <input class="btn btn-info btn-lg"  value=Search type="submit" name="pass" value='Search'><br/><br/>
             Year<select  id='year' class="form-control"  name="year">
                  <?php
                             $query="SELECT distinct schoolyear FROM school.grade;";
                            $result= mysqli_query($conn, $query);
                                while ($row=mysqli_fetch_assoc($result)){
                                    print("<option value=".$row['schoolyear'].">".$row['schoolyear']."</option>");
                                }
                        ?>
                  </select></td>
             Sem<select  id='semester' class="form-control"  name="semester">
                  <option value=1>1</option>
                  <option value=2>2</option>
                 
             </select></td>
            <br/><br/>
            
             </form>
           

             <!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
               
              &nbsp <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"onclick="buttonInsert()">Insert</button>


        <br/><br/><br/>
        <!-- Modal -->
        <form method=get action=grade.php>
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
       <td><label>Student</label></td>
        <td><select  id='student' class="form-control"  name="student">
                        <?php

                             $query="SELECT id,CONCAT(firstname,' ',middlename,' ',lastname) as student_name from student  ;";
                            $result= mysqli_query($conn, $query);
                                while ($row=mysqli_fetch_assoc($result)){
                                    print("<option value=".$row['id'].">".$row['student_name']."</option>");
                                }
                        ?>
                     </select>
                    </td>
                    </tr>
        <tr>
        <td><label>Subject</label></td>
        <td><select  id='subject' class="form-control"  name="subject" >
                        <?php

                             $query="SELECT id,code from subject  ;";
                            $result= mysqli_query($conn, $query);
                                while ($row=mysqli_fetch_assoc($result)){
                                    print("<option value=".$row['id'].">".$row['code']."</option>");
                                }
                        ?>
                     </select>
                    </td>
                    </tr>
        <tr>
            <td><label>Year</label></td>
            <td><input type="number" name="year" id=schoolyear class="form-control" required></td>
        </tr>
        
        <tr>
            <td><label>Grade</label></td>
            <td><input type="number" class="form-control" id="grades" name=grade required></input></td>
        </tr>

        <tr>
            <td><label>Semester</label></td>
            <td>&nbsp &nbsp &nbsp &nbsp <input type="radio" name="semester" value="1" id=semesterA checked> 1st 
            &nbsp &nbsp &nbsp &nbsp <input type="radio" name="semester" value="2" id=semesterB> 2nd
            </td>
        </tr>
        
        
        <td><input id=grade_id type=hidden name=grade_id></td>
        
        
    </table>
    </center>
    

        </div>
        <div class="modal-footer">
        <!--sadksa-->
           <input type="submit" class="btn btn-default" value="Insert" id="modalAccept"/>
          <button type="button" class="btn btn-default" data-dismiss="modal"  id="hideMe">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  </form>
                <!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
                <!-- /.col-lg-12 -->
       
        <?php
        if(isset($_REQUEST['semester'])){
            $query="select distinct subject_id ,subject.* from grade inner join subject on subject_id= subject.id where semester = '".$_REQUEST['semester']."' and schoolyear= '".$_REQUEST['year']."';";
                                                $result= mysqli_query($conn, $query);
                                                $a=1;
                                                 while($row=mysqli_fetch_assoc($result)){
                                                    echo"

                                                    <center>
                                                        <h2>".$row['title']."</h2>
                                                        <h3>".$row['code']."</h3>
                                                    <table class='table table-striped table-bordered table-hover'>
                                                    <tr>
   
                                                                                        <th>Firstname</th>
                                                                                        <th>Lastname</th>
                                                                                        <th>Middlename</th>
                                                                                        <th>Grade</th>
                                                                                        ";
                                                                                        if($_SESSION['grade'][2]==1){echo"<th></th>";}
                                                                                      
                                                                                        
                                                                              
                                                echo"
                                                    </tr>
                                                    ";
                                                    
            $queryII="select *, grade.id as grade_id from grade join student on student_id= student.id where subject_id= ".$row['subject_id']." and semester='".$_REQUEST['semester']."' and schoolyear ='".$_REQUEST['year']."'";
           
                                                $resultII= mysqli_query($conn, $queryII);
                                                 $x=1;
                                                 while($row=mysqli_fetch_assoc($resultII)){
                                                    
                                                    echo"
                                                   
                                                    <tr>
   
                                                                                        <td>".$row['firstname']."</td>
                                                                                        <td>".$row['lastname']."</td>
                                                                                        <td>".$row['middlename']."</td>
                                                                                        <td id=grade$x-$a>".$row['grade']."</td>
                                                                                        <input id=student_id$x-$a type=hidden value=".$row['student_id'].">
                                                                                        <input id=subject_id$x-$a type=hidden value=".$row['subject_id'].">
                                                                                        <input id=semester$x-$a  type=hidden value=".$row['semester'].">
                                                                                        <input id=schoolyear$x-$a  type=hidden value=".$row['schoolyear'].">
                                                                                        <input id=grade_id$x-$a  type=hidden value=".$row['grade_id'].">";

                                                                                       if($_SESSION['grade'][2]==1){echo "<td> <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'onclick='buttonEdit($x,$a)'>Edit</button></td>";}
                                                                                                      

                                                   echo"</tr>";
                                                    
                                                    
                                               $x++;
                                            
                                           }
                                           $a++;
                                          echo" </table></center> <br><br><br> "; 
                                        }
                                    }

                                        
    
    ?>
     <script type="text/javascript">
        function buttonEdit(x,a){
                
                document.getElementById("modalAccept").name = "Edit";
                document.getElementById("modalAccept").value = "Edit";
                //alert(document.getElementById("student_id"+x+"-"+a).value);
                document.getElementById("student").value=document.getElementById("student_id"+x+"-"+a).value;
                document.getElementById("subject").value=document.getElementById("subject_id"+x+"-"+a).value;

                //alert(document.getElementById('schoolyear'+x).value);
                document.getElementById("schoolyear").value= document.getElementById("schoolyear"+x+"-"+a).value;
                
                document.getElementById("grades").value=document.getElementById("grade"+x+"-"+a).innerHTML;
                //alert("aaaaaaaaa");
                //alert(document.getElementById("grade"+x).innerHTML);
                //alert(document.getElementById('grades').value);
                if(document.getElementById('semester'+x+"-"+a).value==1){document.getElementById('semesterA').checked=true} else {document.getElementById('semesterB').checked=true}

                document.getElementById("grade_id").value=document.getElementById("grade_id"+x+"-"+a).value;
                //alert(document.getElementById('grade_id').value);
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