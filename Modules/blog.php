<?php include('top_introduce.php');?>
<title>	Giới thiệu</title>
<style>
.main_left {
    width: 260px;
    float: left;
}
.left_product {
    float: left;
   
    width: 100%;
}
.main_right {
    width: 826px;
    float: right;
}
.postmain {
    width: 100%;
    float: left;
}
.gt_ads {
    width: 100%;
}
.leftmenu_title {
    background: #821B0D;
    line-height: 32px;
    height: 32px;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
}
h1.page_title {
  
    margin-bottom: 10px;
    font-size: 22px;
    line-height: 30px;
}
.page_title {
    width: 100%;
    color: #821B0D;
    font-weight: 700;
    border-bottom: 2px solid darkgrey;
}
.blog_page_loop {
    width: 100%;
    float: left;
    margin:22px 0px 10px 0px;
}
.blog_item img {
    width: 222px;
    height: 170px;
    float: left;
    margin-right: 40px;
}
.blog_item p {
    text-align: justify;
    font-size: 13px;
    line-height: 19px;
    height: 109px;
    overflow: hidden;
}
.blog_item h2 {
    text-transform: uppercase;
    font-weight: normal;
    font-size: 15px;
    margin-bottom: 15px;
    line-height: 20px;
}
a.xct {
    background-color: #f5c147;
    color: #fff;
    width: 108px;
    float: right;
    height: 26px;
    padding-left: 20px;
    line-height: 26px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 12px;
    background: url(images/iconchitiet.jpg) no-repeat #C0C0C0;
    background-position: 90px 4px;
    box-sizing: border-box;
}

</style>
<?php
        include 'connect.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:3;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
 
        ?>
<div class="postmain">
	<div class="wapper">
		<div class="main_left">
			<div class="gt_ads">
				<p>Đại lý bia nhập khẩu, Kho bia nhập khẩu tại Hà Nội</p>
			</div>
			<div class="left_product">
				<div class="leftmenu_title"style="margin-bottom: 10px;">
					Bia bán chạy nhất
				</div>
				<div class="leftproduct_content">
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
					<p><?= $row['content'] ?></p>
					<div class="buybar">
						<span class="datmua">Đặt mua</span>
						<a href="detail.php?id=<?= $row['id'] ?>" class="chitiet">Xem chi tiết</a>
					</div>
					</div> <!-- het item -->
					 <?php } ?>
				</div>
			</div><!-- het left_product	 -->
		</div><!-- het main_left -->
		<div class="main_right">
			
				<h1 class="page_title">Giới thiệu</h1>
		
		<div class="blog_page_loop">
			<div class="blog_item">
				<a href="">
					<img src="../img/669.jpg" alt="">
				</a>
				<h2><a href="">Phân tích SWOT của thương hiệu Corona Extra</a></h2>
				<p>Corona Extra là một trong những thương hiệu bia bán chạy nhất thế giới và có số lượng xuất khẩu cao nhất. Mặc dù các loại bia Mexico luôn được ưa chuộng, Corona Extra nổi bật cả về hương vị lẫn màu sắc và có lượng fan trung thành với thương hiệu rất cao.</p>
				<a href="https://bianhapkhau.com.vn/phan-tich-swot-cua-thuong-hieu-corona-extra" class="xct">Xem chi tiết</a>
			</div>
		</div>
			</div>
		</div>
	</div>
</div><!-- het postmain -->

<?php  include('bottom_intro.php')  ?>




