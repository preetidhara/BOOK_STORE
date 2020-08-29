<?php
include"top.php";
$categories_id='';
$author='';
$keywords='';
$title='';
$Price='';
$image='';
$Description='';
$Status='';


if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$sql="select * from books where book_id='$id'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	$categories_id=$row['category'];
	$author=$row['author'];
	$keywords=$row['keywords'];
	$title=$row['title'];
	$Price=$row['price'];
	$Description=$row['description'];
	$Status=$row['status'];
	

	# code...
	}


if (isset($_POST['submit'])) {
	$author=get_safe_value($con,$_POST['author']);
	$keywords=get_safe_value($con,$_POST['keywords']);
	$title=get_safe_value($con,$_POST['title']);
	$Price=get_safe_value($con,$_POST['Price']);
	$image=get_safe_value($con,$_POST['image']);
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$Description=get_safe_value($con,$_POST['Description']);
	$Status=get_safe_value($con,$_POST['Status']);

	$edit_pro_sql="select book_id from books where title='$title'";
	$res=mysqli_query($con,$edit_pro_sql);
	$count=mysqli_num_rows($res);
	if($count<0){
			//echo"<script>alert('This category is already exists')</script>";
	}
	
	else{
		if (isset($_GET['id']) && $_GET['id']!='') {
		//$update_sql="update books set author='$author',title='$title',price='$Price',description='$Description',status='$Status',keywords='$keywords' ";
		$update_sql="UPDATE `books` SET `price` = '$Price',`title`='$title',`author`='$author',`category`='$categories_id' where `book_id`='$id'  ";
		mysqli_query($con,$update_sql);
	
	}

	else{
	$add_pro_sql="insert into books(author,keywords,title,price,image,description,category,status) values('$author','$keywords','$title','$Price','$image','$Description','$categories_id','$Status')";
	mysqli_query($con,$add_pro_sql);
		 }
	header('location:product.php');
	# code...
		}
	}




?>
    <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Product</strong><small></small></div>
                        <div class="card-body card-block">
                        	<form method="post">
                           <div class="form-group"><label for="company" class=" form-control-label">Author</label><input name="author" type="text" id="company" placeholder="Enter your company name" class="form-control" value="<?php echo $author ?>"></div>
                           <div class="form-group"><label for="vat" class=" form-control-label"> Keywords</label><input name="keywords" type="text" id="vat" placeholder="DE1234567890" class="form-control" 
                           	value="<?php echo $keywords ?>"></div>
                           <div class="form-group"><label for="street" class=" form-control-label">Book name</label><input name="title" type="text" id="street" placeholder="Enter street name" class="form-control" 
                           	 value="<?php echo $title?>"></div>
                           <div class="form-group"><label for="country" class=" form-control-label">Price</label><input name="Price" type="text" id="country" placeholder="Country name"  class="form-control" value="<?php echo $Price?>"></div>

                           <div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" >
								</div>

                           	<div class="form-group">
                           		<label for="categories" class=" form-control-label">Short Description</label>
                           		<textarea name="Description" placeholder="Enter product short description" class="form-control" required><?php echo $Description?></textarea>
								</div>
                           	<div class="form-group">
                           		<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id" id="categories_id"  required>
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,name from category order by name asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['name']==$categories_id){
												echo "<option selected value=".$row['name'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['name'].">".$row['name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
                           	<div class="form-group"><label for="street" class=" form-control-label">Status</label><input name="Status" type="text" id="street" placeholder="Enter status value" class="form-control"
                           		value="<?php echo $Status?>"></div>
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">

                           <span id="payment-button-amount">Submit</span>
                           </button>
                       </form>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>

         <?php
         include "footer.php";
         ?>