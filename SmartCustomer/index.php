<?php
include('view.php');
$obj=new database();
    $result=$obj->select();
  

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCustomer</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <div class="header-blue" style="height:154px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#" style="font-size:52px;">Smart Customer</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span></button>
                   
        </div>
        </nav>
    </div>
    </div>
    <div class="photo-gallery" style="margin:-22px;padding:8px;height:110px;">
        <div class="container" style="color:rgb(96,151,207);background-image:url(&quot;assets/img/smart-customer-service.jpg&quot;);">
            <form class="search-form" action="searchresult.php" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" name="productname" type="text" placeholder="I am looking for.." required>
                    <div class="input-group-append"><input  class="btn btn-light" name="submit" value="search" type="submit"></div>
                </div>
            </form>
        </div>
    </div>
    <div></div>
    <div class="container" style="color:rgb(96,151,207);background-image:url(&quot;assets/img/smart-customer-service.jpg&quot;); margin-top:20px;">
           <H1>Frequently Searched Products</H1>
        </div>
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
               <?php 
                while($row = $result->fetch_assoc()) {

               ?> <div class="col-sm-6 col-md-4 item"><a href="productdetails.php?id=<?php echo $row['pid'];?>"><img class="img-fluid"  height="200px" width="200px"  src="assets/img/<?php echo $row['image'].'.jpg' ?>"></a>
                    <h3 class="name"><?php echo $row['name'];?> </h3>
                    <p class="description"><?php echo $row['description'];?></p><a href="#" class="action"><i class="fa fa-arrow-circle-right"></i></a></div>
                    <?php }
                    ?>
               
    </div>
    </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Navigate</a></li>
                            <li><a href="#">Compare price</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>About Us</h3>
                        <p>Providing the most accurate compared price of different supermarkets and the best rates to our users is ours primary focus.</p>
                    </div>
                    
                </div>
                <p class="copyright">SmartCustomer © 2018</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>