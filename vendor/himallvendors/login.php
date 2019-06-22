<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = new mysqli("localhost", "root", "", "himall");
  session_start();
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$email = $con->real_escape_string($_REQUEST['email']);
$Password = $con->real_escape_string($_REQUEST['password']);


      $sql = "SELECT * FROM users WHERE email= '$email' and password = '$Password'";
      
      $result = mysqli_query($con,$sql)or die(mysqli_error($con));
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

         
		
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["email"] = $row["email"];
		$user_type=$row["user_type"];
       if($user_type=="vendor"){
	    header("location: dashboard.php");
		}
		else{
			$_SESSION["non-authorization"]="You are not authorized to go";
			header("location: loginform.php");
		}
	}
	// else{
	// 	$_SESSION["Error"]="Invalid Password or Username";
	// 		header("location: loginform.php");
	// }

	
else{
$email = $con->real_escape_string($_REQUEST['email']);
$Password = $con->real_escape_string($_REQUEST['password']);


      $customer_sql = "SELECT * FROM users WHERE email= '$email' and password = '$Password'";
      
      $cresult = mysqli_query($con,$customer_sql)or die(mysqli_error($con));
      $crow = mysqli_fetch_array($cresult,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($cresult);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

         
		
		$_SESSION["uid"] = $crow["user_id"];
		$_SESSION["email"] = $crow["email"];
		
      $user_type=$row["user_type"];
       if($user_type=="cutomer"){
	    header("location: cutomer\index.html");
		}
		else{
			$_SESSION["non-authorization"]="You are not authorized to go";
			header("location: loginform.php");
		}
	}
}
	// else{
	// 	$_SESSION["Error"]="Invalid Password or Username";
	// 		header("location: loginform.php");
	// }
//       $email = $mysqli->real_escape_string($_REQUEST['email']);
//       $Password = $mysqli->real_escape_string($_REQUEST['password']);


//       $admin_sql = "SELECT * FROM admin WHERE email= '$email' and idno = '$Password'";
      
//       $adin_result = mysqli_query($mysqli,$admin_sql);
//       $admin_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
//       $count = mysqli_num_rows($adin_result);
      
//       // If result matched $myusername and $mypassword, table row must be 1 row
		
//       if($count == 1) {

         
		
// 		// $_SESSION["uid"] = $row["empid"];
// 		$_SESSION["email"] = $row["email"];
// 		// $status=$row["status"];
//        if($admin_sql==true){
// 	    header("location: admin.php");
// 		}
// 		else{
// 			$_SESSION["non-authorization"]="You are not authorized to go";
// 			header("location: loginform.php");
// 		}
// 	}

// }
	
// else{
// 	$email = $mysqli->real_escape_string($_REQUEST['email']);
//     $Password = $mysqli->real_escape_string($_REQUEST['password']);


//       $sequel = "SELECT * FROM admin WHERE email= '$email' and idno = '$Password'";
      
//       $admin_result = mysqli_query($mysqli,$sql);
//       $admin_row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
//       $count = mysqli_num_rows($admin_result);
      
//       // If result matched $myusername and $mypassword, table row must be 1 row
		
//       if($count == 1) {

         
		
// 		// $_SESSION["uid"] = $row["empid"];
// 		$_SESSION["email"] = $admin_row["email"];
// 		if($sequel== true)
// 		{
// 			header("location:admin.php")
// 		}

// 	// 	$status=$row["status"];
//  //       if($status=="1"){
// 	//     header("location: myprofile.php");
// 	// 	}
// 	// 	else{
// 	// 		$_SESSION["non-authorization"]="You are not authorized to go";
// 	// 		header("location: loginform.php");
// 	// 	}
// 	// }
// 	else{
// 		$_SESSION["Error"]="Invalid Password or Username";
// 			header("location: loginform.php");
// 	}
	

	// 	$User=$_SESSION["uid"];
	//     $query = "SELECT * FROM type WHERE empid=$User";
	//     $rslt = mysqli_query($mysqli,$query);
 //        $rw = mysqli_fetch_array($rslt,MYSQLI_ASSOC);
      
      
 //       $cnt = mysqli_num_rows($rslt);
	//    if($cnt == 1) {
 //       $_SESSION["utype"] = $rw["type"];
	//    if($rw["type"]=='admin'){
				
	//     header("location: admin.php");}
	//     else if($rw["type"]=='customer'){
	// 	header("location: myprofile.php");}
	// 	else if($rw["type"]=='employee'){
	// 	header("location: client.php");}
	//    }
 //      }else {
	// 	 $_SESSION['Error']="Invalid  Username or Password!";
 // header("location: loginform.php");
		


      
  
   
   
?>