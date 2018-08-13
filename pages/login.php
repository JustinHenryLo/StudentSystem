
<?php
include "connect.php";
     
    if(!isset($_SESSION['User_LoggedIn'])){
        $query="select * ,count(id) from account where uname ='".$_REQUEST['username']."' and pword = '".$_REQUEST['password']."' and active=1;";
        $result= mysqli_query($conn, $query);
         while ($row=mysqli_fetch_assoc($result)){
            if($row["count(id)"]>=1){
            // echo"<script>alert(".$row['permitstudent'].")</script>";
                    $_SESSION['home']='1';
                    $_SESSION['student']=$row['permitstudent'];
                    $_SESSION['subject']=$row['permitsubject'];
                    $_SESSION['religion']=$row['permitreligion'];
                    $_SESSION['program']=$row['permitprogram'];
                    $_SESSION['grade']=$row['permitgrades'];
                    $_SESSION['nationality']=$row['permitnationality'];
                    $_SESSION['account']=$row['permitaccounts'];
                    $_SESSION['User_LoggedIn']=$row['id'];
                     header("Location:index.php");
                }
            else
               header("Location:login.html");
         }


    }
    else{
        header("Location:index.php");
    }
?>
