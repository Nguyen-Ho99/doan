
<!DOCTYPE html>
<html lang="en"  meta charset="utf-8">
<head>
	<title> Example </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">  
		<script type="text/javascript" src="vendor/bootstrap.js"></script>
	 	<script type="text/javascript" src="1.js"></script>
		<link rel="stylesheet" href="vendor/bootstrap.css">
		<link rel="stylesheet" href="vendor/font-awesome.css">
	 	<link rel="stylesheet" href="1.css">
</head>
<body>
	<div class="header">
		<div class="toppadding">
	<nav class="navbar navbar-light wapper">
		<a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
		<ul class="nav navbar-nav menu">
			<li class="nav-item active">
				<a class="nav-link" style="color:orangered;"href="header.php">Trang chủ <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="introduce.php">giới thiệu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="blog.php">blog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">liên hệ</a>
			</li>
		</ul>
		<div class="contact_top">
			<p style="font-size: 12px;font-style: italic;">Tư vấn đặt hàng</p>
			<p>05544515555</p>
		</div>
		<div class="search">
			 <form id="product-search" method="GET">
               
                <input type="text" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" />
                <input type="submit" value="Tìm" />
            </form>
		</div>
		<div class="cart-top">
		<a href="cart.php"><img src="img/carttopicon.jpg" alt=""></a>
		</div>
	</nav>
</div><!-- >het toppadding -->
	</div> <!-- het header -->

	<div class="topslider">
		<div class="wapper">
			<div class="header_slider">
			<div class="left_menutop">
				<div class="home_banner">
					<img src="img/logo-bia-nhap-khau-linh-giang-1.jpg" alt="">
				</div><!-- ket thuc home_banner -->
			</div><!-- kt menutop -->


			<div class="slider">
				 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				 	<ol class="carousel-indicators">
				 		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				 		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				 		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				 	</ol>
				 	<div class="carousel-inner" role="listbox">
				 		<div class="carousel-item active">
				 			<img src="img/slider1.jpg" alt="First slide">
				 		</div>
				 		<div class="carousel-item">
				 			<img src="img/slider2.jpg" alt="First slide">
				 		</div>
				 		<div class="carousel-item">
				 			<img src="img/slider1.jpg" alt="First slide">
				 		</div>
				 	</div>
				 	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				 		<span class="icon-prev" aria-hidden="true"></span>
				 		<span class="sr-only">Previous</span>
				 	</a>
				 	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				 		<span class="icon-next" aria-hidden="true"></span>
				 		<span class="sr-only">Next</span>
				 	</a>
				 </div>
			</div><!--  kt slider -->
			<div class="bot_slidemenu">
				<div class="cssmenu">
					<div class="menu_button">Danh mục sản phẩm</div>
					<ul>
						<li class="menu_item">
						<a href="#">Rượu vang</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia Bỉ</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia tiệp</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia Nga</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia Đức</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia mexico</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia hà lan</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia Nhật</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia Pháp</a>
						</li>
						<li class="menu_item">
						<a href="#">Bia My</a>
						</li>
					</ul>
				</div><!-- cssmenu -->
			</div><!-- het slidmenu	 -->
		</div><!-- header_slider -->
		</div>
	</div><!-- ket thuc topslider-->

	<div class="tophome">
		<div class="wapper">
			<div class="tophome_left">
				<p>Chuyên bán buôn bán lẻ bia nhập khẩu danh tiếng trên thế giới, chúng tôi là đại lý bán bia rượu ngoại nhập khẩu uy tín giá rẻ tại Hà Nội. Bia xuất bán từ kho nên giá luôn rẻ hơn so với giá bán lẻ bia nhập khẩu trên thị trường.</p>
			</div><!-- ket thuc tophome_left -->
			<div class="tophome_right">
				<div class="tophome_block">
				<a href=""><img src="img/tophome2.jpg" alt=""></a>
				<span><b>KHUYẾN MÃI</b><br>
					HẤP DẪN LIÊN TỤC
				</span>
				</div>
				<div class="tophome_block">
					<a href=""><img src="img/tophome1.jpg" alt=""><a>
					<span><b>MUA HÀNG & GIAO HÀNG</b><br>
				NHANH CHÓNG TIỆN LỢI
				</span>
				</div>
			</div><!-- het tophome_righ -->
<?php
         $search = isset($_GET['name']) ? $_GET['name'] : "";
        if ($search) {
            $where = "WHERE `name` LIKE '%" . $search . "%'";
            }
        include 'connect.php';

        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        if ($search) {
        	   $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        }
        else{
        $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
        }
      
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
 
        ?>
        


	<div class="main">
		<div class="wapper">

			<div class="homecat">
				<div class="hom_cat_title">
				<h3 class="title_homecat"><a href="">các loại bia bán chạy nhất</a></h3>
				</div>

				<div class="hom_cat_content">
 <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
					<div class="item">
						<img src="img/new.png" alt="" class="productlable">
						<div class="item_img">
							<a href="detail.php?id=<?= $row['id'] ?>"><img src="../<?= $row['image'] ?>" title="<?= $row['name'] ?>" alt=""></a>
						</div><!--  het item_img -->
						<div class="price_bar">
							<span><b><?= number_format($row['price'], 0, ",", ".") ?> đ</b></span>
						     <span><s><?= number_format($row['oldprice'], 0, ",", ".") ?> đ</s></span>
						</div><!-- het price_bar	 -->
						<h2><a href="detail.php?id=<?= $row['id'] ?>">
							<?= $row['name'] ?>
						</a></h2>
					<p><?= $row['content']?>	</p>
					<div class="buybar">
						 <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
						<span class="datmua"></span>
						<a href="detail.php?id=<?= $row['id'] ?>" class="chitiet">Xem chi tiết</a>
					</div>
				</form>
					</div> <!-- het item -->

 <?php } ?>

				</div><!-- het homcat content -->
			</div><!-- het hom_cat -->
			 <?php
                include './pagination.php';
                ?>
		</div>
	</div> <!-- het main -->

 
</body>
</html>
 
