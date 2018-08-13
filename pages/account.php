<?php
include "connect.php";

if(!(isset($_SESSION['account'])&&$_SESSION['account'][0]==1)) {header("Location: index.php");}



if(isset($_REQUEST['Edit'])){
   $student=$_REQUEST['studentA'].$_REQUEST['studentB'].$_REQUEST['studentC'].$_REQUEST['studentD'];
   $program=$_REQUEST['programA'].$_REQUEST['programB'].$_REQUEST['programC'].$_REQUEST['programD'].$_REQUEST['programE'].$_REQUEST['programF'];
   $subject=$_REQUEST['subjectA'].$_REQUEST['subjectB'].$_REQUEST['subjectC'];
   $nationality=$_REQUEST['nationalityA'].$_REQUEST['nationalityB'].$_REQUEST['nationalityC'];
   $religion=$_REQUEST['religionA'].$_REQUEST['religionB'].$_REQUEST['religionC'];
   $account=$_REQUEST['AccountA'].$_REQUEST['AccountB'].$_REQUEST['AccountC'];
   $grade=$_REQUEST['GradesA'].$_REQUEST['GradesB'].$_REQUEST['GradesC'];
    

   $query="select count(id) from account where uname='".$_REQUEST['uname']."' and pword='".$_REQUEST['pword']."' and description='".$_REQUEST['description']."' and active='".$_REQUEST['active']."' and `permitstudent`='$student'and `permitprogram`='$program'and `permitsubject`='$subject'and `permitnationality`='$nationality'and `permitreligion`='$religion'and `permitaccounts`='$account'and `permitgrades`='$grade'";
  
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
   
        $modifiedon= date("Y-m-d H:i:s"); 
        $modifiedby_id=$_SESSION['User_LoggedIn'];

        $com="UPDATE `school`.`account` SET `uname`='".$_REQUEST['uname']."', `pword`= '".$_REQUEST['pword']."', `description`='".$_REQUEST['description']."', `active`='".$_REQUEST['active']."', `permitstudent`='$student', `permitprogram`='$program', `permitsubject`='$subject', `permitnationality`='$nationality', `permitreligion`='$religion', `permitaccounts`='$account', `permitgrades`='$grade', `addedby_id`='".$_SESSION['User_LoggedIn']."', `modifiedon`='$modifiedon', `modifiedby_id`='".$_SESSION['User_LoggedIn']."' WHERE `id`='".$_REQUEST['User_ID']."';";
       

         mysqli_query($conn,$com);

      
        
        }
    }
     if($_SESSION['User_LoggedIn']==$_REQUEST['User_ID']){
        if ($_REQUEST['active']==0){
            header("Location:logout.php");
        }
        }
    }



    if(isset($_REQUEST['Insert'])){
    $query="select count(id) from account where uname='".$_REQUEST['uname']."'";
  
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
   $student=$_REQUEST['studentA'].$_REQUEST['studentB'].$_REQUEST['studentC'].$_REQUEST['studentD'];
   $program=$_REQUEST['programA'].$_REQUEST['programB'].$_REQUEST['programC'].$_REQUEST['programD'].$_REQUEST['programE'].$_REQUEST['programF'];
   $subject=$_REQUEST['subjectA'].$_REQUEST['subjectB'].$_REQUEST['subjectC'];
   $nationality=$_REQUEST['nationalityA'].$_REQUEST['nationalityB'].$_REQUEST['nationalityC'];
   $religion=$_REQUEST['religionA'].$_REQUEST['religionB'].$_REQUEST['religionC'];
   $account=$_REQUEST['AccountA'].$_REQUEST['AccountB'].$_REQUEST['AccountC'];
   $grade=$_REQUEST['GradesA'].$_REQUEST['GradesB'].$_REQUEST['GradesC'];
    
        $addedon= date("Y-m-d H:i:s"); 
        $addedby=$_SESSION['User_LoggedIn'];

        $com="INSERT INTO `school`.`account` (`uname`, `pword`, `description`, `active`, `permitstudent`, `permitprogram`, `permitsubject`, `permitnationality`, `permitreligion`, `permitaccounts`, `permitgrades`, `addedon`, `addedby_id`) VALUES ('".$_REQUEST['uname']."', '".$_REQUEST['pword']."','".$_REQUEST['description']."','".$_REQUEST['active']."','$student','$program','$subject','$nationality','$religion','$account','$grade','$addedon','$addedby')";
       

         mysqli_query($conn,$com);

      
        
        }
    }
}
        
    
if(isset($_REQUEST['User_ID'])){
    if($_SESSION['User_LoggedIn']==$_REQUEST['User_ID']){
    $query="select * from account where id='".$_REQUEST['User_ID']."';";
        $result= mysqli_query($conn, $query);
         while ($row=mysqli_fetch_assoc($result)){
           
                    
                    $_SESSION['home']='1';
                    $_SESSION['student']=$row['permitstudent'];
                    $_SESSION['subject']=$row['permitsubject'];
                    $_SESSION['religion']=$row['permitreligion'];
                    $_SESSION['program']=$row['permitprogram'];
                    $_SESSION['grade']=$row['permitgrades'];
                    $_SESSION['nationality']=$row['permitnationality'];
                    $_SESSION['account']=$row['permitaccounts'];
                    
}
}
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
                    <h1 class="page-header">Account List</h1>
                </div>

<!--justin lo--> 
                <!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
               <?php if($_SESSION['account'][1]==1){echo"&nbsp &nbsp &nbsp &nbsp <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' id='insert' onclick='buttonInsert()'>Insert</button>";}?>
                    
                <!-- Trigger the modal with a button -->

        <br/><br/><br/>
        <!-- Modal -->
    <form method='get' action='account.php'>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
    
        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>
                <div class="modal-body">

                       
                   
                    <center>
                     Username
                        <input type="text" class="form-control"  id=uname name="uname" required>
                     Password
                        <input type="text" class="form-control"  id=pword name="pword" required>
                     Description
                        <textarea  class="form-control"  id=description name="description"></textarea>
                    Active<input type="radio" value="1" name="active" id=active checked>
                    Inactive<input type="radio" value="0" name="active" id=inactive>


                    <input type="hidden" name="User_ID" id=User_ID>


                    <table>

                    
                    <tr>
                        <th>Student</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="studentA" value="0">
                        <td><input type=checkbox id=studentA name=studentA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="studentB" value="0">
                        <td><input type=checkbox id=studentB name=studentB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="studentC" value="0">
                        <td><input type=checkbox id=studentC name=studentC value="1">&nbsp &nbsp &nbsp</td>
                        <td>Grades</td>
                        <input type="hidden" name="studentD" value="0">
                        <td><input type=checkbox id=studentD name=studentD value="1">&nbsp &nbsp &nbsp</td>

                    </tr>

                    <th>Program</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="programA" value="0">
                        <td><input type=checkbox id=programA name=programA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="programB" value="0">
                        <td><input type=checkbox id=programB name=programB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="programC" value="0">
                        <td><input type=checkbox id=programC name=programC value="1">&nbsp &nbsp &nbsp</td>
                        <td> View</td>
                        <input type="hidden" name="programD" value="0">
                        <td><input type=checkbox id=programD name=programD value="1">&nbsp &nbsp &nbsp</td>
                        <td> Add</td>
                        <input type="hidden" name="programE" value="0">
                        <td><input type=checkbox id=programE name=programE value="1">&nbsp &nbsp &nbsp</td>
                        <td> Edit&Delete</td>
                        <input type="hidden" name="programF" value="0">
                        <td><input type=checkbox id=programF name=programF value="1">&nbsp &nbsp &nbsp</td>
                    </tr>


                    <th>Subject</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="subjectA" value="0">
                        <td><input type=checkbox id=subjectA name=subjectA value="1">&nbsp &nbsp &nbsp</td>   
                        <td>Add</td>
                        <input type="hidden" name="subjectB" value="0">
                        <td><input type=checkbox id=subjectB name=subjectB value="1">&nbsp &nbsp &nbsp</td>   
                        <td>Edit&Delete</td>
                        <input type="hidden" name="subjectC" value="0">
                        <td><input type=checkbox id=subjectC name=subjectC value="1">&nbsp &nbsp &nbsp</td>    
                       
                    </tr>


                    <th>Nationality</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="nationalityA" value="0">
                        <td><input type=checkbox id=nationalityA name=nationalityA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="nationalityB" value="0">
                        <td><input type=checkbox id=nationalityB name=nationalityB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="nationalityC" value="0">
                        <td><input type=checkbox id=nationalityC name=nationalityC value="1">&nbsp &nbsp &nbsp</td>
                    </tr>


                    <th>Religion</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="religionA" value="0">
                        <td><input type=checkbox id=religionA name=religionA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="religionB" value="0">
                        <td><input type=checkbox id=religionB name=religionB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="religionC" value="0">
                        <td><input type=checkbox id=religionC name=religionC value="1">&nbsp &nbsp &nbsp</td>
                    </tr>


                    <th>Account</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="AccountA" value="0">
                        <td><input type=checkbox id=AccountA name=AccountA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="AccountB" value="0">
                        <td><input type=checkbox id=AccountB name=AccountB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="AccountC" value="0">
                        <td><input type=checkbox id=AccountC name=AccountC value="1">&nbsp &nbsp &nbsp</td>
                    </tr>

                    <th>Grades</th>
                    </tr>
                    
                    <tr>
                        <td>View</td>
                        <input type="hidden" name="GradesA" value="0">
                        <td><input type=checkbox id=GradesA name=GradesA value="1">&nbsp &nbsp &nbsp</td>    
                        <td>Add</td>
                        <input type="hidden" name="GradesB" value="0">
                        <td><input type=checkbox id=GradesB name=GradesB value="1">&nbsp &nbsp &nbsp</td>
                        <td>Edit&Delete</td>
                        <input type="hidden" name="GradesC" value="0">
                        <td><input type=checkbox id=GradesC name=GradesC value="1">&nbsp &nbsp &nbsp</td>
                    </tr>

                    </table>

                    
                </center>
                </div>
      
  

        <div class="modal-footer">
        <!--sadksa-->

          <input type="submit" class="btn btn-default" value="Insert" id="modalAccept" name=Insert/>
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
                                    
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Description</th>
                                        <th>Active</th>
                                       
                                        <th>Added on</th>
                                        <th>Added by</th>
                                        <th>Modified on</th>
                                        <th>Modified by</th>
                                       <?php if($_SESSION['account'][2]==1){echo"<th></th>";}?>
                                       
                                      
                                     
                                    
                                        
                                
                                    </tr>
                                </thead>
                                <tbody>
                          
                                    <?php
                                             $query="Select first.*, C.uname as modifier from (SELECT A.*,if(A.active=1,'Yes','No')as word_active,B.uname as adder FROM school.account as A left outer join account as B on A.addedby_id=B.id)as first left outer join account as C on first.modifiedby_id = C.id;";
                                                 $result= mysqli_query($conn, $query);
                                                $x=1;
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    
                                                    print("
                                                        <tr class='odd gradeX'>
                                                        <td id=uname$x>".$row['uname']."</td>
                                                        <td id=pword$x>".$row['pword']."</td>
                                                        <td id=description$x>".$row['description']."</td>
                                                        <td id=active$x>".$row['word_active']."</td>
                                                        <td>".$row['addedon']."</td>
                                                        <td>".$row['adder']."</td>
                                                        <td>".$row['modifiedon']."</td>
                                                        <td>".$row['modifier']."</td>
                                                        <input type=hidden value=".$row['id']." id='id$x'>
                                                        <input type=hidden value=".$row['permitstudent']." id='permitstudent$x'>
                                                        <input type=hidden value=".$row['permitprogram']." id='permitprogram$x'>
                                                        <input type=hidden value=".$row['permitsubject']." id='permitsubject$x'>
                                                        <input type=hidden value=".$row['permitnationality']." id='permitnationality$x'>
                                                        <input type=hidden value=".$row['permitreligion']." id='permitreligion$x'>
                                                        <input type=hidden value=".$row['permitaccounts']." id='permitaccounts$x'>
                                                        <input type=hidden value=".$row['permitgrades']." id='permitgrades$x'>
                                                        <input type=hidden value=".$row['id']." id='UserID$x'>
                                                        ");


                                                        if($_SESSION['account'][2]==1){echo"<td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' onclick='buttonEdit($x)'>Edit</button></center></td>";}

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

                //alert(x);
                document.getElementById("modalAccept").name = "Edit";
                document.getElementById("modalAccept").value = "Edit";
                
                document.getElementById("uname").value=document.getElementById("uname"+x).innerHTML;
                document.getElementById("pword").value=document.getElementById("pword"+x).innerHTML;
                document.getElementById("description").value=document.getElementById("description"+x).innerHTML;

                if(document.getElementById("active"+x).innerHTML=="Yes"){document.getElementById("active").checked=true}else{document.getElementById("inactive").checked=true}
                //document.getElementById("hiddenInput").value=document.getElementById("H"+x).value;
                //alert("aaaaa");
                var student=document.getElementById('permitstudent'+x).value;
                    if(student.charAt(0)=='1'){document.getElementById('studentA').checked=true;}else{document.getElementById('studentA').checked=false;}
                    if(student.charAt(1)=='1'){document.getElementById('studentB').checked=true;}else{document.getElementById('studentB').checked=false; }
                    if(student.charAt(2)=='1'){document.getElementById('studentC').checked=true;}else{document.getElementById('studentC').checked=false; }
                    if(student.charAt(3)=='1'){document.getElementById('studentD').checked=true;}else{document.getElementById('studentD').checked=false; }

                var program=document.getElementById('permitprogram'+x).value;
                    if(program.charAt(0)=='1'){document.getElementById('programA').checked=true;}else{document.getElementById('programA').checked=false; }
                    if(program.charAt(1)=='1'){document.getElementById('programB').checked=true;}else{document.getElementById('programB').checked=false; }
                    if(program.charAt(2)=='1'){document.getElementById('programC').checked=true;}else{document.getElementById('programC').checked=false; }
                    if(program.charAt(3)=='1'){document.getElementById('programD').checked=true;}else{document.getElementById('programD').checked=false; }
                    if(program.charAt(4)=='1'){document.getElementById('programE').checked=true;}else{document.getElementById('programE').checked=false; }
                    if(program.charAt(5)=='1'){document.getElementById('programF').checked=true;}else{document.getElementById('programF').checked=false; }
                 
                  var subject=document.getElementById('permitsubject'+x).value;
                    if(subject.charAt(0)=='1'){document.getElementById('subjectA').checked=true;}else{document.getElementById('subjectA').checked=false; }
                    if(subject.charAt(1)=='1'){document.getElementById('subjectB').checked=true;}else{document.getElementById('subjectB').checked=false; }
                    if(subject.charAt(2)=='1'){document.getElementById('subjectC').checked=true;}else{document.getElementById('subjectC').checked=false; }

                var nationality=document.getElementById('permitnationality'+x).value;
                    if(nationality.charAt(0)=='1'){document.getElementById('nationalityA').checked=true;}else{document.getElementById('nationalityA').checked=false; }
                    if(nationality.charAt(1)=='1'){document.getElementById('nationalityB').checked=true;}else{document.getElementById('nationalityB').checked=false; }
                    if(nationality.charAt(2)=='1'){document.getElementById('nationalityC').checked=true;}else{document.getElementById('nationalityC').checked=false; }

                var religion=document.getElementById('permitreligion'+x).value;
                    if(religion.charAt(0)=='1'){document.getElementById('religionA').checked=true;}else{document.getElementById('religionA').checked=false; }
                    if(religion.charAt(1)=='1'){document.getElementById('religionB').checked=true;}else{document.getElementById('religionB').checked=false; }
                    if(religion.charAt(2)=='1'){document.getElementById('religionC').checked=true;}else{document.getElementById('religionC').checked=false; }

                var accounts=document.getElementById('permitaccounts'+x).value;
                    if(accounts.charAt(0)=='1'){document.getElementById('AccountA').checked=true;}else{document.getElementById('AccountA').checked=false; }
                    if(accounts.charAt(1)=='1'){document.getElementById('AccountB').checked=true;}else{document.getElementById('AccountB').checked=false; }
                    if(accounts.charAt(2)=='1'){document.getElementById('AccountC').checked=true;}else{document.getElementById('AccountC').checked=false; }

                var grade=document.getElementById('permitgrades'+x).value;
                    if(grade.charAt(0)=='1'){document.getElementById('GradesA').checked=true;}else{document.getElementById('GradesA').checked=false; }
                    if(grade.charAt(1)=='1'){document.getElementById('GradesB').checked=true;}else{document.getElementById('GradesB').checked=false; }
                    if(grade.charAt(2)=='1'){document.getElementById('GradesC').checked=true;}else{document.getElementById('GradesC').checked=false; }
                    
                document.getElementById("User_ID").value=document.getElementById("UserID"+x).value;
                //alert(document.getElementById("User_ID").value);

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