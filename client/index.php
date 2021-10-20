<?php 
  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
  /*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */ 
  //get slider
  $query = "SELECT * FROM slider LIMIT 3";
  $stmt = $connection->prepare($query);

  // get 10 category
  $query_category = "SELECT * FROM loai_hang order by ma_loai desc LIMIT 10";
  $stmt_category = $connection->prepare($query_category);
  // get 30 product
  $products = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 30";
  $stmt_products = $connection->prepare($products);
  // get top 10 prodcut
  $top_10_product = "SELECT * FROM hang_hoa ORDER BY RAND() LIMIT 10";
  $stmt_product = $connection->prepare($top_10_product);
  // get product new feature
  $product_new = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 20";
  $stmt_product_new = $connection->prepare($product_new);
  // get product by category
  $product_by_category = "select loai_hang.ma_loai, loai_hang.ten_loai, hang_hoa.ten_hh, hang_hoa.don_gia, hang_hoa.hinh from loai_hang join hang_hoa ON loai_hang.ma_loai = hang_hoa.ma_loai";
  $stmt_product_by_category = $connection->prepare($product_by_category);

  // product best seller
  $product_best_seller = "SELECT * FROM hang_hoa where luot_xem >= 100; LIMIT 20";
  $stmt_product_best_seller = $connection->prepare($product_best_seller);

  /*
      -> dùng để truy cập vào phương thức
      prepare(): phương thức chuẩn bị 1 câu lệnh SQL
  */ 

  // slider
  $stmt->execute();
  $slider = $stmt->fetchAll();
  // category
  $stmt_category->execute();
  $categories = $stmt_category->fetchAll();

  //products 
  $stmt_products->execute();
  $products = $stmt_products->fetchAll();
  
  // top 10 product 
  $stmt_product->execute();
  $top_10_product = $stmt_product->fetchAll();

  // product by category
  $stmt_product_by_category->execute();
  $product_by_category = $stmt_product_by_category->fetchAll();

  // get product new 
  $stmt_product_new->execute();
  $product_new = $stmt_product_new->fetchAll();
  // get product best seller 
  $stmt_product_best_seller->execute();
  $product_best_seller = $stmt_product_best_seller->fetchAll();
?>
<!DOCTYPE HTML>
<html lang="en-US">

<!-- Mirrored from demo.7uptheme.com/html/kuteshop/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jul 2018 03:00:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include "./layout/header.php"; ?>
<body style="background:#fff">
<div class="wrap">
	<div id="header">
		<div class="header">
			<div class="top-header top-header4">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="account-login account-login3">
								<a href="./index.php">Trang Chủ</a>
								<a href="./checkout">Giỏ Hàng</a>
								<a href="./login.php">Đăng Nhập</a>
								<a href="./register.php">Đăng Ký</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Header -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="logo logo4">
						<h1 class="hidden">kuteshop wordpress theme</h1>
						<a href="./index.php"><img src="../client/public/images/home4/logo.png" alt="" /></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="smart-search4">
						<form class="smart-search-form">
							<input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Search...">
							<input type="submit" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="container">
			<div class="main-content-home3">
				<div class="row">
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="content-left3">
							<div class="banner-slider banner-slider3">
								<div class="wrap-item" data-transition="fade" data-autoplay="true" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                                    <?php foreach ($slider as $slide): ?>
									<div class="item-banner">
										<div class="banner-thumb">
											<a href="#"><img src="../images/<?php echo $slide['hinh'] ?>" alt="" /></a>
										</div>
										<div class="banner-info white animated" data-animated="zoomInLeft">
											<h2 class="title60"><span>mo</span>dell</h2>
											<h2 class="title30">for Women <span>2021</span></h2>
										</div>
									</div>
									<?php endforeach ?>
								</div>
							</div>
							<?php foreach ($product_by_category as $item): ?>
								<div class="new-product3">
									<h2 class="title14 bg-color white"><?php echo $item['ten_loai'] ?></h2>
									<div class="newpro-slider3 arrow-style3">
										<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
											<div class="item-newpro3">
												<div class="item-product item-product3">
													<div class="product-thumb">
														<a class="product-thumb-link" href="./detail.php">
															<img style="width: 350px; height:350px;" alt="" src="../images/<?php echo $item['hinh'] ?>">
														</a>
													</div>
													<div class="product-info">
														<h3 class="product-title"><a href="./detail.php"><?php echo $item['ten_hh'] ?></a></h3>
														<div class="product-price">
															<ins><span><?php echo $item['don_gia'] ?>VNĐ</span></ins>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="content-right3">
							<div class="betpro3 box-side">
								<h2 class="title14 white bg-color title-side">Danh mục Sản Phẩm</h2>
								<div class="content-side">
									
										 
                                    <?php foreach ($categories as $category): ?>
									<div class="item-toggle-tab">
										<h3 class="toggle-tab-title title14"><?php echo $category['ten_loai'] ?></h3>
									</div>
                                    <?php endforeach ?>
									<!-- End Item -->
								</div>
							</div>
							<!-- End Bet Pro -->
							<div class="box-side top-review3">
								<h2 class="title14 white bg-color title-side">Top 10 Sản Phẩm Yêu Thích</h2>
								<div class="content-side">
									<div class="review-slider3 arrow-style3">
										<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
											<div class="list-review3">
                                                <?php foreach ($top_10_product as $product): ?>
												<div class="item-product3">
													<div class="product-thumb">
														<a class="product-thumb-link" href="detail.html">
															<img alt="" src="../images/<?php echo $product['hinh'] ?>">
														</a>
													</div>
													<div class="product-info">
														<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
														<div class="product-price">
															<label>From:</label>
															<ins><span><?php echo $product['don_gia'] ?></span></ins>
														</div>
													</div>
												</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Top Review -->
							<div class="top-brand3 box-side">
								<h2 class="title14 white bg-color title-side">Sản Phẩm Mới</h2>
								<div class="content-side">
									<div class="brand-slider3 arrow-style3">
										<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,1]]">
											<div class="list-brand3">
												<?php foreach ($product_new as $item_product): ?>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../images/<?php echo $item_product['hinh']; ?>"></a>
												</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Top Brand -->
							<div class="advert3 box-side">
								<h2 class="title14 white bg-color title-side">Sản Phẩm Bán Chạy Nhất</h2>
								<div class="content-side">
									<div class="advert-slider3 arrow-style3">
										<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,1]]">
											<?php foreach ($product_best_seller as $item_product_best_seller): ?>
												<div class="item-advert3">
													<div class="banner-zoom">
														<a class="thumb-zoom" href="#"><img alt="" src="../images/<?php echo $item_product_best_seller['hinh'];?>"></a>
													</div>
													<h2 class="title14"><?php echo $item_product_best_seller['ten_hh']; ?></h2>
													<a href="./detail.php" class="btn-rect radius white bg-color">Chi Tiết Sản Phẩm</a>
												</div>
												<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	<div id="footer">
		<div class="footer footer3">
			<div class="service-footer3">
				<div class="container">
					<div class="service-slider3">
						<div class="wrap-item" data-pagination="false" data-navigation="false" data-items="6">
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for1.png" alt="" /></a>
								<h2 class="title14">Great Value</h2>
								<p>We offer competitive prices on our 100 million plus product range.</p>
							</div>
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for2.png" alt="" /></a>
								<h2 class="title14">Worldwide Delivery</h2>
								<p>With sites in 5 languages, we ship to over 200 countries & regions.</p>
							</div>
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for3.png" alt="" /></a>
								<h2 class="title14">Safe Payment</h2>
								<p>Pay with the world’s most popular and secure payment methods.</p>
							</div>
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for4.png" alt="" /></a>
								<h2 class="title14">Shop with Confidence</h2>
								<p>Our Buyer Protection covers your purchase from click to delivery.</p>
							</div>
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for5.png" alt="" /></a>
								<h2 class="title14">24/7 Help Center</h2>
								<p>Round-the-clock assistance for a smooth shopping experience.</p>
							</div>
							<div class="item-service3 white">
								<a class="service-icon" href="#"><img src="../client/public/images/home3/for6.png" alt="" /></a>
								<h2 class="title14">Shop On-The-Go</h2>
								<p>Download the app and get the world of AliExpress at your fingertips.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Service Footer3 -->
			<div class="container">
				<div class="footer-list-box">
					<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="newsletter-form footer-box">
								<h2 class="title14">Subscription</h2>
								<form>
									<input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Place enter your email">
									<input type="submit" value="Subscription">
								</form>
							</div>
							<div class="social-footer footer-box">
								<h2 class="title14">Stay Connected</h2>
								<div class="list-social">
									<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-6">
							<div class="menu-footer-box footer-box">
								<h2 class="title14">How to Buy</h2>
								<ul class="list-unstyled">
									<li><a href="#">Create an Account</a></li>
									<li><a href="#">Making Payments</a></li>
									<li><a href="#">Delivery Options</a></li>
									<li><a href="#">Buyer Protection</a></li>
									<li><a href="#">New User Guide</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-6">
							<div class="menu-footer-box footer-box">
								<h2 class="title14">Customer Service</h2>
								<ul class="list-unstyled">
									<li><a href="#">Customer Support</a></li>
									<li><a href="#">Affiliate Program</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">About us</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="contact-footer-box footer-box">
								<h2 class="title14">contact us</h2>
								<p class="formule-address">8901 Marmora Road, Glasgow, D04  89GR.</p>
								<p class="formule-phone">+1 800 559 6580<br>+1 504 889 9898</p>
								<p class="formule-email"><a href="mailto:email@demolink.org">email@demolink.org</a></p>
							</div>
						</div>
					</div>
				</div>
				<!-- End Footer List Box -->
			</div>
			<div class="payment-method text-center">
				<a href="#" class="wobble-vertical"><img src="../client/public/images/home4/pay1.png" alt="" /></a>
				<a href="#" class="wobble-vertical"><img src="../client/public/images/home4/pay2.png" alt="" /></a>
				<a href="#" class="wobble-vertical"><img src="../client/public/images/home4/pay3.png" alt="" /></a>
				<a href="#" class="wobble-vertical"><img src="../client/public/images/home4/pay4.png" alt="" /></a>
			</div>
			<!-- End Payment -->
			<div class="footer-tabs">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="item-tag-footer">
								<div class="title-tag-footer"><span style="width:130px">Beaty &amp; Health:</span></div>
								<div class="list-tag-footer">
									<a href="#">Trimmers</a>
									<a href="#">Deodorants </a>
									<a href="#">Men's Perfume </a>
									<a href="#">Hair Care</a>
									<a href="#">Women's Perfume</a>
									<a href="#">Face Packs</a>
									<a href="#">Oral Care / Shavers & Razors</a>
								</div>
							</div>
							<div class="item-tag-footer">
								<div class="title-tag-footer"><span style="width:130px">electronics:</span></div>
								<div class="list-tag-footer">
									<a href="#">LED TV </a>
									<a href="#">Speakers </a>
									<a href="#">Home Theatre</a>
									<a href="#">Camera</a>
									<a href="#">Office Electronics</a>
									<a href="#">Gaming Consoles </a>
									<a href="#">DVD Players </a>
									<a href="#">Ipods </a>
									<a href="#">Landline Phones </a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="item-tag-footer">
								<div class="title-tag-footer"><span style="width:80px">sports:</span></div>
								<div class="list-tag-footer">
									<a href="#">Home Gym </a>
									<a href="#">Bench Equipment  </a>
									<a href="#">Exercise Bikes</a>
									<a href="#">Gloves & Wraps</a>
									<a href="#">Tennis</a>
									<a href="#">Football</a>
									<a href="#">Ab Exercisers</a>
									<a href="#">Sports wear</a>
									<a href="#">Treadmills</a>
									<a href="#">Bars</a>
									<a href="#">Dumbbells</a>
								</div>
							</div>
							<div class="item-tag-footer">
								<div class="title-tag-footer"><span style="width:80px">Fashion:</span></div>
								<div class="list-tag-footer">
									<a href="#">Sunglasses </a>
									<a href="#">Sarees </a>
									<a href="#">Bags & Wallets</a>
									<a href="#">Sleepwear</a>
									<a href="#">Suitings & Shirtings </a>
									<a href="#">Accessories</a>
									<a href="#">Formal Trousers</a>
									<a href="#">Casual Trousers </a>
									<a href="#">T-shirts</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Tab -->
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
							<p class="copyright">KUTESHOP © 2015-2016 kuteshop.com. All rights reserved.</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<p class="designby">Design by: <a href="mailto:7uptheme.com">7uptheme.com</a></p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Copyright -->
		</div>
	</div>
	<!-- End Footer -->
	<a href="#" class="radius scroll-top style1"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php include "./layout/footer.php"; ?>
</body>

<!-- Mirrored from demo.7uptheme.com/html/kuteshop/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jul 2018 03:02:41 GMT -->
</html>