<?php include "header1.php";

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
 <?php include "checkout_form.php" ?>

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
                            <ul class="order_product">
                               
                            <li> <div class="single-item__thumb">
                                        <img style="    width: 92px;
    height: 113px;
    margin-right: 23px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="product img"><span style="font-weight: bold;">Rs.<?php echo $price?></span> 
                                        <span style="margin-right: 56px;" > <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></span>
                                    </div>
                                    <div class="single-item__content">
                                       <a style="font-weight: bold;" href="#"><?php echo $pname?></a>
                                    
                               
                                
                                </div> 
                                                        
                                <!--<li>Buscipit at magna × 1<span>$48.00</span></li>
                                <li>Buscipit at magna × 1<span>$48.00</span></li>
                                <li>Buscipit at magna × 1<span>$48.00</span></li>-->
                            </ul>
                               <?php }}?>
                            <ul class="shipping__method">
                                <li>Total Bill with GST Charges:- <span>Rs.<?php echo $cart_plus+$gst?></span></li>
                                   
                              
                            </ul>
                           

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
