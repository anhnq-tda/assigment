<?php 
  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
  /*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */ 
  $query = "SELECT * FROM slider LIMIT 3";
  $stmt = $connection->prepare($query);

  $query_category = "SELECT * FROM loai_hang order by ma_loai desc LIMIT 5";
  $stmt_category = $connection->prepare($query_category);

  $products = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 30";
  $stmt_products = $connection->prepare($products);

  $top_10_product = "SELECT * FROM hang_hoa order by ma_hh desc LIMIT 30";
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
  $loai_hang = $stmt_category->fetchAll();

  //products 
  $stmt_products->execute();
  $products = $stmt_products->fetchAll();
  
  // top 10 product 
  $stmt_product->execute();
  $top_10_product = $stmt_product->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

.section {
    margin-top: 100px
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 0;
    -webkit-tap-highlight-color: transparent;
    zoom: 1
}

html {
    font-size: 16px;
    min-height: 100%
}

body {
    font: 75%/150% "Lato", Arial, Helvetica, sans-serif;
    background-color: #fff;
    color: #838383;
    overflow-x: hidden;
    -webkit-font-smoothing: antialiased;
    -ms-overflow-style: scrollbar;
    oveflow-y: scroll
}

iframe,
img {
    border: 0
}

a {
    text-decoration: none;
    color: inherit
}

a:hover,
a:focus {
    color: #01b7f2;
    text-decoration: none
}

a:focus {
    outline: none
}

p {
    font-size: 1.0833em;
    line-height: 1.6666;
    margin-bottom: 15px
}

dt {
    font-weight: normal
}

span.active,
a.active,
h2.active,
h3.active,
h4.active,
h5.active,
h6.active {
    color: #01b7f2
}

h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: normal;
    color: #2d3e52
}

h1 {
    font-size: 2em;
    line-height: 1.25em
}

h2 {
    font-size: 1.6667em;
    line-height: 1.25em
}

h3 {
    font-size: 1.5em;
    line-height: 1.2222em
}

h4 {
    font-size: 1.3333em;
    line-height: 1.25em
}

h5 {
    font-size: 1.1666em;
    line-height: 1.1428em
}

h6 {
    font-size: 1em
}

h1.fourty-space {
    font-size: 1.3333em;
    line-height: 1.25em;
    letter-spacing: .04em
}

h2.fourty-space {
    font-size: 1.1666em;
    line-height: 1.1428em;
    letter-spacing: .04em
}

h3.fourty-space {
    font-size: 1.0833em;
    line-height: 1.1428em;
    letter-spacing: .04em
}

h4.fourty-space {
    font-size: 1em;
    line-height: 1.1em;
    letter-spacing: .04em
}

h5.fourty-space {
    font-size: 0.9166;
    line-height: 1.1em;
    letter-spacing: .04em
}

h6.fourty-space {
    font-size: 0.8333em;
    line-height: 1.1em;
    letter-spacing: .04em
}

ol,
ul {
    list-style: none;
    margin: 0
}

.banner .med-caption {
    font-size: 2.5em
}

.box-title {
    margin-bottom: 0;
    line-height: 1em
}

.box-title small {
    font-size: 10px;
    color: #838383;
    text-transform: uppercase;
    display: block;
    margin-top: 4px
}

button,
input[type="button"].button,
a.button {
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 0 15px;
    white-space: nowrap
}

button.btn-small,
input[type="button"].button.btn-small,
a.button.btn-small {
    height: 28px;
    padding: 0 24px;
    line-height: 28px;
    font-size: 0.9167em
}

a.button {
    display: inline-block;
    background: #d9d9d9;
    font-size: 0.8333em;
    line-height: 1.8333em;
    white-space: nowrap;
    text-align: center
}

a.button:hover {
    background: #98ce44
}

button.yellow,
a.button.yellow,
input[type="button"].button.yellow {
    background: #f0715f
}

button.yellow:hover,
a.button.yellow:hover,
input[type="button"].button.yellow:hover {
    background: #f0715f
}

.five-stars-container {
    display: inline-block;
    position: relative;
    font-family: 'Glyphicons Halflings';
    font-size: 14px;
    text-align: left;
    cursor: default;
    white-space: nowrap;
    line-height: 1.2em;
    color: #dbdbdb
}

.five-stars-container .five-stars,
.five-stars-container.editable-rating .ui-slider-range {
    display: block;
    overflow: hidden;
    position: relative;
    background: #fff;
    padding-left: 1px
}

.five-stars-container .five-stars:before,
.five-stars-container.editable-rating .ui-slider-range:before {
    content: "\e006\e006\e006\e006\e006";
    color: #ef715f
}

.five-stars-container:before {
    display: block;
    position: absolute;
    top: 0;
    left: 1px;
    content: "\e006\e006\e006\e006\e006";
    z-index: 0
}

.price {
    color: #7db921;
    font-size: 1.6667em;
    text-transform: uppercase;
    float: right;
    text-align: right;
    line-height: 1;
    display: block
}

.price small {
    display: block;
    color: #838383;
    font-size: 0.5em
}

.price-wrapper {
    font-weight: normal;
    text-transform: uppercase;
    font-size: 0.8333em;
    color: inherit;
    line-height: 1.3333em;
    margin: 0
}

.price-wrapper .price-per-unit {
    color: #7db921;
    font-size: 1.4em;
    padding-right: 5px
}

.image-carousel.style2 .slides>li {
    margin-right: 30px
}

.image-box .box>.details,
.image-box.box>.details {
    padding: 12px 15px
}

.listing-style1.hotel .feedback {
    margin: 5px 0;
    border-top: 1px solid #f5f5f5;
    padding-top: 5px;
    border-bottom: 1px solid #f5f5f5
}

.listing-style1.hotel .feedback .review {
    display: block;
    float: right;
    text-transform: uppercase;
    font-size: 0.8333em;
    color: #9e9e9e
}

.listing-style1.hotel .action .button:last-child {
    float: right
}

.box {
    border: 1px solid #cccccc
}

.fa {
    color: #f0715f
}

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        .conten{
            display: grid;
            grid-template-columns: 1fr 250px;
            grid-gap:10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <div>
                <a href="#" >
                    <img  src="/images/images.png" width="150px" alt="">
                </a>
            </div>
        </div>
        <div class="heade" id="myHeader">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="index.php">
                <img src="../images/logo.png"  alt="logo" style="width:60px;">
            </a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Loại hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hàng hóa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thống kê</a>
                </li>
            </ul>
        </nav>
        </div>

        <div class="conten ">
            <div class="left">
                <div class="slideshow-container">
                <?php foreach($slider as $item):?>
                    <div class="mySlides fade">
                        <!-- <div class="numbertext">1 / 3</div> -->
                        <img src="../images/<?php echo $item['hinh']?>" style="width:100%; height: 500px;">
                        <!-- <div class="text">Caption Text</div> -->
                    </div>
                    <?php endforeach ?>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
               <!-- <div class="product"> -->
                    <!-- <div class="row">
                        <?php foreach($products as $product):?>
                            <div class="col">
                                <a href="#">
                                    <img src="../images/<?php echo $product['hinh'] ?>" alt="">
                                    <div class="product-name">
                                        <h4><?php echo $product['ten_hh'] ?></h4>
                                    </div>
                                    <div class="price">
                                    <?php echo $product['don_gia'] ?> <u>đ</u>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div> -->
                    <div class="section">
                        <div class="container">
                            <h2>Travelers Choice of Hotels</h2>
                            <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
                                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                    <ul class="slides image-box hotel listing-style1" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-300px, 0px, 0px);">
                                        <li style="width: 270px; float: left; display: block;">
                                            <article class="box">
                                                <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="https://i.imgur.com/JN2wkb6.jpg" draggable="false"></a> </figure>
                                                <div class="details"> <span class="price"><small>avg/night</small>$188</span>
                                                    <h4 class="box-title">Hotel Hilton<small>Albufeira</small></h4>
                                                    <div class="feedback">
                                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div> <span class="review">170 reviews</span>
                                                    </div>
                                                    <p class="description">For what reason would it be advisable for me to think about business content?</p>
                                                    <div class="action"> <a class="button btn-small" href="#">BOOK</a> <a class="button btn-small yellow popup-map" href="#" data-box="37.089072, -8.247880">VIEW ON MAP</a> </div>
                                                </div>
                                            </article>
                                        </li>
                                        <li style="width: 270px; float: left; display: block;">
                                            <article class="box">
                                                <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="https://i.imgur.com/JN2wkb6.jpg" draggable="false"></a> </figure>
                                                <div class="details"> <span class="price"><small>avg/night</small>$322</span>
                                                    <h4 class="box-title">Double Tree<small>New delhi</small></h4>
                                                    <div class="feedback">
                                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div> <span class="review">485 reviews</span>
                                                    </div>
                                                    <p class="description">For what reason would it be advisable for me to think about business content?</p>
                                                    <div class="action"> <a class="button btn-small" href="#">BOOK</a> <a class="button btn-small yellow popup-map" href="#" data-box="40.463667, -3.749220">VIEW ON MAP</a> </div>
                                                </div>
                                            </article>
                                        </li>
                                        <li style="width: 270px; float: left; display: block;">
                                            <article class="box">
                                                <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="https://i.imgur.com/JN2wkb6.jpg" draggable="false"></a> </figure>
                                                <div class="details"> <span class="price"><small>avg/night</small>$170</span>
                                                    <h4 class="box-title">Hotel Taj<small>Mumbai</small></h4>
                                                    <div class="feedback">
                                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class=""></span></div> <span class="review">75 reviews</span>
                                                    </div>
                                                    <p class="description">For what reason would it be advisable for me to think about business content?</p>
                                                    <div class="action"> <a class="button btn-small" href="#">BOOK</a> <a class="button btn-small yellow popup-map" href="#" data-box="40.705631, -73.978003">VIEW ON MAP</a> </div>
                                                </div>
                                            </article>
                                        </li>
                                        <li style="width: 270px; float: left; display: block;">
                                            <article class="box">
                                                <figure> <a href="#" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="https://i.imgur.com/JN2wkb6.jpg" draggable="false"></a> </figure>
                                                <div class="details"> <span class="price"> <small>avg/night</small> $360 </span>
                                                    <h4 class="box-title">Lamon Tree<small>Bangalore</small></h4>
                                                    <div class="feedback">
                                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div> <span class="review">270 reviews</span>
                                                    </div>
                                                    <p class="description">For what reason would it be advisable for me to think about business content?</p>
                                                    <div class="action"> <a class="button btn-small" href="#">BOOK</a> <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">VIEW ON MAP</a> </div>
                                                </div>
                                            </article>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="right">
                <div class="panel">
                    <div class="heading">TÀI KHOẢN</div>
                    <div class="form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">
                                    Tên đăng nhập
                                </label> <input type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    Mật khẩu
                                </label> <input type="text" name="mat_khau" id="mat_khau" placeholder="Mật khẩu">
                            </div>
                            <button class="btn">Đăng nhập</button>
                            <div class="row mb10">
                              <label for="">
                                Ghi nhớ tài khoản?
                                <input type="checkbox" name="" id=""> 
                              </label>
                            </div>
                        </form>
                        <li>
                            <a href="#">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="">Đăng ký thành viên</a>
                        </li>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="heading">DANH MỤC SẢN PHẨM</div>
                    <div class="list">
                        <ul>
                            <?php foreach($loai_hang as $item): ?>
                            <li><a href="#"><?php echo $item['ten_loai']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="top10">
                    <div class="heading">TOP 10 YÊU THÍCH</div>
                    <div class="list">
                        <ul>
                            <?php foreach($top_10_product as $item): ?>
                            <li><a href="#"><?php echo $item['ten_hh']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
               
              
               
                <!-- <form action="" class="log_in">
                    <h3 style="background-color: #717171; font-size: 20px;" >TÀI KHOẢN</h3>
                    <div>
                        <label for="">Tên đăng nhập</label>
                    </div>
                    <input type="text" name="Tên Đăng nhập"  id="" placeholder="Tên Đăng nhập" value=""> 
                    <div>
                        <label for="">Mật khẩu</label>
                    </div>
                    <input type="text" name="password"  id="" placeholder="Nhập password" value=""> 
                    <div>
                        <button>Đăng nhập</button>
                    </div>
                </form> -->
            </div>
          
        </div>
        <div class="news">
                <!-- <h2 class="title"> <strong>PRODUCTS</strong> </h2> -->
            </div>
            <footer>
                <div class="rows">
                    <div class="columns">
                        <img  src="image/logojordan.png" width="200px" alt="">
                    </div>
                    <div class="columns">
                        <h4>CONTACT US</h4>
                        <p>ADDRESS : CÔNG TY TNHH JORDAN</p>
                        <p>EMAIL : jordan@gmail.com</p>
                        <p>PHONE : +7464 0187 3535 645</p>
                        <p>FAX ID : +9 659459 49594</p>
                    </div>
                    <div class="columns">
                        <h4>OPENING HOURS</h4>
                        <p>Monday 11:00 - 19:00</p>
                        <p>Tuesday 12:00 - 19:00</p>
                        <p>Wednesday 12:00 - 20:00</p>
                        <p>Thursday 13:00 - 18:00</p>
                    </div>
                    <div class="columns">
                        <h4>RECENT NEWS</h4>
                        <p>Integer Malesuada Odio Ac Magna</p>
                        <p>MARCH 18 - 2021</p>
                        <p>MARCH 15 - 2021</p>
                    </div>
                </div>
            </footer>

        <!-- Stick menu -->
        <script>
            window.onscroll = function() {
                myFunction()
            };

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
        </script>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        </script>
</body>
</html>