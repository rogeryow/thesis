<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Fashiop</title>
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
	<link rel="stylesheet" href="css/sog.css">
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
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="category.html">Category</a>
						<a href="category.html">Women Fashion</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="latest_product_inner row">
						<?php
						$page = 1; 
						$num_per_page = 9;
						$start_from = ($page - 1) * 9;
						$sql = "SELECT * FROM `vw_services`";
						
						if(isset($_GET['category'])) {
							$category = $_GET['category'];
							$sql .= " WHERE category LIKE '" . $category . "' ";
						}
						if(isset($_GET['sub'])) {
							$sub = $_GET['sub'];
							$sql .= " AND Subcategory = '" . $sub . "' ";	
						}
						if(isset($_GET['page'])) { 
							$page = $_GET['page'];
						}

						$sql .= "  LIMIT $start_from, $num_per_page";

						$stmt = mysqli_stmt_init($link);

						if(mysqli_stmt_prepare($stmt, $sql)) {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							while($row = mysqli_fetch_assoc($result)) {
								$service_name = $row['Services_Title'];
								$service_price = $row['Services_Price'];
								$service_img = $row['Services_Img'];
								$path_img = "img/product/services/";
							?>
							<!-- template item start -->
							<div class="box-shad col-lg-4 col-md-4 col-sm-6">
								<div class="f_p_item">
									<div class="f_p_img">
										<img class="img-fit" src="<?php echo $path_img . $service_img ?>" alt="">
										<div class="p_icon">
											<a href="#">
												<i class="lnr lnr-heart"></i>
											</a>
											<a href="#">
												<i class="lnr lnr-cart"></i>
											</a>
										</div>
									</div>
									<a href="#">
										<h4><?php echo $service_name ?></h4>
									</a>
									<h5><?php echo "₱ " . $service_price ?></h5>
								</div>
							</div>
							<!-- template item end -->
							<?php
							}
						}
						?>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Browse Categories</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
							<?php 
							$sql = "SELECT * FROM `tblcategory`";
							$stmt = mysqli_stmt_init($link);

							if(mysqli_stmt_prepare($stmt, $sql)) {
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);

								while($row = mysqli_fetch_assoc($result)) {
									$category_ID = $row['ID'];
									$category_name = $row['Category'];
									
									// subcategory start
									$sql2 = "SELECT * FROM `tblsubcategory` WHERE Category_ID LIKE '" . $category_ID. "'";
									$stmt2 = mysqli_stmt_init($link);

									if(mysqli_stmt_prepare($stmt2, $sql2)) {
										mysqli_stmt_execute($stmt2);
										$result2 = mysqli_stmt_get_result($stmt2);
										$rows = mysqli_num_rows($result2);

										if($rows > 0 ) {
											?> <li> <a href="#"><?php echo $category_name ?></a> <ul class="list"> <?php
											while($row = mysqli_fetch_assoc($result2)) {
												$subcategory_name = $row['Subcategory'];
												$href_sub = "category.php?category=" . $category_name . "&sub=" . $subcategory_name;
											?> <li> <a href="<?php echo $href_sub ?>"><?php echo $subcategory_name ?></a> </li> <?php
											}
											?> </ul> </li> <?php

										} else {
											$href_main = "category.php?category=" . $category_name;
											?> <li> <a href="<?php echo $href_main ?>"><?php echo $category_name ?></a> </li> <?php
										}
									}
								} 
							}
							?>
							</ul>
							</div>
						</aside>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">01</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">02</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">03</a>
						</li>
						<li class="page-item blank">
							<a class="page-link" href="#">...</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">09</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Subscribe for Our Newsletter</h2>
						<span>We won’t send any kind of spam</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div id="mc_embed_signup">
						<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
						 method="get" class="subscription relative">
							<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
							 required="">
							<!-- <div style="position: absolute; left: -5000px;">
									<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
								</div> -->
							<button type="submit" class="newsl-btn">Get Started</button>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->

	<?php include 'template/footer.php' ?>




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

</html>