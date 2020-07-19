<meta charset="utf-8">
<?php
include('hedermenu.php');
?>
<?php
include('bot_slidemenu.php');
?>
<style type="text/css">
h1.product_title {
    font-size: 24px;
    width: 100%;
    color: #821B0D;
    margin: 10px 0px;

}
.left_single {
    width: 288px;
    border: 2px solid orangered;
    box-sizing: border-box;
    height: 310px;
    padding: 15px;
    float: left;
}
.pricearea {
    /* float: left; */
    background-color: #de0223;
    border-radius: 20px;
    color: white;
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    padding: 10px;
}
.pricearea .price {
    font-size: 28px;
    font-style: initial;
    margin-bottom: 5px;
    text-align: right;
}
.pricearea p {
    margin: 0;
}
.contact_single {
     width: 150px;
    height: 40px;
    float: left;
    padding-left: 40px;
    background: url(img/contact_single.jpg) no-repeat center left;
    line-height: 0px;
    box-sizing: border-box;
    color:#821B0D;
  
   
}
.contact_single p:nth-child(1){
	font-size: 12px;
	font-style: italic;
	line-height: 12px;
}
.contact_single p:nth-child(2){
	font-size: 13px;
	}
	.product_img img {
    height: 414px;
    width: 398px;
    /* float: right; */
  
    float: left;
}
.center_product {
    /* float: left; */
    /* text-align: center; */
    width: 100%;
    padding-top: 35px;
    float: left;
}
.page_title {
    font-size: 18px;
    color: #821B0D;
    line-height: 30px;
    font-weight: 700;
    margin-bottom: 20px;
    border-bottom: 1px solid #dab4b4a1;
    margin-top: 20px;
    line-height: 60px;

}
.pricegray p {
    margin: 0;
}
.title_content p {
    font-size: 13px;
    color: #000000;
    line-height: 25px;
}
*{
    margin: 0;
    padding: 0;
}
	.title_content h2{
		font-size: 16px;
    color: black;
	}
    .ctđh {
    display: flex;
    justify-content: space-between;
    padding: 15px 0px;
}
.pricegray {
    background: #ebebeb;
    white-space: nowrap;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 13px;
    padding: 8px;
}
.product_img {
    border: 1px solid #ffb100;
    float: left;
    margin-left: 30px;
    }
    p.content_ct {
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    line-height: 40px;
}
form#add-to-cart-form {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}
input[type="submit"] {
    background: #00800052;
    color: #fff;
    border: none;
    /* margin-left: 77px; */
    border-radius: 4px;
    cursor: pointer;
</style>
<?php
include('connect.php');

  $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
 $product = mysqli_fetch_assoc($result);
?>
<div class="top_product">
	<div class="wapper">
		<h1 class="product_title"><?=$product['name']?></h1>
        <p class="content_ct"><?= $product['content'] ?></p>
		<div class="left_single">
			<div class="pricearea">
				<p>Giá bán hôm nay:</p>
				<p class="price"><?= number_format($product['price'], 0, ",", ".") ?> đ</p>
				<p>Đơn hàng tối thiểu 1 chai trờ lên</p>
			</div>
            <div class="ctđh">
			<div class="contact_single">
				<p>Tư vấn đặt hàng</p>
				<p>012546252255</p>
			</div>
            <div class="pricegray">
                <p>Giá gốc:<s><?= number_format($product['oldprice'], 0, ",", ".") ?> đ</s></p>
            </div>
               </div>
			<div class="buybar">
                  <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
					  <input type="text" value="1" name="quantity[<?=$product['id']?>]" size="2" />
					    <input type="submit" value="Mua sản phẩm" />
                    	 <a href="" class="chitiet">Hương dẫn mua hàng</a>
                        </form>
                      
					</div>
		</div>
		<div class="right_single">
			<div class="product_img">
				<img src="../<?=$product['image']?>" alt="">
			</div>
		</div>
	
	</div>
</div>
<div class="center_product">
	<div class="wapper">
		<div class="page_title">
			Thông tin chi tiết sản phẩm
		</div>
		<div class="ctsp">
			<div class="title_content">
				<h2>Giới thiệu về bia</h2>
				<p>Bia được ví von là một thứ thức uống vừa mang tính thưởng thức, vừa mang tính giải khát với nhiều mùi vị độc đáo ấn tượng đến từ nhiều quốc gia khác nhau. Chính vì thế, trên thế giới hiện nay có hàng loạt các loại bia khác nhau, từ cao độ đến nhẹ độ và đến cả không cồn. Nếu là một người yêu bia, nhưng ngại nồng độ cồn thì những lon Baltika 0 này chắc hẳn sẽ đánh gục vị giác của bạn.</p>
				<p>Khi mà ngoài kia có khá nhiều loại bia đua nhau với nhiều nồng độ cồn cao thấp khác nhau, thì những lon bia 0% của Baltika như thổi một luồng gió mới vào những người yêu bia.

Được làm từ lúa mỳ thơm dịu nhẹ, và đặc biệt là không trải quá quá trình lọc. Chính điều này đã đem đến ấn tượng cực sâu sắc cho những lon bia Baltika đến từ Nga này.

Bia không có cồn, là một trong những điểm đặc biệt của bia. Thêm vào đó, chính là mùi vị ấn tượng của chúng. Nhờ thành phần đến từ lúa mỳ, chính vì thế Baltika sở hữu mùi vị riêng biệt của mình</p>
				<p>Sẽ là một chút thơm dịu dễ chịu, xen kẽ mùi vị nhẹ nhàng êm ả của thành phần lúa mỳ. Thỉnh thoảng đâu đó trong hương vị của chúng, Baltika có chút gì đó cay cao của citrus tạo nên một thức uống trên cả tuyệt vời.Thưởng thức một ngụm Baltika, chắc hẳn bạn sẽ bị chinh phục bởi mùi vị tuyệt vời.</p>
			</div>
		</div>
	</div>
</div>
<?php   include('footer.php') ?>
