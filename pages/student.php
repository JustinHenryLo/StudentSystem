
<?php
include "connect.php";
 if(!(isset($_SESSION['student'])))  {header("Location: login.html");}
 if(!($_SESSION['student'][0]==1)){header("Location: index.php");}

if(isset($_REQUEST['Edit'])){
   $query="select count(id) from student where `firstname`='".$_REQUEST['firstname']."'and `lastname`='".$_REQUEST['lastname']."'and  `middlename`='".$_REQUEST['middlename']."' and `gender`='".$_REQUEST['gender']."'and `birthdate`='".$_REQUEST['birthdate']."'and `program_id`='".$_REQUEST['program']."'and `religion_id`='".$_REQUEST['religion']."'and `nationality_id`='".$_REQUEST['nationality']."'and `regular`='".$_REQUEST['regular']."'and `yearstatus`='".$_REQUEST['year']."' ";
  
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
     $editquery="UPDATE `school`.`student` SET `lastname`='".$_REQUEST['lastname']."', `firstname`='".$_REQUEST['firstname']."', `middlename`='".$_REQUEST['middlename']."', `gender`='".$_REQUEST['gender']."', `birthdate`='".$_REQUEST['birthdate']."', `program_id`='".$_REQUEST['program']."', `religion_id`='".$_REQUEST['religion']."', `nationality_id`='".$_REQUEST['nationality']."', `regular`='".$_REQUEST['regular']."', `yearstatus`='".$_REQUEST['year']."' WHERE `id`='".$_REQUEST['id']."';";
    
      mysqli_query($conn,$editquery);
    }
 
    }
}

		

	if(isset($_REQUEST['Insert'])){
   $query="select count(id) from student where `firstname`='".$_REQUEST['firstname']."'and `lastname`='".$_REQUEST['lastname']."'and  `middlename`='".$_REQUEST['middlename']."' and `gender`='".$_REQUEST['gender']."'and `birthdate`='".$_REQUEST['birthdate']."'and `program_id`='".$_REQUEST['program']."'and `religion_id`='".$_REQUEST['religion']."'and `nationality_id`='".$_REQUEST['nationality']."'and `regular`='".$_REQUEST['regular']."'and `yearstatus`='".$_REQUEST['year']."' ";
  
$result= mysqli_query($conn, $query);
 while ($row=mysqli_fetch_assoc($result)){
   if($row["count(id)"]>=1){
    echo"<script>alert('This entry has already been added')</script>";
   }
   else{
		$editquery="insert into student (lastname,firstname,middlename,gender,birthdate,program_id,religion_id,nationality_id,regular,yearstatus) values ('".$_REQUEST['lastname']."','".$_REQUEST['firstname']."','".$_REQUEST['middlename']."','".$_REQUEST['gender']."','".$_REQUEST['birthdate']."',".$_REQUEST['program'].",".$_REQUEST['religion'].",".$_REQUEST['nationality'].",".$_REQUEST['regular'].",".$_REQUEST['year'].");";
		
		mysqli_query($conn,$editquery);

		
	}
}
}

if(isset($_REQUEST['Delete']))
{
	mysqli_query($conn,"DELETE FROM `school`.`student` WHERE `id`='".$_REQUEST['Delete']."';");
  echo"<script>alert('Entry Deleted')</script>";
}

	

$GLOBALS['permit']=str_split($_SESSION['student']);
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



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student List</h1>
                    <h4>This page takes time to load, Sorry for the delay</h4>
                </div>
				<!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
        <?php if($_SESSION['student'][1]==1){echo "&nbsp &nbsp &nbsp &nbsp <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' id='insert' onclick='buttonInsert()'>Insert</button>";}?>
				
					
				<!-- Trigger the modal with a button -->

		<br/><br/><br/>
		<!-- Modal -->
	<form method='get' action='student.php'>
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
			<td><label>Lastname</label></td>
			<td><input id='lastname' type="text" class="form-control" name="lastname" required></input></td>
		</tr>
		
		<tr>
			<td><label>Firstname</label></td>
			<td><input id='firstname' type="text" class="form-control" name="firstname" required></input></td>
		</tr>
		
		<tr>
			<td><label>Middlename</label></td>
			<td><input id='middlename' type="text" class="form-control"  name="middlename" required></input></td>
		</tr>
		
		<tr>
			<td><label>Gender</label></td>
			<td>&nbsp &nbsp &nbsp <input id='genderA' type="radio" name="gender" value="1" checked> Male 
			&nbsp &nbsp &nbsp <input id='genderB' type="radio" name="gender" value="0"> Female
			</td>
		</tr>
		
		<tr>
			<td><label>Birthdate</label></td>
			<td><input id='birthdate' type="date"class="form-control"  name="birthdate" value="2017-01-01"></input></td>
		</tr>
		
		<tr>
			<td><label>Nationality</label></td>
			<td><select id='nationality' class="form-control"  name="nationality" >
                 <?php

							 $query="select * from nationality";
   					 		$result= mysqli_query($conn, $query);
     							while ($row=mysqli_fetch_assoc($result)){
        							print("<option value=".$row['id'].">".$row['name']."</option>");
        						}
						?>
             </select></td>
		</tr>
		
		<tr>
		<td><label>Religion</label></td>
		<td><select  id='religion' class="form-control"  name="religion"">
						<?php

							 $query="select * from religion";
   					 		$result= mysqli_query($conn, $query);
     							while ($row=mysqli_fetch_assoc($result)){
        							print("<option value=".$row['id'].">".$row['name']."</option>");
        						}
						?>
					 </select>
					</td>
				</tr>
		
		<tr>
			<td><label>Year</label></td>
			<td><select  id='year' class="form-control"  name="year">
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
             </select></td>
		</tr>
		
		<tr>
			<td><label>Program</label></td>
			<td><select id='program' class="form-control"  name="program">
                 <?php

							 $query="select * from program";
   					 		$result= mysqli_query($conn, $query);
     							while ($row=mysqli_fetch_assoc($result)){
        							print("<option value=".$row['id'].">".$row['code']."</option>");
        						}
						?>
             </select></td>
		</tr>
		
		<tr>
			<td><label>Regular</label></td>
			<td>&nbsp &nbsp &nbsp &nbsp <input id='regularA' type="radio" name="regular" value="1" checked> Yes </input>
			&nbsp &nbsp &nbsp &nbsp <input id='regularB' type="radio" name="regular" value="0"> No
			</td>
		</tr>

		<tr>
		<input type="hidden" id='hiddenInput' name ='id' >

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






				<!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
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
                                    
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                    										<th>Regular</th>
                    										<th>Birth Date</th>
                    										<th>Nationality</th>
                    										<th>Religion</th>
                    										<th>Year</th>
                    										<th>Program</th>
                                        <?php if($_SESSION['student'][2]==1){echo"<th></th><th></th>";} ?>
                    										<?php if($_SESSION['student'][3]==1){echo"<th></th>";} ?>
                                        
								
									
										
								
                                    </tr>
                               	</thead>
                                <tbody>
                          
                                    <?php
                                    		 $query="SELECT date_format(student.birthdate,'%M %e, %Y' ) as bday,student.*,
                                                student.id as StudentID,
                                                religion.name as religion,
                                                religion.id as religion_id,
                                                program.code as program,
                                                program.id as program_id,
                                                nationality.name as nationality,
                                                nationality.id as nationality_id,
                                                IF( gender = 1 , 'Male', 'Female' ) as gender,
                                                IF( regular = 1 , 'Yes', 'No' ) as regular
                                                FROM student left outer join program on student.program_id=program.id 
                                                left outer join religion on religion.id=student.religion_id
                                                left outer join nationality on nationality_id=nationality.id;";
   												 $result= mysqli_query($conn, $query);
     											$x=1;
     											while ($row=mysqli_fetch_assoc($result)){
     												
        											print("
        												<tr class='odd gradeX'>
														<td id=lastname$x >".$row['lastname']."</td>
														<td id=firstname$x>".$row['firstname']."</td>
														<td id=middlename$x>".$row['middlename']."</td>
                            <td id=gender$x>".$row["gender"]."</td>
                            <td id=regular$x>".$row["regular"]."</td>
                            <td id=bday$x>".$row['bday']."</td>
														<td id=nationality$x>".$row['nationality']."</td>
														<td id=religion$x>".$row['religion']."</td>
														<td id=year$x>".$row['yearstatus']."</td>
														<td id=program$x>".$row['program']."</td>

                            
                           <input  id='bday_id$x' type='hidden' value=".$row["birthdate"].">
                           <input  id='nationality_id$x'  type='hidden' value=".$row["nationality_id"].">
                           <input  id='religion_id$x'   type='hidden' value=".$row["religion_id"].">
                           <input  id='program_id$x'   type='hidden' value=".$row["program_id"].">

                            ");
                         if($_SESSION['student'][2]==1)
                                                             {print("<td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' onclick='buttonEdit($x)'>Edit</button></center></td>");}
												 if($_SESSION['student'][2]==1)
                                                              {print("<form method='get' action='student.php'>
                                                              <td style='width:50px;'><center><input type='submit' class='btn btn-info btn-lg' value='Delete'></button></center></td>
                                                              <input type='hidden' name='Delete' value=".$row['StudentID']." id='H$x'>
                                                              </form>");}
                        if($_SESSION['student'][3]==1)
                                                              {print("<form method='get' action='gradeStudent.php'>
                                                              <td style='width:50px;'><center><input type='submit' class='btn btn-info btn-lg' value='Grade'></button></center></td>
                                                              <input type='hidden' name='StudentID' value=".$row['StudentID']." id='H$x'>
                                                              </form>");}  
                            echo" </tr>";          
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
  				document.getElementById("hiddenInput").value=document.getElementById("H"+x).value;
         // var a=document.getElementById("H"+x).value;
  //$datepicker.datepicker('setDate', new Date());
        // alert("H"+x);
  			  document.getElementById("lastname").value=document.getElementById('lastname'+x).innerHTML;
          document.getElementById("firstname").value=document.getElementById('firstname'+x).innerHTML;
          document.getElementById("middlename").value=document.getElementById('middlename'+x).innerHTML;
          document.getElementById("year").value=document.getElementById('year'+x).innerHTML;
          document.getElementById("nationality").value=document.getElementById('nationality_id'+x).value;
          document.getElementById("religion").value=document.getElementById('religion_id'+x).value;
          document.getElementById("program").value=document.getElementById('program_id'+x).value;
          if(document.getElementById("regular"+x).innerHTML=='Yes'){document.getElementById("regularA").checked=true;} else{document.getElementById("regularB").checked=true;}
          if(document.getElementById("gender"+x).innerHTML=='Male'){document.getElementById("genderA").checked=true;} else{document.getElementById("genderB").checked=true;}   
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