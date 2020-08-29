<?php
include('top.php');

$name='';
$email='';
$password='';
$phone='';





if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$edit_sql="select * from customer where cust_id='$id'";
	$res=mysqli_query($con,$edit_sql);
	$row=mysqli_fetch_assoc($res);
	$name=$row['name'];
		$email=$row['email'];
			$password=$row['password'];
				$phone=$row['phone'];
	# code...
	}

	if (isset($_POST['submit'])) {
	$name=get_safe_value($con,$_POST['name']);
		$email=get_safe_value($con,$_POST['email']);
			$password=get_safe_value($con,$_POST['password']);
				$phone=get_safe_value($con,$_POST['phone']);
	$edit_sql="select * from name where name='$name'";
	$res=mysqli_query($con,$edit_sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		echo"<script>alert('This user is already exists')</script>";
	}
		else{
	if (isset($_GET['id']) && $_GET['id']!='') {
		$update_sql="UPDATE `customer` SET `name` = '$name',`email` = '$email',`phone` = '$phone',`password` = '$password'    WHERE `customer`.`cust_id` = $id";
		mysqli_query($con,$update_sql);
	
	}
	else{
		
	$add_sql="insert into customer(cust_ip,name,email,password,phone) values('::1',$name,$email,$password,$phone')";
	mysqli_query($con,$add_sql);
		 }
	header('location:user_master.php');
	# code...
}
}
?>

  <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add user</strong></div>
                        <div class="card-body card-block">
                        	<form method="post">
                           <div class="form-group"><label for="cat" class=" form-control-label">NAME</label><input name="name" type="text" id="company" placeholder="Enter your name" class="form-control" value="<?php echo $name ?>"></div>
                          

                          <div class="form-group"><label for="cat" class=" form-control-label">EMAIL</label><input name="email" type="email" id="company" placeholder="Enter your cat name" class="form-control" value="<?php echo $email ?>"></div>
                          
                          <div class="form-group"><label for="cat" class=" form-control-label">PASSWORD</label><input name="password" type="password" id="company" placeholder="Enter your cat name" class="form-control" value="<?php echo $password ?>"></div>
                          
                          <div class="form-group"><label for="cat" class=" form-control-label">PHONE</label><input name="phone" type="text" id="company" placeholder="Enter your phone" class="form-control" value="<?php echo $phone ?>"></div>
                          
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