<?php
  if(isset($_GET['product_id'])){
      include './DBConnection.php';
      $connection = new DBConnection;
      $product_id = $_GET['product_id'];
      $product_sql = "SELECT * FROM products WHERE product_id='$product_id'";
      $product_res = mysqli_query($connection->getConnection(),$product_sql);
      if($product_res->num_rows > 0){
          while($row = $product_res->fetch_assoc()){
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_vendor = $row['vendor_id'];
          }
      }
      $rating_sql = "SELECT avg_rating FROM product_ratings WHERE product_id='$product_id'";
      $rating_res = mysqli_query($connection->getConnection(),$rating_sql);
      if($rating_res->num_rows >0){
        while($row= $rating_res->fetch_assoc()){
          $avg_rating = $row['avg_rating'];
        }
      }
      else{
        $avg_rating = "Unrated";
      }


  }
  else{
    echo "You're not the man";
  }
?>
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
      <!-- Review CSS -->
      <link rel="stylesheet" href="css/product-review.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Review JS -->
    <script src='./js/review.js'></script>
    
  </head>
  <body>
  
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2 position-relative">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search for products...">
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
                
                <li><a href="shop.html">Shop</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icomoon icon-user"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="shop.html">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?echo $product_name?></strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="border">
              <img src="<?echo $product_image?>" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?echo $product_name?></h2>
            <p><?echo $product_description?></p>
            <p class="mb-4"><?echo $product_vendor?></p>
            <p><strong class="text-primary h4">KSH <?echo $product_price?></strong></p>
            
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="float-left col-12">
            <h2 class="text-uppercase">Ratings</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <h4 class ='text-black'>Current rating</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
<!--                 <div class="container">
                    <ul class= 'float-left list-inline' id= 'star-group'>
                        <li id= 'star-1'  onmouseover =' startHover(this)' onmouseout ='endHover(this)' data ='1' onClick= 'setRatingHandler(this)' class="star list-inline-item ">&#9733</li>
                        <li id= 'star-2'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='2' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                        <li id= 'star-3'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='3' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                        <li id= 'star-4'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='4' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                        <li id= 'star-5'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='5' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                    
                    </ul>
                </div> -->
                <h3><?echo $avg_rating?></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <h4 class ='text-black'>Rate</h4>
          </div>
        </div>
        <form class= action="">
          <div class="row">
            <div class="col-12">
              <div class="container">
                  <ul class= 'float-left list-inline' id= 'star-group'>
                      <li id= 'star-1'  onmouseover =' startHover(this)' onmouseout ='endHover(this)' data ='1' onClick= 'setRatingHandler(this)' class="star list-inline-item ">&#9733</li>
                      <li id= 'star-2'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='2' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                      <li id= 'star-3'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='3' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                      <li id= 'star-4'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='4' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                      <li id= 'star-5'  onmouseover = 'startHover(this)' onmouseout ='endHover(this)' data ='5' onClick= 'setRatingHandler(this)' class="star list-inline-item">&#9733</li>
                  
                  </ul>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class = 'float-left'>
                    <button type = 'submit' class = 'btn btn-primary'>Rate</button>
                </div>
              </div>
            </div>
      </form>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">More Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              
              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
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