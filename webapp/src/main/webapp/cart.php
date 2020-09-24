<?php
session_start();
include 'pdo_connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>SLS Mobiles</title>
<meta>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a>Advanced Search</a></div>
      <input type="text" class="search_input" name="search" />
      <input type="image" src="images/search.gif" class="search_bt"/>
    </div>
    <div class="languages">
      <div class="lang_text">Languages:</div>
      <a><img src="images/en.gif" alt="" border="0" /></a> <a class="lang"><img src="images/us.gif" alt="" border="0" /></a> </div>
  </div>
  <div id="header">
    <div id="logo"> <a href="index.php"><img src="images/logo1.png" alt="" border="0" width="237" height="140" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
      <div class="oferta">
        <div class="oferta_content"> <img src="images/iphone7-black.png" width="94" height="102" alt="" border="0" class="oferta_img" />
          <div class="oferta_details">
            <div class="oferta_title">IPhone 7</div>
            <div class="oferta_text" style="color:black"> The iPhone 7 and 7 Plus are deeply unusual devices.
			They are full of aggressive breaks from convention while wrapped in cases that look almost exactly like their two direct predecessors.
			Even that continuity of design is a break from convention. </div>
            <a href="details.html" class="details">details</a> </div>
        </div>
        <div class="oferta_pagination"> <span class="current">1</span> <a>2</a> <a>3</a> <a>4</a> <a>5</a> </div>
      </div>
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
    </div>
    <!-- end of oferte_content-->
    <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="index.php" class="nav1"> Home</a></li>
        <li class="divider"></li>
        <li><a href="products.php" class="nav2">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav3">Recharge</a></li>
        <li class="divider"></li>
        <?php if(empty($_SESSION["username"])){ ?>
        <li><a href="registerform.php" class="nav4">Create your Account</a>
        <li><a href="login.php" class="nav4">Login</a></li>
        <?php }else{?>
        <li><a href="logout.php" class="nav4">Logout</a></li>
        <?php } ?>
        <li class="divider"></li>
		</li>
        <li class="divider"></li>
        <li><a href="#" class="nav5">Shipping</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav6">Contact Us</a></li>
        <li class="divider"></li>
        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
	
	<center><?php 
      if(!empty($_SESSION["message"])){
        ?>
        <center style="margin-left: 10%;border: 4px dotted blue;">
          <h1 style="color:green;">
          <?php echo $_SESSION["message"];
          ?></h1>
        </center>
      <?php 
        $_SESSION["message"]=null;
      }?></h></center>
    <!-- end of menu tab -->
        <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        <li class="odd"><a href="phones.html">PHONES</a></li>
        <li class="even"><a href="tablets.html">TABLETS</a></li>
        <li class="odd"><a href="ACCESSORIES.html">ACCESSORIES</a></li>
        
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a>Microsoft mobile</a></div>
        <div class="product_img"><a><img src="images/microsoft.gif" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">450$</span> <span class="price">299$</span></div>
      </div>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a class="join">join</a> </div>
     
    </div>
    <div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
<?php

if(isset($_COOKIE["cart"]))
{

$result = json_decode($_COOKIE["cart"], true);
$sql = "SELECT * FROM product";
$resultQuery = $pdo->query($sql);

echo "<table border='1' align='center'>";
echo "<th>Name</th><th>Quantity</th><th>Price</th>";

$i=1;
$totalcost =0;
while($row=$resultQuery->fetch())
{

if(!isset($result[$i])){
$result[$i] = 0;
}
echo "<tr><td>".$row['name']."</td> <td>".$result[$i]."</td><td> $".$result[$i]*$row['price']."</td></tr>";
$totalcost = $totalcost+$result[$i]*$row['price'];
$i++;


}
echo "<tr><td></td><td>Total</td><td> $".$totalcost."</td></tr>";
echo "</table>";

}
else
{
echo "cart is empty";
}

?>
 </center>
        
    
    </div>
   
    <!-- end of right content -->
  </div>
  </div>
  <!-- end of main content -->
<!--   <div class="footer">
    <div class="left_footer"> <img src="images/footerlogo.png" alt="" width="170" height="49"/> </div>
    <div class="center_footer"> Copyright © 2017 <a href="http://www.slsmobiles.in"><strong>SLS Mobiles</a><br />
      
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="index.html">home</a> <a>about</a> <a>sitemap</a> <a></a> <a href="contact.html">contact us</a> </div>
  </div> -->
</div>
<!-- end of main_container -->

</html>