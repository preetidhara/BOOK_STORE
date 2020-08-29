<?php
include("top.php");


if(isset($_GET['type'])){
   $type=get_safe_value($con,$_GET['type']);


if ($type='delete') {
   $id=get_safe_value($con,$_GET['id']);
   $del_sql="delete from customer where cust_id='$id'";
   mysqli_query($con,$del_sql);
}
}
$sql="select * from customer";
$res=mysqli_query($con,$sql);

?>
<style type="text/css">
   .order-table .badge-pending {
    background: red;
  }

  .order-table .badge-edit {
   background-color: #03a9f3;
  }




</style>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Users </h4>
                           <h4 class="box-link"><a href="add_user.php">Add user</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>IP Address</th>
                                        <th>Email</th>
                                         <th>Phone</th>
                                         <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1 ;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                  
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                      
                                       <td><?php echo $row['cust_id'] ?></td>
                                       <td> <span class="name"><?php echo $row['name'] ?></span> </td>
                                         <td> <span class="name"><?php echo $row['cust_ip'] ?></span> </td>
                                           <td> <span class="name"><?php echo $row['email'] ?></span> </td>
                                             <td> <span class="name"><?php echo $row['phone'] ?></span> </td>
                                       
                                       <td>
                                         <?php
                                         echo "<span class='badge badge-edit'><a style='color:white;' href='add_user.php?id=".$row['cust_id']."'>Edit</a></span>&nbsp";
                                         echo "<span class='badge badge-pending'><a style='color:white;' href='?type=delete&id=".$row['cust_id']."'>Delete</a></span>";
                                         ?>
                                       </td>
                                    </tr>
                                 <?php $i++; } ?>
                                  </tbody>
                                    
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
      
   </body>
</html>
<?php
include("footer.php");
?>