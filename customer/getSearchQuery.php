<?
    if(isset($_POST['search-field'])){
        $searchQuery = $_POST['search-field'];
        $searchUrl = 'http://localhost/himall/customer/shop.php?q='.$searchQuery;
        header('Location: '.$searchUrl);
    }

?>