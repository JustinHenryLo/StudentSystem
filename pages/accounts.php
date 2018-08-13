<?php
include "menu.php"
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Accounts </h1>
                </div>
				<!--------------------------------------------------------------------------modal------------------------------------------------------------------------------------>
				&nbsp &nbsp &nbsp &nbsp <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"onclick="AAA()">Insert</button>
				
				<!-- Trigger the modal with a button -->

		<br/><br/><br/>
		<!-- Modal -->
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
			<td><label>Username</label></td>
			<td><input type="text"class="form-control" id="ctb"></input></td>
		</tr>
		
		<tr>
			<td><label>Description</label></td>
			<td><input type="text"class="form-control" id="ttb"></input></td>
		</tr>
		
		<tr>
			<td><label>Status</label></td>
			<td><input type="text"class="form-control" id="utb"></input></td>
		</tr>

		
		
		
		
	</table>
	</center>
	

        </div>
        <div class="modal-footer">
		<!--sadksa-->
		  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="insert()">Insert</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="AAA()" id="hideMe">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
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
										
                                        <th>Username</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Student</th>
                                        <th>Programs</th>
                                        <th>Subject</th>
                                        <th>Program</th>
                                        <th>Subject</th>
                                        <th>Nationality</th>
                                        <th>Religion</th>
                                        <th>Account</th>
                                        <th>Grades</th>
                                        <th>Units</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                             $query="SELECT * from account";
                                                 $result= mysqli_query($conn, $query);
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    print("
                                                        <tr class='odd gradeX'>
                                                        <td>".$row['uname']."</td>
                                                        <td>".$row['description']."</td>
                                                        ");

                                                        if($row['active']==1){
                                                            print('<td>Active</td>');
                                                        }
                                                        else{
                                                            print('<td>Inactive</td>');
                                                        }
                                                    print("
                                                        <td>".$row['uname']."</td>
                                                        <td>".$row['uname']."</td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Student</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Program</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Subject</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Nationality</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Religion</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Account</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Grades</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn btn-info btn-lg' >Units</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn-primary btn-lg' >Edit</button></center></td>
                                                        <td style='width:50px;'><center><button type='button' class='btn-primary btn-lg' >Delete</button></center></td>
                                                       ");
                                                 }

                                    ?>



                                </tbody>
                            </table>
                           
						 </div>
					</div>
				</div>
			</div>
		</div>
	</div>
            

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