<?php
//require_once '../core/init.php';
require_once($_SERVER['DOCUMENT_ROOT']) . '/final/core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';


if(isset($_GET['add'])){
	//code
$brandQuery=$db->query("SELECT * FROM `brand` ORDER BY `brand` ");
	$parentQuery=$db->query("SELECT * FROM `categories` WHERE `parent`=0 ORDER BY `category` ");
?>
<h2 class="text-center">Add a New Product </h2>
  
<form action="products.php?add=1" method="post" enctype="multipart/form-data">    
     <div class="form-group col-md-3">
		<label for="title">Title*</label>
		<input class="form-control" type="text" name="title" id="title" 
        value=" <?= (isset($_POST['Title']))?sanitize($_POST['Title']):''  ?> ">
	</div>	
    
     <div class="form-group col-md-3">
	<label for="brand">Brand*</label>
	<select class="form-control" type="text" name="brand" id="brand">
 <option value="<?=((isset($_POST['Brand']) && $_POST['Brand'] == '')?' selected':'') ?>"></option>
        <?php while($brand=mysqli_fetch_assoc($brandQuery)): ?>          
        <option value="<?=$brand['id'];?>"  
<?=( isset($_POST['brand']) && $_POST['brand']==$brand['id']) ?' selected':'' ?>  >
       <?=$brand['brand'];?> 
        </option>
        <?php endwhile; ?>
        </select>
	</div> 

<div class="form-group col-md-3">
<label for="parent">Parent Category:*</label>
<select class="form-control" id="parent" name="parent">
<option value="<?php ((isset($_POST['parent']) && $_POST['parent'] == '')?' selected':'') ?>"></option>
		<?php while($parent = mysqli_fetch_assoc($parentQuery)): ?>
		<option value="<?= $parent['id']; ?>" <?=( isset($_POST['parent']) && $_POST['parent']==$parent['id']) ?' selected':'' ?> >				          	 
		<?= $parent['category']; ?>
               	 </option>
		<?php endwhile; ?>
	</select>
	</div>

       
    <div class="form-group col-md-3">
			<label for="child">Child Category:*</label>
			<select id="child" name="child" class="form-control">
			</select>
		</div>
   
       <div class="form-group col-md-3">
     		<label for="price">Price:*</label>
			<input type="text" id="price" name="price" class="form-control"
             value="<?= ((isset($_POST['Price']))? Sanitize($_POST['Price']):''); ?>">
		</div>

     <div class="form-group col-md-3">
	<label for="list_price">List Price:</label>
	<input type="text" id="list_price" name="list_price" class="form-control"
             value="<?= ((isset($_POST['List_price']))? Sanitize($_POST['List_price']):''); ?>">
		</div>

            <div class="form-group col-md-3">
			<label>Quantity & Colors:*</label>
			<button class="btn btn-default form-control"
             onclick="jQuery('#colorsModal').modal('toggle');return false;">Quantity & Colors </button>
		</div>

<div class="form-group col-md-3">
			<label for="sizes"> Colors & Qty Preview</label>
			<input type="text"  class="form-control" name="colors" id="colors"
             value="<?php echo ((isset($_POST['Colors']))?$_POST['Colors']:'') ?>" readonly>
		</div>

       <div class="form-group col-md-6">
	<label for="photo">Product Photo:</label>
	<input type="file" name="photo" id="photo" class="form-control">
</div>
        
<div class="form-group col-md-6">
	<label for="description">Description:</label>
	<textarea name="description" id="description" rows="6" class="form-control">
	<?= ((isset($_POST['Description']))? sanitize($_POST['Description']):'') ?></textarea>
</div>

   <div class="form-group   pull-right">
<input type="submit" value="Add Product" class="form-control btn btn-primary col-md-3">
</div>
            <div class="clearfix"> </div>
    
       
     </form>      
  <?php 

	}else{
	//old code

$sql="SELECT * FROM `products` WHERE `Deleted`=0" ;
$presults=$db->query($sql);

// We are now going to write logic that will update whether the product is featured or not
// Kind of like an on off button
if(isset($_GET['Featured'])) {
	$id = (int)$_GET['Id'];
	$featured = (int)$_GET['Featured'];
	$featuredSql = "UPDATE products SET Featured = '$featured' WHERE Id = '$id'";
	$db->query($featuredSql);
	header('Location:products.php');
}



?>
<h2 class="text-center"> Products </h2>
<!-- Button to add new product goes here -->
<a href="products.php?add=1" class="btn btn-primary pull-right" id="add-product-btn">
Add Product</a>
<div class="clearfix"></div>
<hr/>


<table class="table table-border table-condensed table-striped">
<thead>
<th></th>
<th>Product</th>
<th>Price</th>
<th>Categories</th>
<th>Featured</th>
<th>Sold</th>
</thead>

<tbody>    
    <?php while($product = mysqli_fetch_assoc($presults)):    
    // Trying to display the parent category for every product
			$child_id = $product['Categories'];
			$catSql = "SELECT * FROM categories WHERE id = '$child_id'";
			$result = $db->query($catSql);
			$child = mysqli_fetch_assoc($result);
			$parentID = $child['parent'];
			$pSql = "SELECT * FROM categories WHERE id = '$parentID'";
			$presult = $db->query($pSql);
			$parent = mysqli_fetch_assoc($presult);
			$category = $parent['category'] . '-' . $child['category'];
// Idea for future. Will have nested categories. Only display immediate parent category of product
?>    
    <tr>


<td>
<a href="?edit=<?= $product['Id'];?>" class="btn btn-xs btn-default">
<span class="glyphicon glyphicon-pencil"></span></a>

<a href="?delete=<?= $product['Id'];?>" class="btn btn-xs btn-default">
<span class="glyphicon glyphicon-remove"></span></a>
</td>




	<td><?php echo $product['Title']; ?></td>
	<td><?php echo money($product['Price']); ?></td> 
	<td><?=$category?></td>
	
	<td><a href="products.php?featured=<?=(($product['Featured'] == 0)?'1':'0') ?>&id=<?php echo $product['Id']; ?>" 
    class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-<?=(($product['Featured'] == 1)?'minus':'plus')?>"> </span> </a>
    &nbsp <?php echo (($product['Featured'] == 1)?'Featured Product':'') ?>
    </td>

	<td>0</td>
	
	</tr>
		<?php endwhile; ?>     
    	</tbody>
</table>



<?php 
}//else
include 'includes/footer.php'; ?>

