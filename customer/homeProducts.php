<?
    $connection = new DBConnection;

    $sql = "SELECT * FROM products LIMIT 6";
    $res = mysqli_query($connection->getConnection(),$sql);
    if($res-> num_rows > 0){
        while($row = $res->fetch_assoc()){
            echo '<div class="col-6 col-md-6 col-lg-4">
                    <a href="./shop-single.php?product_id='.$row['product_id'].'" class="item">
                    <img src="'.$row['product_image'].'" alt="Product Image" class="img-fluid">
                    <div class="item-info">
                        <h3>'.$row['product_name'].'</h3>
                        <span class="collection d-block">'.$row['product_description'].'</span>
                        <strong class="price">Ksh '.$row['product_price'].'</strong>
                    </div>
                    </a>
                </div>';
        }
    }

?>