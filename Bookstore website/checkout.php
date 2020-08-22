<?php
include "header1.php";
$gst=70;
if(isset($_SESSION["name"])){

$cart_total=0;
if(isset($_POST['submit'])){
	$country=get_safe_value($con,$_POST['country']);
	$address=get_safe_value($con,$_POST['address']);
	$district=get_safe_value($con,$_POST['district']);
	$postal=get_safe_value($con,$_POST['postal']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$phone=get_safe_value($con,$_POST['phone']);
		$email=get_safe_value($con,$_POST['email']);
	
	$user_id=$_SESSION["uid"];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
}
	mysqli_query($con,"insert into `customer_order`(user_id,country,address,district,PostCode,Phone,email,total_price,order_status,payment_through,Pay_status,added_on)
 values('$user_id','$country','$address','$district','$postal','$phone','$email','$total_price','$order_status','$payment_type','$payment_status','$added_on')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	

}

}
//{
	//echo "
	//<script>alert('Login is required ')</script>
	//<script>window.open('index.php','_self')</script>";                           
//}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
          <section class="wn__checkout__area section-padding--lg bg__white">
          	<div class="container">
        	<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Billing details</h3>
        					<div class="customar__field">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	        							<label>First name <span>*</span></label>
	        							<input type="text">
	        						</div>
	        						<div class="input_box space_between">
	        							<label>last name <span>*</span></label>
	        							<input type="text">
	        						</div>
        						</div>
        						<div class="input_box">
        							<label>Company name <span>*</span></label>
        							<input type="text">
        						</div>
        						<div class="input_box">
        							<label>Country<span>*</span></label>
        							<select class="select__option" name="country">
										<option>Select a country…</option>
										<option>Afghanistan</option>
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>Russia</option>
										<option>India</option>
										<option>Paris</option>
										<option>London</option>
										<option>Antarctica</option>
										<option>Itlay</option>
        							</select>
        						</div>
        						<div class="input_box">
        							<label>Address <span>*</span></label>
        							<input type="text" name="address" placeholder="Street address" >
        						</div>
        						<div class="input_box">
        							<input type="text" placeholder="Apartment, suite, unit etc. (optional)">
        						</div>
        						<div class="input_box">
        							<label>District<span>*</span></label>
        							  <input type="text" name="district" placeholder="District" >
        						</div>
								<div class="input_box">
									<label>Postcode / ZIP <span>*</span></label>
									<input type="text" name="postal">
								</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone <span>*</span></label>
										<input type="text" name="phone" >
									</div>

									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email" name="email">
								</div>
								</div>
        					</div>
        					
        				</div>
        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your order</h3>
        					<ul class="order__total">
        						<li>Product</li>
        						<li style="margin-right: 69px;">Total</li>
        					</ul>
        					<ul class="order_product">
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
        					<li> <div class="single-item__thumb">
                                        <img style="width:50px;height:68px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="product img"><span>Rs.<?php echo $price?></span> 
                                        <span style="margin-right: 56px;" > <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></span>
                                    </div>
                                    <div class="single-item__content">
                                       <a style="font-weight: bold;" href="#"><?php echo $pname?></a>
                                    
                               
                                
                                </div> </li>
								                        
        						<!--<li>Buscipit at magna × 1<span>$48.00</span></li>
        						<li>Buscipit at magna × 1<span>$48.00</span></li>
        						<li>Buscipit at magna × 1<span>$48.00</span></li>-->
        					</ul>
        					<ul class="shipping__method">
        						<li>Total with GST Charges <span>Rs.<?php echo $cart_total+$gst?></span></li>
        						<li>Payment Through 
        							<ul>
        								<li>
        									<input name="payment_type" data-index="0" value="cod"  type="radio">
        									<label>COD(Cash On Delivery)</label>
        								</li>
        								<li>
        									<input name="payment_type" data-index="0" value="paypal"  type="radio">
        									<label>PayPal</label>
        								</li>
        							</ul>
        						</li>
        						 <?php }}?>
        					</ul>
        					<button type="submit" name="submit"></button>
        				</form>

        				</div>
        				 <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingOne">
						          	<a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						                <span>Direct Bank Transfer</span>
						          	</a>
						        </div>
						        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            	<div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingTwo">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							            <span>Cheque Payment</span>
						          	</a>
						        </div>
						        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
					          		<div class="payment-body">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span>Cash on Delivery</span>
						          	</a>
						        </div>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					          		<div class="payment-body">Pay with cash upon delivery.</div>
						        </div>
						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingFour">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							            <span>PayPal <img src="images/icons/payment.png" alt="payment images"> </span>
						          	</a>
						        </div>
						        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
					          		<div class="payment-body">Pay with cash upon delivery.</div>
						        </div>
						    </div>
					    </div>

        			</div>
        		</div>
        	</div>
        </section>
</body>
</html>
