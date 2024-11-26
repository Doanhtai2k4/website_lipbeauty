<?php 
	include_once 'inc/header.php';
	// include_once 'inc/slider.php';
	
?>
<?php 
  
    
   $brand = new brand();  //ten clas
    if(!isset($_GET['brandid'])  || $_GET['brandid'] ==NULL){
        echo "<script>window.location='404.php' </script> ";
    }else{
        $id=$_GET['brandid'];

    }
    
?> 
 <div class="main">
    <div class="content">
    	<div class="content_top">
	    		<?php 
    $name_brand = $brand->get_name_by_brand($id);
    $displayedBrand = false;

    if ($name_brand) {
        while ($result_name = $name_brand->fetch_assoc()) {
            if (!$displayedBrand) {
                // Chỉ hiển thị tên category nếu chưa hiển thị
                ?>
                <div class="heading">
                    <h3>Brand : <?php echo $result_name['brandName'] ?></h3>
                </div>
                <?php
                $displayedBrand = true;
            }
        }
    }
?>

    	
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
				$productbybrand=$brand->get_product_by_brand($id);
				if($productbybrand){
					while($result=$productbybrand->fetch_assoc()){

				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']  ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result['price']."."."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
							    <?php 
}}else{
	echo 'Category Not Available';
}
	?>
			</div>

	
	
    </div>
 </div>
<?php
  include_once 'inc/footer.php';

 ?>