<?php
include "connect.php";
if(isset($_REQUEST['lastname'])){
		mysqli_query($conn,"insert into student ('lastname','firstname','middlename','gender','birthdate','program_id','religion_id','nationality_id','regular','yearstatus') values ('".$_REQUEST['lastname']."','".$_REQUEST['firstname']."','".$_REQUEST['middlename']."','".$_REQUEST['gender']."','".$_REQUEST['birthdate']."','".$_REQUEST['program']."','".$_REQUEST['religion']."','".$_REQUEST['nationality']."','".$_REQUEST['regular']."','".$_REQUEST['year']."');");

		if(!mysqli_query($conn,"insert into student (lastname,firstname,middlename,gender,birthdate,program_id,religion_id,nationality_id,regular,yearstatus) values ('".$_REQUEST['lastname']."','".$_REQUEST['firstname']."','".$_REQUEST['middlename']."','".$_REQUEST['gender']."','".$_REQUEST['birthdate']."','".$_REQUEST['program']."','".$_REQUEST['religion']."','".$_REQUEST['nationality']."','".$_REQUEST['regular']."','".$_REQUEST['year']."');")) echo mysqli_error($conn);

		header("Location:student.php");

	}
?>