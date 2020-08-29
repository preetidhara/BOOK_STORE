<?php
include("top.php");


if(isset($_GET['type'])){
   $type=get_safe_value($con,$_GET['type']);


if ($type='delete') {
   $id=get_safe_value($con,$_GET['id']);
   $del_sql="delete from books where book_id='$id'";
   mysqli_query($con,$del_sql);
}
}
$sql="select * from books";
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
                           <h4 class="box-title">Product </h4>
                           <h4 class="box-link"><a href="add_product.php">Add Product</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <!--<th>ID</th>
                                      
                                        <th>Category</th>
                                       <th>Book Name</th>
                                       <th>Author</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th >Status</th>-->
                                      
                 <th width="2%">ID</th>
                 <th width="10%">Categories</th>
                 <th width="30%">Name</th>
                 <th width="10%">Author</th>
                 <th width="10%">Image</th>
                 <th width="7%">Price</th>
                 <th width="16%">Status</th>
                 

                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1 ;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                  
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                      
                                       <td><?php echo $row['book_id'] ?></td>
                                       <td> <span class="name"><?php echo $row['category'] ?></span> </td>
                                        <td> <span class="name"><?php echo $row['title'] ?></span> </td>
                                         <td> <span class="name"><?php echo $row['author'] ?></span> </td>
                                           <td><img src="<?php echo "../assets/images/".$row['image']?>"/></td>
                                            <td> <span class="name"><?php echo $row['price'] ?></span> </td>  
                                       
                                       <td>
                                        <?php
                                         echo "<span class='badge badge-edit'><a style='color:white;' href='add_product.php?id=".$row['book_id']."'>Edit</a></span>&nbsp;";
                                         echo "<span class='badge badge-pending'><a style='color:white;' href='?type=delete&id=".$row['book_id']."'>Delete</a></span>";
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