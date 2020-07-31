  

<?php

require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
include 'includes/leftbar.php';


$sql=" SELECT * FROM `products` WHERE featured =1 ";
$featured=$db->query($sql);

 ?>
 
 
 
 <div class="col-md-8">
    <div class="row">
    
    <h2 class="text-center">Feature Products</h2>
    
        <div class="col-md-3">
        <article class="thumbnail">
        <h4>Microsoft Lumia 540</h4>
        <img src="images/products/microsoft.png" alt="Levis Jeans" class="img-thumb" />
        <p class="list-price text-danger">List Price : <s>$99.99</s></p>
        <p class="price">Our Price : $69.99</p>
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">
        Details </button>
			</article>
        </div>
   
    
    
        <?php while($product=mysqli_fetch_assoc($featured)):?>

      <div class="col-md-3">
       <article class="thumbnail">
        <h4><?=$product['Title']; ?></h4>
<img src="<?=$product['Image']; ?>" alt="<?=$product['title']; ?>" class="img-thumb" />
        <p class="list-price text-danger">List Price : <s>$<?=$product['List_price']; ?></s></p>
        <p class="price">Our Price : $<?=$product['Price']; ?></p>
   <button type="button" class="btn btn-sm btn-success" onClick="detailsmodel(<?=$product['Id'];?>);">Details </button>
		  </article>
      </div>
   <?php endwhile; ?>  

    
    

    
    </div><!-- row -->
    </div><!-- col8 main -->

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<?php
include 'includes/rightbar.php';
include 'includes/footer.php';

 ?>
