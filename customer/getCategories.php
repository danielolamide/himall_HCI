<?php
    include './DBConnection .php';
    $mysqli = new DBConnection;
    $res = mysqli_query($mysqli->conn, "SELECT * FROM product_categories");

    if($res-> num_rows> 0){
        while($row = $res->fetch_assoc()){
           echo '<li><a href="#">'.$row['category_name'].'</a></li>';
        }
    }
?>