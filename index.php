<?php 
	include_once 'inc/header.php';
	include_once 'inc/slider.php';
	
?>	

<div class="gallery">
	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$product_feathered=$product->getproduct_feathered();
	      	if($product_feathered){
	      		while($result=$product_feathered->fetch_assoc()){

	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image']  ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p>
					  <!-- <p><span class="price1">300.000 VNĐ</span></p> -->
					 <p><span class="price"><?php echo $result['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php
	}
	      	}

					?>
			</div>
        <img src="images/3ceanhto.png" alt="Image 1" class="gallery-image">
<div class="content">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      	$product_new=$product->getproduct_new();
	      	if($product_new){
	      		while($result_new=$product_new->fetch_assoc()){

	      	
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
        <img src="images/meme.png" alt="Image 2" class="gallery-image"> 

        <!-- <div class="content_bottom">
    		<div class="heading">
    		<h3>Sale Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div> -->
        <!-- <img src="images/anhto2.png" alt="Image 3" class="gallery-image"> -->
    </div>
    <br>
 <div class="main">
    
 </div>
  <?php
  include 'inc/footer.php';

 ?>
 <!-- <style>.price1 {
  text-decoration: line-through;
}</style> -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
    var images = [
        "images/anhto.png",
        "images/anhto1.png",
        "images/anhto2.png"
    ];

    var currentIndex = 0;
    var totalImages = images.length;

    function showImage(index) {
        $(".gallery-image").removeClass("active");
        $(".gallery-image").eq(index).addClass("active");
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % totalImages;
        showImage(currentIndex);
    }

    showImage(currentIndex);

    setInterval(nextImage, 4000);
});


</script>
