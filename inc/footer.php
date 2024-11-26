
</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="contact.php">contact</a></li>
						<li><a href="https://www.facebook.com/angonzimoto12345" target="_blank">Facebook</a></li>
						<li><a href="https://id.zalo.me/account?continue=https://chat.zalo.me" target="_blank"><span>Zalo</span></a></li>
						<li><a href="https://www.instagram.com/accounts/login/" target="_blank">Instagram</a></li>
						<li><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#chat/home" target="_blank"><span>Email</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#"><span>Site Map</span></a></li>
						<li><a href="#"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login.php">Sign In</a></li>
							<li><a href="index.php">View Cart</a></li>
							<li><a href="profile.php">My Profile</a></li>
							<li><a href="contact.php">Contact</a></li>
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+84-0397927156</span></li>
							<li><span>+84-0987737273</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://www.facebook.com/angonzimoto12345" target="_blank"> </a></li>
							      <li class="twitter"><a href="https://id.zalo.me/account?continue=https://chat.zalo.me" target="_blank"> </a></li>
							      <li class="googleplus"><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#chat/home" target="_blank"> </a></li>
							      <li class="contact"><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#chat/home" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Training with live project &amp; All rights Reseverd </p>
		   </div>
     </div>
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
	  </script>
</body>
</html>