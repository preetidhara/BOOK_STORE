<?php
$conn=mysqli_connect("localhost", "root", "","bookstore");
//$db=mysqli_select_db("ecom",$conn);	



function getIpAdd()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;



  }

  function getcats(){
  global $conn;

  $query4="SELECT * from category";
  $result=mysqli_query($conn, $query4);
  while($row=mysqli_fetch_array($result))
  {

    echo "<li><a href=\"shop.php?category=".$row['name']."\">".$row['name']."</a></li>";
   
  }

}


////////////////////////////////////////get Books/////////////////////////////////////

function getbooks(){
  global $conn;
    if(!isset($_GET['category'])){
  $query="SELECT * from Books";
  $result=mysqli_query($conn, $query);
  while($row=mysqli_fetch_array($result))
  {
      $pro_id    = $row['book_id'];
    echo " <div class='col-lg-4 col-md-4 col-sm-6 col-12'>
                        <div class='product'>
                          <div class='product__thumb'>
                            <a class='first__img' href='product1.php?id=".$row['book_id']."'><img src='assets/images/".$row['image']."'></a>            
                            <div class='new__box'>
                              <span class='new-label'>New</span>
                            </div>
                            <ul class='prize position__right__bottom d-flex'>
                              <li>RS.".$row['price']."</li>
                              <li class='old_prize'>Rs.755.00</li>
                            </ul>
                            <div class='action'>
                              <div class='actions_inner'>
                                <ul class='add_to_links'>
                                  <li><a class='cart' href='cart.html'></a></li>
                                  <li><a class='wishlist' href='wishlist.html'></a></li>
                                  <li><a class='compare' href='compare.html'></a></li>
                                  <li><a data-toggle='modal' title='Quick View' class='quickview modal-view detail-link' href='#productmodal'></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class='product__content'>
                            <h4><a href='single-product.html'>".$row["title"]."</a></h4>
                            <ul class='rating d-flex'>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li><i class='fa fa-star-o'></i></li>
                              <li><i class='fa fa-star-o'></i></li>
                            </ul>
                          </div></div></div>"
                          ;
                            }
    }
}


function get_bycat(){
  global $conn;
  if(isset($_GET['category'])){
    $cat_id= $_GET['category'];
    $get_cat_pro = "SELECT * FROM Books WHERE category LIKE '$cat_id'";
    $run_cat_pro=mysqli_query($conn,$get_cat_pro);
    $count_cat = mysqli_num_rows($run_cat_pro);
    if($count_cat==0){
      echo "<h2>No books found</h2>";
    }
    while($row=mysqli_fetch_array($run_cat_pro))
  {
     echo " <div class='col-lg-4 col-md-4 col-sm-6 col-12'>
                        <div class='product'>
                          <div class='product__thumb'>
                            <a class='first__img' href='single-product.html'><img src='assets/images/".$row['image']."'></a>
                            <div class='new__box'>
                              <span class='new-label'>New</span>
                            </div>
                            <ul class='prize position__right__bottom d-flex'>
                              <li>Rs".$row['price']."</li>
                              <li class='old_prize'>Rs55.00</li>
                            </ul>
                            <div class='action'>
                              <div class='actions_inner'>
                                <ul class='add_to_links'>
                                  <li><a class='cart' href='cart.html'></a></li>
                                  <li><a class='wishlist' href='wishlist.html'></a></li>
                                  <li><a class='compare' href='compare.html'></a></li>
                                  <li><a data-toggle='modal' title='Quick View' class='quickview modal-view detail-link' href='#productmodal'></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class='product__content'>
                            <h4><a href='single-product.html'>".$row["title"]."</a></h4>
                            <ul class='rating d-flex'>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li class='on'><i class='fa fa-star-o'></i></li>
                              <li><i class='fa fa-star-o'></i></li>
                              <li><i class='fa fa-star-o'></i></li>
                            </ul>
                          </div></div></div>"
                          ;
                            }

    }
}




  //else {
    //echo "That item does not exist.";

//Count User cart item


function get_safe_value($con,$str){
  if($str!=''){
    $str=trim($str);
    return mysqli_real_escape_string($con,$str);
  }
}

function get_product($con,$limit='',$product_id='',$search_str=''){
  $sql="select * from books  where status=0 ";

  if($product_id!=''){
    $sql.=" and books.book_id=$product_id ";
  }

 if($search_str!=''){
    $sql.=" and (books.title like '%$search_str%' or books.description like '%$search_str%') ";
  }
  if($limit!=''){
    $sql.=" limit $limit";
  }
  
  $res=mysqli_query($con,$sql);
  $data=array();
  while($row=mysqli_fetch_assoc($res)){
    $data[]=$row;
  }
  return $data;
}
  


?>
