<?php 
include_once 'lib/session.php';

Session::init();

?>
<?php 

include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function($className){
include_once "classes/".$className.".php";
});
	

	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$cat=new category();
	$brand=new brand();
	$product=new product();
	$cs=new customer();

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>LIP BEAUTY</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/> -->
<link href="css/filecsschotrang.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
	<?php 
    
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit_search'])){
       // Lấy giá trị từ trường input "search"
        $searchTerm = $_POST['search'];

        // Thực hiện tìm kiếm theo tên sản phẩm
        $searchResults = $product->search_product($searchTerm);

        // Kiểm tra nếu có kết quả tìm kiếm
        if ($searchResults) {
            // Chuyển hướng đến trang show.php và truyền thông tin sản phẩm
            header("Location: show.php?products=" . urlencode(json_encode($searchResults)));
            exit();
        } else {
            // Xử lý khi không tìm thấy sản phẩm
            echo "Không tìm thấy sản phẩm.";
        }
    }
?> 

  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img style="width: 140px;height: 140px;margin-left: 60px;margin-top: 30px;" src="images/lipbeauty.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="" method="POST" >
    <input type="text" class="timkiem" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}" placeholder="Search for Products"> 
    <input class="nuttimkiem" type="submit" value=" search " name="submit_search">
</form>

				    
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									<?php 
											$check_cart=$ct->check_cart();
											if($check_cart){
												$sum=Session::get("sum");
												$qty=Session::get("qty");
												echo $sum.' '.'đ'.'-'.'Qty'.$qty;

											}else{
												echo 'Empty';
											}
									?>

								</span>
							</a>
						</div>
			      </div>
			      <?php
			      	if(isset($_GET['customer_id'])){
			      		$delcart=$ct->del_all_data_cart();
			      		Session::destroy();
			      	}
			      ?>

		   <div class="login">
		   	<?php
		   	$login_check=Session::get('customer_login');
		   	if($login_check == false){
		   		echo '	<a href="login.php">Login</a></div>';
		   	}else{ 
		  
		   		echo '<a href="?customer_id='.Session::get('customer_id').'">Logout</a></div>';
		   	}
		   	?>


		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">

	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <?php
	  	$check_cart =$ct->check_cart();
	  	if($check_cart == true){
	  		echo '<li><a href="cart.php">Cart</a></li>';
	  	}else{
	  		echo '';
	  	}

	  ?>
	    <?php
	  	$login_check =Session::get('customer_login');
	  	if($login_check == false){
	  		echo '';
	  	}else{
	  		echo ' <li><a href="profile.php">Profile</a> </li>';
	  	}

	  ?>
	 
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
