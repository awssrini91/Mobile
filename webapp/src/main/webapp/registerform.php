<?php
  session_start();
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
	<h2>Please enter the following information to create your account</h2>
  <?php
    error_reporting(0);
    $errorInfo = "";
    $email = $password  = $gender = $dob = $qualification = $state =$address= "";
    $data = "";
    if($_POST['register'] == "Register"){
    include 'DB_Connect.php';

      $email=trim($_POST['email']);
      $email=htmlspecialchars($email);
      $email=mysqli_real_escape_string($connection,$email);
      if(empty($email)){
        $errorInfo .= "Required Email</br>";
      }

      $username=trim($_POST['username']);
      $username=htmlspecialchars($username);
      $username=mysqli_real_escape_string($connection,$username);
      if(empty($username)){
        $errorInfo .= "Required Usernames</br>";
      }

      $password=trim($_POST['password']);
      $password=htmlspecialchars($password);
      $password=mysqli_real_escape_string($connection,$password);
      $password=md5($password);
      if(empty($password)){
        $errorInfo .= "Required Password</br>";
      }

      $gender=trim($_POST['gender']);
      $gender=htmlspecialchars($gender);
      $gender=mysqli_real_escape_string($connection,$gender);
      if(empty($gender)){
        $errorInfo .= "Required Gender</br>";
      }

      $dob=trim($_POST['dob']);
      $dob=htmlspecialchars($dob);
      $dob=mysqli_real_escape_string($connection,$dob);
      if(empty($dob)){
        $errorInfo .= "Required Date of Birth</br>";
      }

      $qualification=trim($_POST['qualification']);
      $qualification=htmlspecialchars($qualification);
      $qualification=mysqli_real_escape_string($connection,$qualification);
      if(empty($qualification)){
        $errorInfo .= "Required Qualification</br>";
      }

      $state=trim($_POST['state']);
      $state=htmlspecialchars($state);
      $state=mysqli_real_escape_string($connection,$state);
      if(empty($state)){
        $errorInfo .= "Required State</br>";
      }

      $address=trim($_POST['address']);
      $address=htmlspecialchars($address);
      $address=mysqli_real_escape_string($connection,$address);
      if(empty($address)){
        $errorInfo .= "Required Address</br>";
      }

    if(empty($errorInfo)){
      $result=mysqli_query($connection, "SELECT `username` FROM `user_info` WHERE `username` LIKE '$username'");
      if(mysqli_num_rows($result)==1){
        while($row=mysqli_fetch_array($result)){
          if(($row[0] == $username)) {
            $errorInfo .= '<li>The '.$username.' is already exist!!!</li>';
          }
        }
      }else{
        $sql="INSERT INTO user_info ( email, username, password, gender, dob, qualification, state, address) VALUES ('$email' , '$username', '$password', '$gender', '$dob', '$qualification', '$state', '$address')";
        if(!mysqli_query($connection,$sql)) {
          die('Error: ' . mysqli_error($connection));
        }else{
          $sql="INSERT INTO login_info (username, password) VALUES ('$username', '$password')";
          if (!mysqli_query($connection,$sql)) {
              die('errorInfo: ' . mysqli_error($connection));
          }
          $_SESSION["message"] = "Registered Successfully!!!";
          header("Location: index.php");
          exit();
        }
        }
      mysqli_free_result($result);
      mysqli_close($connection);
      
    }
  }
?>
    <center>
    <form style="border: 1px solid lightyellow;padding-left: 5px;margin-right: 50%;background-color: rgba(248, 248, 239, 0.56);" action="" method="post">
        <center>            
        <?php   if(!empty($errorInfo)) {
            echo("<h4>Form Errors List as follow:</h4><div style='color:red'>".$errorInfo."</div>\n");
        }?>
        </center> 
                <table>
                <h2>Please give the details</h2>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" size="30"></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" size="30"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" size="30"></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><input type="radio" name="gender" value="M" checked>Male
                        <br><input type="radio" name="gender" value="F">Female</td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td><input type="date" name="dob" size="30"></td>
                    </tr>
                    <tr>
                        <td>Qualification:</td>
                        <td><input type="text" name="qualification" size="30"></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td>
                            <select name="state">
                              <option value="AL">Alabama-AL</option>
                              <option value="AK">Alaska-AK</option>
                              <option value="AZ">Arizona-AZ</option>
                              <option value="AR">Arkansas-AR</option>
                              <option value="CA">California-CA</option>
                              <option value="CO">Colorado-CO</option>
                              <option value="CT">Connecticut-CT</option>
                              <option value="DE">Delaware-DE</option>
                              <option value="DC">District Of Columbia-DE</option>
                              <option value="FL">Florida-FL</option>
                              <option value="GA">Georgia-GA</option>
                              <option value="HI">Hawaii-HI</option>
                              <option value="ID">Idaho-ID</option>
                              <option value="IL">Illinois-IL</option>
                              <option value="IN">Indiana-IN</option>
                              <option value="IA">Iowa-IA</option>
                              <option value="KS">Kansas-KS</option>
                              <option value="KY">Kentucky-KY</option>
                              <option value="LA">Louisiana-LA</option>
                              <option value="ME">Maine-ME</option>
                              <option value="MD">Maryland-MD</option>
                              <option value="MA">Massachusetts-MA</option>
                              <option value="MI">Michigan-MI</option>
                              <option value="MN">Minnesota-MN</option>
                              <option value="MS">Mississippi-MS</option>
                              <option value="MO">Missouri-MO</option>
                              <option value="MT">Montana-MT</option>
                              <option value="NE">Nebraska-NE</option>
                              <option value="NV">Nevada-NV</option>
                              <option value="NH">New Hampshire-NV</option>
                              <option value="NJ">New Jersey-NJ</option>
                              <option value="NM">New Mexico-NM</option>
                              <option value="NY">New York-NY</option>
                              <option value="NC">North Carolina-NC</option>
                              <option value="ND">North Dakota-ND</option>
                              <option value="OH">Ohio-OH</option>
                              <option value="OK">Oklahoma-OK</option>
                              <option value="OR">Oregon-OR</option>
                              <option value="PA">Pennsylvania-PA</option>
                              <option value="RI">Rhode Island-RI</option>
                              <option value="SC">South Carolina-SC</option>
                              <option value="SD">South Dakota-SD</option>
                              <option value="TN">Tennessee-TN</option>
                              <option value="TX">Texas-TX</option>
                              <option value="UT">Utah-UT</option>
                              <option value="VT">Vermont-VT</option>
                              <option value="VA">Virginia-VA</option>
                              <option value="WA">Washington-WA</option>
                              <option value="WV">West Virginia-WV</option>
                              <option value="WI">Wisconsin-WI</option>
                              <option value="WY">Wyoming-WY</option> 
                            </select>
                        </td>
                    </tr>
                    <tr>
                      <td>Address:</td>
                      <td><textarea rows="4" cols="30" name="address"></textarea></td>
                    </tr>
                    <br><br>
                    <tr>
                        <td><input name="register" type="submit" value="Register"></td>
                        <td><input type="reset" value="Clear"></td>
                    </tr>
                </table>
        </form>

		</center>
		</div>
  <br><br><br><br>
  <div class="footer">
    <div class="left_footer"> <img src="images/footerlogo.png" alt="" width="170" height="49"/> </div>
    <div class="center_footer"> Copyright © 2017 <a href="http://www.slsmobiles.in">SLS Mobiles</a><br />
      
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="index.html">home</a> <a>about</a> <a>sitemap</a> <a></a> <a href="contact.html">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->

</html>