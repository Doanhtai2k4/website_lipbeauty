<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
	
?>

 <div class="main">
    <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>LOREAL PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_loreal=$product->getLastestLorealpro();
	      	if($product_loreal){
	      		while($result_new=$product_loreal->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>

 <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>COCOON PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_Cocoon=$product->getLastestCocoonpro();
	      	if($product_Cocoon){
	      		while($result_new=$product_Cocoon->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>

 <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>GANIER PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_ganier=$product->getLastestGanierpro();
	      	if($product_ganier){
	      		while($result_new=$product_ganier->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>

 <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>KLAIRS PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_klairs=$product->getLastestKlairspro();
	      	if($product_klairs){
	      		while($result_new=$product_klairs->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>

 <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>NEUTROGERA PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_neutrogera=$product->getLastestNEUTROGERApro();
	      	if($product_neutrogera){
	      		while($result_new=$product_neutrogera->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>
<div class="gallery">
	
        <img src="images/simple.png" alt="Image 1" class="gallery-image">

    </div>
 <div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>SIMPLE PRODUCT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_simple=$product->getLastestSimplepro();
	      	if($product_simple){
	      		while($result_new=$product_simple->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']  ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
    </div>
 </div>
 </div>
<?php
  include 'inc/footer.php';

 ?>

