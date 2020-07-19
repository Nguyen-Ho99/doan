<?php
        include 'connect.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:2;
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
		
			<div class="post_content">
				<div class="tlqcontent">
					
					
						<h2>Giới thiếu về Đại lý bia Nhập khẩu Công Nguyên</h2>
<p>&nbsp;</p>
<p>Có thể nói, với xu hướng trên thế giới hiện nay người ta uống bia ngoài để&nbsp;giải khát còn để bổ sung dinh dưỡng, tăng hàm lượng vitamin, chất chống oxi hóa có trong men bia. Cho nên, những sản phẩm bia nhập khẩuBia Nhập Khẩu đã trở thành thứ đồ uống làm say đắm toàn thế giới, hiện&nbsp;đang trở thành một kiểu&nbsp;thưởng thức sành điệu cho những người yêu bia và ưa khám phá bia nhập khẩu cao cấp tại Việt Nam.&nbsp;</p>
<p>&nbsp;</p>
<p>Đại lý Bia Nhập Khẩu Công Nguyên ra đời với mục đích ngoài kể lại những câu chuyện, hay một trải nghiệm khám phá sự ĐA DẠNG trong “văn hóa bia” từ các nước trên thế giới như Đức, Bỉ, Pháp, Tây Ban Nha, Tiệp, Anh, Mexico, Brazil... Thì nhiệm vụ quan trọng nhất là trao&nbsp;tận tay người tiêu dùng những sản phẩm Bia nhập khẩu ngon nhất được tập hợp từ khắp nơi trên thế giới.</p>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="img/slider3.jpg" alt="" width="700" height="437"></p>
<p>&nbsp;</p>
<p>Để Đáp ứng nhu cầu thưởng thức các loại&nbsp;Bia Nhập Khẩu&nbsp;tại nhà của Quý khách,&nbsp;Đại lý phân phối Bia Nhập Khẩu Công Nguyên đang nỗ lực và cố gắng để&nbsp;trở thành một trong những nhà cung cấp bia nhập khẩu hàng đầu tại Nghệ An cho những người sành bia, ưa khám phá. Chúng tôi phải luôn cam kết chỉ cung cấp sản phẩm bia nhập khẩu chính hãng cho khách hàng&nbsp;theo tiêu chí:</p>
<p>&nbsp;</p>
<ul>
<li>Bia nhập khẩu chính hãng, chính ngạch.</li>
<li>Giá bán TỐT NHẤT so với các nhà cung cấp khác trên thị trường</li>
<li>Có hóa đơn VAT</li>
<li>Giao hàng&nbsp;tận nơi nội thành Vinh cho đơn hàng từ 2 thùng trở lên&nbsp;<em>(Từ 8h-21h hàng ngày)</em></li>
<li>Nhận chuyển hàng trên toàn quốc (xem bảng cước chuyển hàng)</li>
</ul>
<p>&nbsp;</p>
<h2>Sản phẩm Bia Nhập Khẩu của Đại lý phân phối Bia&nbsp;Nhập Khẩu Công Nguyên</h2>
<p>&nbsp;</p>
<ul>
<li>Hơn 100 thương hiệu bia hàng đầu thế giới (vẫn đang được chúng tôi thu nạp thêm trong bộ sưu tập của mình)</li>
<li>Gói phụ kiện về bia phong phú và mới lạ (áo, ly bia, dụng cụ mở bia, nắm chai, mũ, vỏ điện thoại) sẽ được chúng tôi mang về trong thời gian tới nhằm phục vụ cho các “FANS” hâm mộ của BIA</li>
<li>Đáp ứng nhu cầu thưởng thức Bia nhập khẩu tại nhà cùng người thân, bạn bè của mình, Đại lý phân phối Bia – Rượu Nhập Khẩu Công Nguyên xây dựng hệ thống bán hàng trực tuyến và dịch vụ “take away” giao hàng tận nơi trên toàn lãnh thổ Việt Nam</li>
<li>Các Gói quà tăng bia cho nhóm khách hàng DOANH NGHIỆP, sẽ là sự lựa chọn hoàn hảo cho đối tác của bạn trong những dịp Lễ Tết, mừng khai trương, kỷ niệm thành lập, sự kiện…&nbsp;</li>
</ul>
<p style="text-align: right;"><em><strong>Bia nhập khấu Công Nguyên</strong></em></p>					
				</div>
			</div>
		</div>
	</div>
</div><!-- het postmain -->

<?php  include('bottom_intro.php')  ?>