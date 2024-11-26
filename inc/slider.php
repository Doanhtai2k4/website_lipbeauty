<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
				$getLastestLoreal=$product->getLastestLoreal();
				if($getLastestLoreal){
					while($result_loreal=$getLastestLoreal->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $result_loreal['image']  ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_loreal['productName'] ?></h2>
						<p>Mịn Màng Như Nhung </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_loreal['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php

					}
				}
			   ?>
			   		<?php 
				$getLastestCocoon=$product->getLastestCocoon();
				if($getLastestCocoon){
					while($result_cocoon=$getLastestCocoon->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"> <img src="admin/uploads/<?php echo $result_cocoon['image']  ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_cocoon['productName'] ?></h2>
						<p> lì mềm thiết kế vỏ trong suốt           </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_cocoon['productId'] ?>">Add to cart</a></span></div> 
					</div>
				</div>
				 <?php

					}
				}
			   ?>
			</div>
			<div class="section group">
				<?php 
				$getLastestGanier=$product->getLastestGanier();
				if($getLastestGanier){
					while($result_ganier=$getLastestGanier->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $result_ganier['image']  ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_ganier['productName'] ?></h2>
						<p>Cho Viền Môi Mờ Ảo Không Lem Khi Đeo Khẩu Trang</p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_ganier['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php

					}
				}
			   ?>		
			   <?php 
				$getLastestKlairs=$product->getLastestKlairs();
				if($getLastestKlairs){
					while($result_klairs=$getLastestKlairs->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						   <a href="details.php"> <img src="admin/uploads/<?php echo $result_klairs['image']  ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_klairs['productName'] ?></h2>
						<p> Son thỏi mịn lì </p> 
						<div class="button"><span><a href="details.php?proid=<?php echo $result_klairs['productId'] ?>">Add to cart</a></span></div> <br>
					</div>
				</div>
				 <?php

					}
				}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					
  						<li>
 <video  width="480" height="320" controls autoplay muted>
    <source src="images/videoso1.mp4" type="video/mp4">
  
  </video>		
  						</li>
						<li>
							<video  width="580" height="320" controls autoplay muted>
    <source src="images/videoso2.mp4" type="video/mp4">
						</li>
						<li>
							<video  width="580" height="320" controls autoplay muted>
    <source src="images/videoso3.mp4" type="video/mp4">
						</li>
						<li>
							<video  width="580" height="320" controls autoplay muted>
    <source src="images/videoso4.mp4" type="video/mp4">
    </li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	     
	  <div class="clear"></div>
  </div>	
  <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});

		 $(document).ready(function () {
    $('#dc_mega-menu-orange li').hover(
      function () {
        // Hover in
        $('ul', this).fadeIn();
      },
      function () {
        // Hover out
        $('ul', this).fadeOut();
      }
    );
  });
	  </script>
	  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script>
  $(document).ready(function () {
    $('.flexslider').flexslider({
      animation: 'slide',
      slideshowSpeed: 17000, // Thời gian hiển thị mỗi slide (17 giây)
      start: function (slider) {
        $('body').removeClass('loading');
      }
    });
  });
</script>
