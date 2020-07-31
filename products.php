<?php

require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
include 'includes/leftbar.php';


$id = $_GET["id"];
$sql=" SELECT * FROM `products` WHERE categories =$id ";
$categories=$db->query($sql);

 ?>
 
 
 
 <div class="col-md-8">
    <div class="row">
    
    <h2 class="text-center">Products</h2>
    
       
    
    
        <?php while($product=mysqli_fetch_assoc($categories)):?>

      <div class="col-md-3">
       <article class="thumbnail">
       <center><h4><?=$product['Title']; ?></h4></center>
<img src="<?=$product['Image']; ?>" alt="<?=$product['title']; ?>" class="img-thumb" />
        <p class="list-price text-danger">List Price : <s>$<?=$product['List_price']; ?></s></p>
        <p class="price">Our Price : $<?=$product['Price']; ?></p>
   <button type="button" class="btn btn-sm btn-info" onClick="detailsmodel(<?=$product['Id'];?>);">Details </button>
		  </article>
      </div>
   <?php endwhile; ?>  

    
    

    
    </div><!-- row -->
    </div><!-- col8 main -->

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<?php
include 'includes/rightbar.php';
include 'includes/footer.php';

 ?>
