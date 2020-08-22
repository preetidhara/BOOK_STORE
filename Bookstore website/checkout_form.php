<?php 
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
        ?>
    
    <?php
}

$gst=70;
$cart_total=0;
if(isset($_POST['submit'])){
    //$country=get_safe_value($con,$_POST['country']);
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
    $order_status='done';
    $added_on=date('Y-m-d h:i:s');

 mysqli_query($con,"insert into `order`(user_id,address,city,pincode,email,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$district','$postal','$email','$payment_type','$payment_status','$order_status','$added_on','$total_price')");



    
    $order_id=mysqli_insert_id($con);
    
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        
        mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    

}

    unset($_SESSION['cart'])
    ?>
    <script>
        alert("Thank You Product Deliver soon !")
        window.location.href='index.php';
    </script>
    <?php
    
    
}
?>

 <!--<section class="wn__checkout__area section-padding--lg bg__white">
            <div class="container">
            <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="customer_details">

 <h3>Billing details</h3>-->

 <form method="post">
                            <div class="customar__field">
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                
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
                            <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Payment THrough <span>*</span></label>
                                      COD  <input type="radio" name="payment_type"  value="cod">
                                    </div>

                                    <div class="input_box space_between">
                                        <label> <span>   </span></label>
                                    Paypal    <input type="radio" name="payment_type" value="PAYPAL">
                                </div>
                            </div>
                             <button name="submit" style="    color: #fff;
    background-color: #ef1f4a;
    border-color: #ff2f00;width: 253px; "type="submit" class="btn btn-primary">Submit</button>
  </form>
       
                                 
                            