<?  
    require './DBConnection.php';
    $connection = new DBConnection;
    if(isset($_POST['submit-message'])){
        $fName = $_POST['c_fname'];
        $lName = $_POST['c_lname'];
        $email = $_POST['c_email'];
        $subject = $_POST['c_subject'];
        $message = $_POST['c_message'];

        $sql = "INSERT INTO contact(first_name,last_name,email,subject,message) VALUES('".$fName."','".$lName."','".$email."','".$subject."','".$message."')";
        $res = mysqli_query($connection->getConnection(),$sql);

        
    }

?>