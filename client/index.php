<?php 
  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
  /*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */ 
  $query = "SELECT * FROM slider LIMIT 3";
  $stmt = $connection->prepare($query);

  $query_category = "SELECT * FROM loai_hang order by ma_loai desc LIMIT 10";
  $stmt_category = $connection->prepare($query_category);

  $products = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 30";
  $stmt_products = $connection->prepare($products);

  $top_10_product = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 10";
  $stmt_product = $connection->prepare($top_10_product);
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

?>
<!DOCTYPE HTML>
<html lang="en-US">

<!-- Mirrored from demo.7uptheme.com/html/kuteshop/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jul 2018 03:00:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Kute Shop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
	<meta name="keywords" content="Kute Shop,7uptheme" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name='revisit-after' content='1 days' />
	<title>Kute Shop | Home Style 3</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/jquery.fancybox.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/owl.carousel.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/owl.transitions.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/owl.theme.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/jquery.mCustomScrollbar.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/animate.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/hover.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/libs/flipclock.css"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/color-blue.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/theme.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/responsive.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="../client/public/css/browser.css" media="all"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
</head>
<body style="background:#fff">
<div class="wrap">
	<div id="header">
		<div class="header">
			<div class="top-header top-header4">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="account-login account-login3">
								<a href="#">My Account</a>
								<a href="#">checkout</a>
								<a href="#">Login</a>
								<a href="#">Register</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Header -->
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
							
							<div class="new-product3">
                                <h2 class="title14 bg-color white">Danh Mục A</h2>
								<div class="newpro-slider3 arrow-style3">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
                                        <?php foreach ($products as $product): ?>
										<div class="item-newpro3">
											<div class="item-product item-product3">
												<div class="product-thumb">
													<a class="product-thumb-link" href="detail.html">
														<img style="width: 350px; height:500px;" alt="" src="../images/<?php echo $product['hinh'] ?>">
													</a>
												</div>
												<div class="product-info">
													<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
													<div class="product-price">
														<ins><span><?php echo $product['don_gia'] ?>VNĐ</span></ins>
													</div>
												</div>
											</div>
										</div>
                                        <?php endforeach ?>
									</div>
								</div>
							</div>
                            <div class="new-product3">
                                <h2 class="title14 bg-color white">Danh Mục A</h2>
								<div class="newpro-slider3 arrow-style3">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
                                        <?php foreach ($products as $product): ?>
										<div class="item-newpro3">
											<div class="item-product item-product3">
												<div class="product-thumb">
													<a class="product-thumb-link" href="detail.html">
														<img style="width: 350px; height:500px;" alt="" src="../images/<?php echo $product['hinh'] ?>">
													</a>
												</div>
												<div class="product-info">
													<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
													<div class="product-price">
														<ins><span><?php echo $product['don_gia'] ?>VNĐ</span></ins>
													</div>
												</div>
											</div>
										</div>
                                        <?php endforeach ?>
									</div>
								</div>
							</div>
                            <div class="new-product3">
                                <h2 class="title14 bg-color white">Danh Mục A</h2>
								<div class="newpro-slider3 arrow-style3">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
                                        <?php foreach ($products as $product): ?>
										<div class="item-newpro3">
											<div class="item-product item-product3">
												<div class="product-thumb">
													<a class="product-thumb-link" href="detail.html">
														<img style="width: 350px; height:500px;" alt="" src="../images/<?php echo $product['hinh'] ?>">
													</a>
												</div>
												<div class="product-info">
													<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
													<div class="product-price">
														<ins><span><?php echo $product['don_gia'] ?>VNĐ</span></ins>
													</div>
												</div>
											</div>
										</div>
                                        <?php endforeach ?>
									</div>
								</div>
							</div>
                            <div class="new-product3">
                                <h2 class="title14 bg-color white">Danh Mục A</h2>
								<div class="newpro-slider3 arrow-style3">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
                                        <?php foreach ($products as $product): ?>
										<div class="item-newpro3">
											<div class="item-product item-product3">
												<div class="product-thumb">
													<a class="product-thumb-link" href="detail.html">
														<img style="width: 350px; height:500px;" alt="" src="../images/<?php echo $product['hinh'] ?>">
													</a>
												</div>
												<div class="product-info">
													<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
													<div class="product-price">
														<ins><span><?php echo $product['don_gia'] ?>VNĐ</span></ins>
													</div>
												</div>
											</div>
										</div>
                                        <?php endforeach ?>
									</div>
								</div>
							</div>
                            <div class="new-product3">
                                <h2 class="title14 bg-color white">Danh Mục A</h2>
								<div class="newpro-slider3 arrow-style3">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[1024,3]]">
                                        <?php foreach ($products as $product): ?>
										<div class="item-newpro3">
											<div class="item-product item-product3">
												<div class="product-thumb">
													<a class="product-thumb-link" href="detail.html">
														<img style="width: 350px; height:500px;" alt="" src="../images/<?php echo $product['hinh'] ?>">
													</a>
												</div>
												<div class="product-info">
													<h3 class="product-title"><a href="detail.html"><?php echo $product['ten_hh'] ?></a></h3>
													<div class="product-price">
														<ins><span><?php echo $product['don_gia'] ?>VNĐ</span></ins>
													</div>
												</div>
											</div>
										</div>
                                        <?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="content-right3">
							<div class="betpro3 box-side">
								<h2 class="title14 white bg-color title-side">Danh mục Sản Phẩm</h2>
								<div class="content-side toggle-tab toggle-betsale">
                                    <?php foreach ($categories as $category): ?>
									<div class="item-toggle-tab">
										<h3 class="toggle-tab-title title14"><?php echo $category['ten_loai'] ?></h3>
										<div class="toggle-tab-content">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-6">
													<div class="item-product3">
														<div class="product-thumb">
															<a class="product-thumb-link" href="detail.html">
																<img alt="" src="../client/public/images/photos/fashion/9.jpg">
															</a>
															<a class="quickview-link plus pos-middle fancybox.iframe" href="quick-view.html"><span>quick view</span></a>
														</div>
														<div class="product-info">
															<div class="product-price">
																<del><span>$135.00</span></del>
																<ins><span>$123.00</span></ins>
															</div>
															<span class="order-pro">489 Order</span>
														</div>
													</div>
													<div class="item-product3">
														<div class="product-thumb">
															<a class="product-thumb-link" href="detail.html">
																<img alt="" src="../client/public/images/photos/fashion/2.jpg">
															</a>
															<a class="quickview-link plus pos-middle fancybox.iframe" href="quick-view.html"><span>quick view</span></a>
														</div>
														<div class="product-info">
															<div class="product-price">
																<del><span>$30.00</span></del>
																<ins><span>$20.00</span></ins>
															</div>
															<span class="order-pro">107 Order</span>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6">
													<div class="item-product3">
														<div class="product-thumb">
															<a class="product-thumb-link" href="detail.html">
																<img alt="" src="../client/public/images/photos/fashion/10.jpg">
															</a>
															<a class="quickview-link plus pos-middle fancybox.iframe" href="quick-view.html"><span>quick view</span></a>
														</div>
														<div class="product-info">
															<div class="product-price">
																<del><span>$80.00</span></del>
																<ins><span>$53.00</span></ins>
															</div>
															<span class="order-pro">500 Order</span>
														</div>
													</div>
													<div class="item-product3">
														<div class="product-thumb">
															<a class="product-thumb-link" href="detail.html">
																<img alt="" src="../client/public/images/photos/fashion/14.jpg">
															</a>
															<a class="quickview-link plus pos-middle fancybox.iframe" href="quick-view.html"><span>quick view</span></a>
														</div>
														<div class="product-info">
															<div class="product-price">
																<del><span>$70.00</span></del>
																<ins><span>$40.00</span></ins>
															</div>
															<span class="order-pro">29 Order</span>
														</div>
													</div>
												</div>
											</div>
										</div>
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
								<h2 class="title14 white bg-color title-side">top brands</h2>
								<div class="content-side">
									<div class="brand-slider3 arrow-style3">
										<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,1]]">
											<div class="list-brand3">
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top1.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top2.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top3.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top4.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top5.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top6.png"></a>
												</div>
											</div>
											<div class="list-brand3">
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top6.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top5.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top4.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top3.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top2.png"></a>
												</div>
												<div class="logo-brand">
													<a class="pulse" href="#"><img alt="" src="../client/public/images/home3/top1.png"></a>
												</div>
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
											<div class="item-advert3">
												<div class="banner-zoom">
													<a class="thumb-zoom" href="#"><img alt="" src="../client/public/images/photos/home3/ad-1.jpg"></a>
												</div>
												<h2 class="title14">Fashion & Accessories</h2>
												<p>Be for bag, Oleva, Unistar & more</p>
												<a href="#" class="btn-rect radius white bg-color">Shop now!</a>
											</div>
											<div class="item-advert3">
												<div class="banner-zoom">
													<a class="thumb-zoom" href="#"><img alt="" src="../client/public/images/photos/home3/ad-2.jpg"></a>
												</div>
												<h2 class="title14">Fashion & Accessories</h2>
												<p>Be for bag, Oleva, Unistar & more</p>
												<a href="#" class="btn-rect radius white bg-color">Shop now!</a>
											</div>
											<div class="item-advert3">
												<div class="banner-zoom">
													<a class="thumb-zoom" href="#"><img alt="" src="../client/public/images/photos/home3/ad-3.jpg"></a>
												</div>
												<h2 class="title14">Fashion & Accessories</h2>
												<p>Be for bag, Oleva, Unistar & more</p>
												<a href="#" class="btn-rect radius white bg-color">Shop now!</a>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="../client/public/js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="../client/public/js/libs/jquery.fancybox.js"></script>
<script type="text/javascript" src="../client/public/js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="../client/public/js/libs/owl.carousel.js"></script>
<script type="text/javascript" src="../client/public/js/libs/jquery.jcarousellite.js"></script>
<script type="text/javascript" src="../client/public/js/libs/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="../client/public/js/libs/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="../client/public/js/libs/TimeCircles.js"></script>
<script type="text/javascript" src="../client/public/js/libs/flipclock.js"></script>
<script type="text/javascript" src="../client/public/js/theme.js"></script>
</body>

<!-- Mirrored from demo.7uptheme.com/html/kuteshop/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jul 2018 03:02:41 GMT -->
</html>