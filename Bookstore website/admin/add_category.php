<?php
include('top.php');
$categories='';



if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$edit_sql="select * from category where id='$id'";
	$res=mysqli_query($con,$edit_sql);
	$row=mysqli_fetch_assoc($res);
	$categories=$row['name'];
	# code...
	}

	if (isset($_POST['submit'])) {
	$add=get_safe_value($con,$_POST['categories']);
	$edit_sql="select * from category where name='$add'";
	$res=mysqli_query($con,$edit_sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		echo"<script>alert('This category is already exists')</script>";
	}
		else{
	if (isset($_GET['id']) && $_GET['id']!='') {
		$update_sql="UPDATE `category` SET `name` = '$add' WHERE `category`.`id` = $id";
		mysqli_query($con,$update_sql);
	
	}
	else{
	$add_sql="insert into category(name) values('$add')";
	mysqli_query($con,$add_sql);
		 }
	header('location:categories.php');
	# code...
}
}
?>

  <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Category</strong></div>
                        <div class="card-body card-block">
                        	<form method="post">
                           <div class="form-group"><label for="cat" class=" form-control-label">Category</label><input name="categories" type="text" id="company" placeholder="Enter your cat name" class="form-control" value="<?php echo $categories ?>"></div>
                          
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
include('footer.php');
	?>