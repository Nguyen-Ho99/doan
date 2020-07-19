<?php session_start(); ?>
<?php
include('hedermenu.php');
?>
<style>
	h1.page_title_nobd {
    color: #821B0D;
    width: 100%;
    line-height: 30px;
    margin-top: 10px;
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 10px;

}
table.tablecart {
    margin: 20px 0px;
    width: 100%;
}
table.tablecart td {
    border: 1px solid gray;
    padding: 6px;
}
table.tablecart td img {
    margin: auto;
    display: block;
}
img.cart_img {
    width: 100px;
}
table.tablecart tr:first-child{
	background: #f7f7f7;
	font-size: 12px;
font-weight: bold;
	color: #000;
}
p.cart_tongdonhang {
    text-align: center;
    font-size: 14px;
    margin: 0px;

    color: black;
}
.cart_tongdonhang span {
    color: red;
    font-size: 20px;
    font-weight: bold;
}
table.tablecart tr td:first-child{
text-align: center;
	}
.payment_content .col {
    width: 297px;
    height: 154px;
    overflow: hidden;
    float: left;
    margin-right: 10px;
}
.payment_content .col input {
    border-radius: 5px;
    width: 100%;
    margin-bottom: 10px;
    height: 30px;
    border: 1px solid #D6D6D6;
    box-sizing: border-box;
    font-style: italic;
    font-size:13px;
    color:#2e2e2e;
    padding: 0px 10px;
    }
    .payment_content .col textarea{
    	box-sizing: border-box;
    width: 100%;
    height: 154px;
    line-height: 31px;
    padding: 0px 10px;
    border: 1px solid #D6D6D6;
    border-radius: 5px;
    color: #2e2e2e;
    font-size: 13px;
    font-style: italic;
    }
    .payment_content .col_3 {
    width: 496px;
    margin-right: 0px;
}
div#form-button {
    text-align: right;
}
.submit_order {
    text-align: center;
    width: 100%;
    float: left;
    margin-top: 15px;
}
.form_cart_submit_btn {
    display: inline-block;
    height: 31px;
    line-height: 32px;
    color: #FFF;
    background: #821B0D;
    border: none;
    width: 242px;
    text-transform: uppercase;
    border-radius: 5px;
    padding: 0;
    margin: 0;
    margin-right: 5px;
    cursor: pointer;
}
a.tieptuc {
    font-style: normal;
    display: inline-block;
    height: 31px;
    line-height: 32px;
    color: #FFF;
    background: #fd8a10;
    border: none;
    width: 242px;
    text-transform: uppercase;
    border-radius: 5px;
    padding: 0;
    margin: 0;
    }
</style>
<?php
        include 'connect.php';
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }
         $error = false;
        if (isset($_GET['action'])) {
            function update_cart($add=false)
            {
 foreach ($_POST['quantity'] as $id => $quantity) {
   
    if ($quantity==0) {
    unset($_SESSION["cart"][$id]);
    }
    else{
      if ($add) {
          $_SESSION["cart"][$id] += $quantity;
                   
            }
            else{
                 $_SESSION["cart"][$id] = $quantity;
            }
    }
    

   }
            }

            switch ($_GET['action']) {
                case "add":
                  update_cart(true);
                       header('location:cart.php');
                    break;
                    case "delete":
                    if (isset($_GET['id'])) {
                        # code...
                        unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('location:cart.php');
                    break;
                    case"submit":
                  if (isset($_POST['update_click'])) {
                    # code...
             update_cart();
              header('location:cart.php');
                  }
                  elseif (isset($_POST['order_click'])) {

                   if (empty($_POST['name'])) {
                            $error = "Bạn chưa nhập tên của người nhận";
                        } elseif (empty($_POST['address'])) {
                            $error = "Bạn chưa nhập điện thoại người nhận";
                        } elseif (empty($_POST['phone'])) {
                            $error = "Bạn chưa nhập số điện thoạingười nhận";
                        } elseif (empty($_POST['quantity'])) {
                            $error = "Giỏ hàng rỗng";
                        }
                      
                         if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                          $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                           
                            $orderProducts = array();
                             while ($row = mysqli_fetch_array($products)) {
                                $orderProducts[] = $row;
                                $total += $row['price'] * $_POST['quantity'][$row['id']];
                            }


                               $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                             
                                 $orderID = $con->insert_id;
                                   $insertString="";
                                 # code...
                             
                                      foreach ($orderProducts as $key => $product) {
                                $insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['price'] . "', '" . time() . "', '" . time() . "')";
                                if ($key != count($orderProducts) - 1) {
                                    $insertString .= ",";
                                }
                            }
                        
                              $insertOrder = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");

                            $success = "Đặt hàng thành công";
                            unset($_SESSION['cart']);
                         }
                    
                  }
                    break;
            }
        }
        if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
        }
         ?>
<div class="postmain">
	<div class="wapper">
		<div class="giohang_content">
           
            <?php if  (!empty($error)){?>

               <div id="notify-meg"><?=$error?>. <a href="javascript:history.back()">Quay lại</a></div> 
                       
         <?php   } elseif(!empty($success)) {?>
            <div id="notify-msg">
                    <?= $success ?>. <a href="header.php">Tiếp tục mua hàng</a>
                </div>
            <?php }else{?>

      <h1 class="page_title_nobd">Giỏ hàng</h1>
            <form action="cart.php?action=submit" method="POST">
            <table class="tablecart">
                <tr>
                    <td class="product-number">STT</td>
                    <td class="product-img">ẢNH</td>
                    <td class="product-name">TÊN SẢN PHẨM</td>
                    <td class="product-price">ĐƠN GIÁ</td>
                    <td class="product-quantity">SỐ LƯỢNG</td>
                    <td class="total-money">TỔNG</td>
                    <td class="product-delete">XÓA</td>
                </tr>
              
                    
             

                 <?php 
                 if (isset($products)) {
                  $total_quantity=0;
                   $total=0;
                    $num = 1;
                  
                  
            while ($row = mysqli_fetch_array($products)) { ?>

                <tr>
                    <td class="product-number"><?=$num++;?></td>
                    <td class="product-img"><img  class="cart_img"src="../<?=$row['image']?>" alt=""></td>
                    <td class="product-name"><p class="cart_ten"><?=$row['name']?></p></td>
                    <td class="product-price"><?=$row['price']?>VND</td>
                    <td class="product-quantity"><input type="text" value="<?=$_SESSION["cart"][$row['id']]?>" name="quantity[<?=$row['id']?>]" /></td>
                    <td class="product-money"><b><?=$row['price']*$_SESSION["cart"][$row['id']]?></b></td>
                    <td class="product-delete"><span class="cart_remove">
                        <a href="cart.php?action=delete&id=<?=$row['id']?>">
                        <img src="img/icon_trash.png" alt="">
                    </a>
                    </span></td>
                  
                </tr>

                 <?php 
                  $total += $row['price'] * $_SESSION["cart"][$row['id']];
                    $num++;
                   
                    } 

                  ?>
    <tr>
                    <td colspan="3"></td>
                    <td colspan="4">
                        <p class="cart_tongdonhang">
                            Tổng giá trị đơn hàng: <span><?= number_format($total, 0, ",", ".") ?></span>VND
                        </p>
                    </td>
                </tr>


                 <?php
                }
                else {
                    echo '<span style="color:red;"><i>Giỏ hàng của bạn trống vui lòng mua thêm hàng !<i></span>';
                }

                   ?>
            
            </table>
        </div>
         <div id="form-button">
                    <input type="submit" name="update_click" value="Cập nhật" />
                </div>
                <hr>    
        <div class="payment_content">   
            
                <div class="col">   
                                <input  name="name" value="" placeholder="Họ tên">
                                <input  name="address" value="" placeholder="Địa chỉ">
                                <input  name="phone" value="" placeholder="Số điện thoại">
                                
                                </div>
                <div class="col">
                                <textarea name="note" placeholder="Lời nhắn"></textarea>
                    
                        </div>
                        <div class="col col_3">
                                <div class="textcontent">
                                    <p><font face="Roboto, sans-serif"><span style="font-size: 16px;">Phân phối các loại bia nhập khẩu chứ danh trên thế giới, chúng tôi là đại lý bán bia rượu ngoại nhập khẩu uy tín giá rẻ tại Hà Nội. Bia xuất bán từ kho nên giá luôn rẻ hơn so với giá bán lẻ bia nhập khẩu trên thị trường.</span></font></p>                                </div>
                            </div>
                            <div class="submit_order">  
                    <input type="submit" class="form_cart_submit_btn" name="order_click" value="Gửi đơn hàng">
                            <a  href="header.php"class="tieptuc">Tiếp tục mua hàng</a>
                            </div>
            </form>


            <?php
        }
            
             ?>
					</div>
	</div>
</div>