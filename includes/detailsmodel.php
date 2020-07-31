<?php echo ob_start();?>


<?php
require_once '../core/init.php';
$id=$_POST['id'];
$id=(int)$id;
$sql=" SELECT * FROM `products` WHERE id ='$id' ";
$result=$db->query($sql);
$product=mysqli_fetch_assoc($result);
$brand_id=$product['Brand']; 
$sql=" SELECT brand FROM `brand` WHERE id ='$brand_id' ";
$brand_query=$db->query($sql);
$brand=mysqli_fetch_assoc($brand_query);
$colorstring=$product['Colors'];
$color_array=explode(',',$colorstring);

?>





  <!-- Details Model -->

<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
    <div class=" modal-content">

        <div class="modal-header">
			<button class="close" type="button" onClick="closeModal();"  aria-label="Close">&times;</button>
        <h4 class="modal-title text-center"><?=$product['Title']?></h4>
        </div> <!-- modal-header-->
        
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="center-block">
                         <img src="<?=$product['Image']; ?>" alt="<?=$product['Title']?>" class=" details img-responsive" />
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                          <h4>Details</h4>
                 <p><?=$product['Description']; ?></p>
                 <hr/>
                 <p>Price : $<?=$product['Price']; ?></p>

                  <p>Brand  : <?=$brand['brand']; ?></p>
                 
                 <form action="add_cart.php" method="post">
                 	
                    <div class="form-group">
                    	<div class="col-xs-3">
                      <label for="quantity">Quantity:</label> <input type="text" class="form-control" id="quantity" name="quantity" />
                        </div>
                        <div class="col-xs-9"></div>
                        
                    </div>
                    <br/><br/>
                   <div class="form-group">
                   <br/><br/>
                   <label for="color"> Color:</label>
                  <select name="color" id="color" class="form-control">
                   <option value=""></option>
                   <?php
                   foreach($color_array as $string){
			$string_array=explode(':',$string);
			$color=$string_array[0];
			$quantity=$string_array[1];
		echo '<option value="'.$color.'">'.$color.'('.$quantity.' Available)</option>';
			   }   ?>
                   </select>

                   </div> 
                 </form>
                    </div>
                </div>
            </div>
        </div> <!-- modal-body-->
    	
        <div class="modal-footer">
        <button  class="btn btn-basic" onClick="closeModal();" > Close </button>
        <button  class="btn btn-primary" type="submit" ><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart </button>
        </div><!-- modal- footer -->
    
    </div>
</div>
</div>


<script>
function closeModal(){
	jQuery('#details-modal').modal('hide');
	setTimeout(function(){
		jQuery('#details-modal').remove();
		jQuery('.modal-backdrop').remove();
		},500);
	} </script>




<?php echo ob_get_clean();?>
   