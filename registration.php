
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Services on the Go</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php
	require 'php/connection.php';
	include 'template/header.php';
?>
	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="registration.html">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="main_btn" href="#">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
<?php
// define variables and set to empty values
$nameErr = $addErr = $passErr = $passLengthErr = $tel_noErr = "";
$fname = $lname = $email = $user_name = $pass = $pass_Con = $tel_no = $add_txt = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $nameErr = "Only letters and white space allowed in Name"; 
	}
  }
  if (empty($_POST["lname"])) {
    $nameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $nameErr = "Only letters and white space allowed in Name"; 
    }
  }
  $pass = test_input($_POST["password"]);
  $pass_Con = test_input($_POST["passCon"]);
	if($pass !== $pass_Con){
		$passErr = "Password did not match";
	}
   $passLength = strlen($pass);
   
  if($passLength < 6){
	 $passLengthErr = "Password must be minimum of 6 characters";
  }
	$gender = test_input($_POST["gender"]);
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['btnReg'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email_add'];
			$user_name = $_POST['username'];
			$pass = $_POST['password'];
			$pass_Con = $_POST['passCon'];
			$tel_no = $_POST['tel_no'];
			$add_txt = $_POST['add'];
			$gen = $_POST['gender'];
	
	if($nameErr != "Only letters and white space allowed in Name"){
			//user check the length
			$userLength = strlen($user_name);
			if($userLength < 5){
				$userErr = "Username must be minimum of 5 Characters";
			}
			//check the password length
			if($pass !== $pass_Con){
					$passErr= "Password did not match";
			}
			if($pass == $pass_Con And $passLength >= 6 And $userLength >= 5){
				echo "Not Ok";
				$sql=$link->query("INSERT INTO tblclient values('Null',
				'$fname','$lname','email','$user_name','$pass','$tel_no','$add_txt','$gen')");

				if($sql){
						$_SESSION['Username'] = $user_name;
						echo " <script>
								window.alert('Registered');
								window.location.href = 'index.php'
							   </script>";
				}
						}else{
							if($passLength < 6){
								echo "<script>
										window.alert('Password is less than 6 Characters');
									</script>";
							}
							if($userLength < 5){
								echo "<script>
										window.alert('Username is less than 5 Characters');
									</script>";
							}
						}
				
					}
				}
?>
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form class="row login_form" action="" method="post" id="contactForm">
							<div class="col-md-12 form-group">
								<span class="error" style = "color:red"> <?php echo $nameErr;?></span>
								<div id = "name_valid_check"></div>
								<input type="text" class="form-control" onkeyup = "checking_name_first()" id = "f_name_check" name="fname" placeholder="First Name" value="<?php echo $fname;?>"required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" onkeyup = "checking_name_last()" id = "l_name_check" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email_add" placeholder="Email Address" value="<?php echo $email;?>" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_name;?>"required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="passCon" name="passCon" placeholder="Confirm password" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="tel_no" name="tel_no" placeholder="Tel. No." value="<?php echo $tel_no;?>"required>
							</div>
							<div class="col-md-12 form-group">
								<textarea name="add" required><?php echo $add_txt;?></textarea> 
							</div>
							<div class="col-md-12 form-group">
								<input type = "radio" name = "gender" value = "Male" required>Male<br>
								<input type = "radio" name = "gender" value = "Female"required>Female<br>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" id = "register" value="Register" name = "btnReg" class="btn submit_btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Newsletter</h6>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget instafeed">
						<h6 class="footer_title">Instagram Feed</h6>
						<ul class="list instafeed d-flex flex-wrap">
							<li>
								<img src="img/instagram/Image-01.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-02.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-03.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-04.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-05.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-06.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-07.jpg" alt="">
							</li>
							<li>
								<img src="img/instagram/Image-08.jpg" alt="">
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->




	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/theme.js"></script>
</body>
<script src = "js/jquery.js"></script>
<script>
	function checking_name_first(){
			var valid_name_f = document.getElementById("f_name_check").value;
			$.post("fname_check.php",
			{
				fname_lname_valid: valid_name_f
			},
			function(data, status){
				if(data == '<span style = "color:red">Invalid Name!</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<p style = "color:blue">Invalid Mobile #</p>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		}
	function checking_name_last(){
			var valid_name_l = document.getElementById("l_name_check").value;
			$.post("lname_check.php",
			{
				lname_valid: valid_name_l
			},
			function(data, status){
				if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		}		
</script>
</html>