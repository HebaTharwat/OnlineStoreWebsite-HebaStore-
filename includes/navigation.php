

<?php

$sql=" SELECT * FROM `categories` WHERE parent = 0 ";
$pquery=$db->query($sql);
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
 <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
<a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-shopping-cart">&nbsp;HebaStore</a>
	</div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav" >
 <li class="active"><a href="index.php">Home</a></li>
	<?php while($parent=mysqli_fetch_assoc($pquery)):?>
<?php 
    $parent_id= $parent['id'];
    $sql2=" SELECT * FROM `categories` WHERE parent =$parent_id  ";
    $cquery=$db->query($sql2);
    ?>
<!-- Menu Items -->
	<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <?php echo $parent['category'];?>
    <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
    <?php while($child=mysqli_fetch_assoc($cquery)):?>
  	
  	 
   	
    <li><a href="products.php?id=<?php echo $id=$child['id'] ?>" >
     
      
       <?php echo $child['category'];?> </a></li>
        <?php endwhile; ?>
    </ul>
    </li><!-- dropdown -->
    <?php endwhile; ?>
</ul>




 <form class="navbar-form navbar-left" action="result.php" enctype="multipart/form-data">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="user_query">
    <div class="input-group-btn">
      <button class="btn btn-basic" type="submit" name="search">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>




  <ul class="nav navbar-nav navbar-right">
      
        <li><a href="sign.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

 </div>
</div><!-- container -->
</nav>
