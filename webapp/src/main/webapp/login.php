<?php
	session_start();
?>
<?php
    error_reporting(0);
    $errorInfo = "";
    $email = $password ="";
    $data = "";
    if($_POST['Login'] == "Login"){
      include 'DB_Connect.php';
      $username=trim($_POST['username']);
      $username=htmlspecialchars($username);
      $username=mysqli_real_escape_string($connection,$username);
      if(empty($username)){
        $errorInfo .= "Required Email</br>";
      }
      $password=trim($_POST['password']);
      $password=htmlspecialchars($password);
      $password=mysqli_real_escape_string($connection,$password);
      $password=md5($password);
      if(empty($password)){
        $errorInfo .= "Required password</br>";
      }
      if(empty($errorInfo)){
        $sql="SELECT * FROM user_info WHERE username='$username'";
        $result=mysqli_query($connection,$sql);
        if($result===false){
          die("Couldn't query the database");
        }else{
          $errorInfo .= "<li style='color:red;' class='active'>Please check your username again.</li>";
        }
        if(mysqli_num_rows($result)==1){
          $row = mysqli_fetch_assoc($result);
          if($row["password"]==$password){
            $_SESSION["message"] = "Login Successfully...";
            $_SESSION["username"]=$username;
            header("Location: index.php");
          }else{
            $errorInfo = "<li style='color:red;' class='active'>Please check your password again.</li>";
          }
        }
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>SLS Mobiles-Create Your Account</title>
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
        <div class="oferta_content"> <img src="images/iphone7-black.png" width="94" height="92" alt="" border="0" class="oferta_img" />
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
        <li><a href="Recharge.html" class="nav3">Recharge</a></li>
        <li class="divider"></li>
        <?php if(empty($_SESSION["username"])){ ?>
        <li><a href="registerform.php" class="nav4">Create your Account</a>
        <li><a href="login.php" class="nav4">Login</a></li>
        <?php }else{?>
        <li><a href="logout.php" class="nav4">Logout</a></li>
        <?php } ?>
        <li class="divider"></li>
        <li><a href="Shipping.html" class="nav5">Shipping</a></li>
        <li class="divider"></li>
        <li><a href="contact.html" class="nav6">Contact Us</a></li>
        <li class="divider"></li>
        
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
        
		 
            <div style="text-align:center">
	<h2 style="color:blue">Please Log In to SLS Mobiles</h2>
  <h2 style="color:red"><?php echo $error;?></h2>
        <center>
            <form action="" method="post">
                <table>
				<strong>
                    
					<tr>
                        <td><strong>User Name:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td><strong>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
					
            <tr>
                        <td><input type="submit" name="Login" value="Login"></td>
                        <td><input type="reset" value="Reset"></td>
                    </tr>
		</strong>
		</table>
        </form>
		</center>
		</div>
            
  <div class="footer">
    <div class="left_footer"> <img src="images/footerlogo.png" alt="" width="170" height="49"/> </div>
    <div class="center_footer"> Copyright © 2017 <a href="http://www.slsmobiles.in">SLS Mobiles</a><br />
      
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="index.html">home</a> <a>about</a> <a>sitemap</a> <a></a> <a href="contact.html">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->

</html>
<?
	function redirect($file)
	{
		$host=$_SERVER["HTTP_HOST"];
		$path=rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
		header("Location:http://$host$path/$file");
	}
?>