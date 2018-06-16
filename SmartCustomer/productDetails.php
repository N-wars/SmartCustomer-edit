<?php
$id=$_GET['id'];
include('view.php');
$obj=new database();
$query="select * from product where pid='$id'";
    $result=$obj->details($query);
    
$row = $result->fetch_assoc();

$query="select *from price where pid='$id'";
$result1=$obj->price($query);
$result4=$obj->price($query);
$count=1;
 

?>
<!DOCTYPE html>
<html>

<head>
<style>
#customers {
    
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
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
                <div class="container"><a class="navbar-brand" href="index.php" style="font-size:52px;">Smart Customer</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                   
        </div>
        </nav>
    </div>
    </div>
    <div class="photo-gallery" style="margin:-22px;padding:8px;height:110px;">
        <div class="container" style="color:rgb(96,151,207);background-image:url(&quot;assets/img/smart-customer-service.jpg&quot;);">
           <form class="search-form" action="searchresult.php" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" name="productname" type="text" placeholder="I am looking for.." required>
                    <div class="input-group-append"><input name="submit" class="btn btn-light" value="search" type="submit"></div>
                </div>
            </form>
        </div>
    </div>
    <div></div>
   <div class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center"><?php echo $row['name'];?></h1>
                       <img class="img-fluid" src="assets/img/<?php echo $row['image'].'.jpg' ?>"></div>
                    <div class="text">
                        <p class="text-center"><?php echo $row['description'];?></p><br><br>
                        <figure>
                            <table id="customers">
                            <tr>
                            <td>S.N</td>
                            <td>Shopping Mall Name</td>
                            <td>Price</td>
                            <td>Location</td>
                            <td>Distance</td>
                            <td>Navigate</td></tr><?php
                            $row5 = $result4->fetch_assoc();
                             $minimum=$row5['price'];
                            while($row2 = $result4->fetch_assoc()){
   
    if($minimum>$row2['price']){
        $minimum=$row2['price'];
    }

    }
    
                            while($row1 = $result1->fetch_assoc()){
    

                            ?>
                            <tr>
                            <td><?php echo $count; $count++;?></td>
                            <td>
                            <?php 
                            $id=$row1['sid'];
                            $query="select name from shoppingcenter where sid='$id'";
                            $con=mysqli_connect("localhost","root","","smartcustomer");
   
                            $result=mysqli_query($con,$query);
                            $rowcompayn=$result->fetch_assoc();
                            echo $rowcompayn['name']; ?>
                            </td>
                            <td><?php
                            $id=$row1['sid'];
                            $sid=$row1['pid'];
                            $query="select * from price where sid='$id' and pid='$sid'";
                            $con=mysqli_connect("localhost","root","","smartcustomer");
                            $result2=mysqli_query($con,$query);

                           $rowprice=$result2->fetch_assoc();
                            $price=$rowprice['price']; 
                            if($price==$minimum){
                                echo "<b style='color:red;'><i>".$price."</i></b>";
                            }
                            else{
                                echo $price;
                            }
                            ?></td>
                            <td><?php 
                            $id=$row1['sid'];
                            $query="select * from shoppingcenter where sid='$id'";
                            $con=mysqli_connect("localhost","root","","smartcustomer");
   
                            $result3=mysqli_query($con,$query);
                            $rowcompayn1=$result3->fetch_assoc();
                            echo $rowcompayn1['location']; ?></td>
                            <td><?php 
                            $id=$row1['sid'];
                            $query="select * from shoppingcenter where sid='$id'";
                            $con=mysqli_connect("localhost","root","","smartcustomer");
   
                            $result=mysqli_query($con,$query);
                            $rowcompayn=$result->fetch_assoc();
                            $distance=distance(27.7349251,85.3127936, $rowcompayn['lattitude'], $rowcompayn['longitude'], "K");
    
                            echo number_format((float)$distance, 2, '.', '')."KM";
                             ?></td>
                            <td><a href="https://www.google.com/maps/
dir/?api=1&origin=Gongabu&destination=<?php echo $rowcompayn['name'];?> &travelmode=Driving"><img src="assets/img/untitled.png" height="50px" width="50px"></a></td></tr>
                           
<?php }?>
                            </table>                          
                        </figure>
                    </div>
                </div>
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
<?php
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}



?>