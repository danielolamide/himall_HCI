<?include './DBConnection.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HIMALL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="shortcut icon" href="https://www.himall.africa/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2 position-relative">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search for product">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">
                  <img src="https://www.himall.africa/logo.png" alt="logo" loading="lazy">
              </a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children active">
                  <a href="index.php">Categories</a>
                  <ul class="dropdown">
                  <?php include './getCategories.php'?>
                  </ul>
                </li>
                
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icomoon icon-user"></span></<a>
            <a href="cart.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-lg-9 order-2 order-lg-1">

            <div class="row align">
              <div class="col-md-12 mb-5">
                <div class="float-md-left">
                  <h2 class="text-black h5">
                    <?php
                      if(!empty($category_name)){
                        echo "Shop ". $category_name ;
                      }
                      else{
                        echo "Shop";
                      }
                    ?>
                  </h2>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="products-wrap border-top-0">
  <div class="container-fluid">
    <div class="row no-gutters products">
        <?php 
            $connection = new DBConnection;
            if(isset($_GET['category_id'])){
              $category_id = $_GET['category_id'];
              $select_category_name = "SELECT category_name FROM product_categories WHERE category_id='$category_id'";
              $scnRes = mysqli_query($connection->getConnection(),$select_category_name);
              while($row = $scnRes->fetch_assoc()){
                $category_name = $row['category_name'];
              }
              $select_category_products = "SELECT * FROM products WHERE product_category='$category_id' LIMIT 6";
              $scpRes = mysqli_query($connection->getConnection(),$select_category_products);
              if ($scpRes->num_rows > 0){
                while($row = $scpRes->fetch_assoc()){
                    $product_name = $row['product_name'];
                    $poduct_description = $row['product_description'];
                    $product_price = $row['product_price'];
                    $product_image = $row['product_image'];
                    $product_vendor = $row['vendor_id'];
                    $product_id = $row['product_id'];
                    echo '<div class="col-6 col-md-6 col-lg-6 border-top">
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
              else{
                echo '<span>No products found in this category</span>';
              }
            }
            else{
              $select_products= "SELECT * FROM products LIMIT 6";
              $spRes = mysqli_query($connection->getConnection(),$select_products);
              if($spRes->num_rows > 0){
                while($row = $spRes->fetch_assoc()){
                  $product_name = $row['product_name'];
                  $poduct_description = $row['product_description'];
                  $product_price = $row['product_price'];
                  $product_image = $row['product_image'];
                  $product_vendor = $row['vendor_id'];
                  $product_id = $row['product_id'];
                  echo '<div class="col-6 col-md-6 col-lg-6 border-top">
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
              else{
                echo '<span>No products have been added</span>';
              }
            }
        ?>
    </div>
  </div>
</div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="border p-4 mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
<!--                 <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li> -->
                <?php include './getCategories.php'?>
              </ul>
            </div>

            <div class="border p-4 mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            
            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>We are an online store hurrah!</p>
            </div>
          </div>
          <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quick Links</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Shopping cart</a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3">
              <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">Contact Info</h3>
                <ul class="list-unstyled">
                  <li class="address">Nairobi, Kenya</li>
                  <li class="phone"><a href="tel://+254799008531">+254799008531</a></li>
                  <li class="email">customercare@himall.com</li>
                </ul>
              </div>

            
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <!-- <p>
                Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
              </p> -->
              <p>Copyright ©2019 Himall</p>
            </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>