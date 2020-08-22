<?php

include "header1.php";
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">
 <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer js -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   


</head>
<body>
 <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shop Single</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shop Single</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			"<div class='col-lg-9 col-12'>
                <div class='wn__single__product'>
                  <div class='row'>
                    <div class='col-lg-6 col-12'>
                      <div class='wn__fotorama__wrapper'>
                        <div class='fotorama wn__fotorama__action' data-nav='thumbs'>
                            <a href='#'><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>"></a>
                            
                        </div>
                      </div>
                    </div>
                    <div class='col-lg-6 col-12'>
                      <div class='product__info__main'>
                        <h1><?php echo $get_product['0']['title']?></h1>
                        <div class='product-info-stock-sku d-flex'>
                          <p>Availability:<span> In stock</span></p>
                          <p>SKU:<span> MH01</span></p>
                        </div>
                        <div class='product-reviews-summary d-flex'>
                          <ul class='rating-summary d-flex'>
                          <li><i class='zmdi zmdi-star-outline'></i></li>
                          <li><i class='zmdi zmdi-star-outline'></i></li>
                         <li><i class='zmdi zmdi-star-outline'></i></li>
                          <li class='off'><i class='zmdi zmdi-star-outline'></i></li>
                          <li class='off'><i class='zmdi zmdi-star-outline'></i></li>
                          </ul>
                          <div class='reviews-actions d-flex'>
                            <a href='#'>(1 Review)</a>
                            <a href='#'>Add Your Review</a>
                          </div>
                        </div>
                        <div class='price-box'>
                          <span>Rs<?php echo $get_product['0']['price']?></span>
                        </div>
                       <div class="product-color-label">
        									<span>Color</span>
        									<div class="color__attribute d-flex">
        										<div class="swatch-option color" style="background: #000000 no-repeat center; background-size: initial;"></div>
        										<div class="swatch-option color" style="background: #8f8f8f no-repeat center; background-size: initial;"></div>
        									</div>
        								</div> 
        								<div class="box-tocart d-flex">
        									<span>Qty</span>
        									<select id="qty">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>

        									<div class="addtocart__actions">
        										<button style="margin-left: 20px;" class="tocart"  href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['book_id']?>','add')">Add to Cart</button>
        									</div>
        								</div>
        								<div class="product-addto-links clearfix">
        									<a class="wishlist" href="#"></a>
        									<a class="compare" href="#"></a>
        									<a class="email" href="#"></a>
        								</div>
        								<div class="product__overview">
        									<p>Ideal for cold-weather training or work outdoors, the Chaz Hoodie promises superior warmth with every wear. Thick material blocks out the wind as ribbed cuffs and bottom band seal in body heat.</p>
        									<ul class="pro__attribute">
        										<li>• Two-tone gray heather hoodie.</li>
        										<li>• Drawstring-adjustable hood. </li>
        										<li>• Machine wash/dry.</li>
        									</ul>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>

        				<script type="text/javascript">
        					
function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			swal("added!", "Product is add to your cart!", "success");
			window.location.href=window.location.href;
			if(type=='update' || type=='remove'){
					swal( "Product is delete to your cart!", "success");
				window.location.href=window.location.href;
			}
			jQuery('.product_qun').html(result);
		}	
	});	
}


        				</script>


</body>
</html>