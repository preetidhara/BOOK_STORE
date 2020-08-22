<?php
include "header1.php";
if(!isset($_SESSION['name'])){
	   echo "<script>alert(' Please Do Login')</script>";
            echo "<script> location.href='login1.php'; </script>";
        }
$gst=70;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shopping Cart</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shopping Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


               <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'',$key);
											$pname=$productArr[0]['title'];
											//$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
													$cart_plus=$cart_total+($price*$qty);
													
											?>

                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="product img"></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pname?></a></td>
                                            <td class="product-price"><span class="amount"><?php echo $price?></span></td>
                                            <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>"></td>
                                            <td class="product-subtotal"><?php echo $qty*$price?></td>
                                            <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a></td>
                                        </tr>
                                       <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="#">Coupon Code</a></li>
                                <li><a href="#">Apply Code</a></li>
                                <li><a href="#">Update Cart</a></li>
                                <li><a href="checkout_include.php">Check Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>GST Charges</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li><?php echo $cart_total?></li>
                                    <li><?php echo $gst?></li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>Rs.<?php echo $cart_total+$gst?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
<br>
<br>
        <!-- cart-main-area end -->

</body>
</html>

