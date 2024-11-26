	
	<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	
?>
			<!-- <?php
			if(isset($_GET['cartid'])){
			     
			        $cartid=$_GET['cartid'];
			        $delcart =$ct->del_product_cart($cartid);
			    }
			if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
			        $cartId=$_POST['cartId'];
			        $quantity=$_POST['quantity'];

			        $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
			    }

			?> -->
<!-- <?php 
if (!isset($_GET['id'])) {
   echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?> -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your /details Ordered</h2>
			    	
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="10%">Price</th>
								<th width="10%">Quantity</th>
								<th width="10%">Status</th>
								<th width="30%">Date Order</th>
								
							</tr>
							<?php 
								$customer_id =Session::get('customer_id');
								$get_cart_ordered=$ct->get_cart_ordered($customer_id);
								if($get_cart_ordered){
									
									$qty=0;
									$id=0;
									while($result=$get_cart_ordered->fetch_assoc()){
										$id++;
									
							?>
							<tr>
								<td><?php echo $id ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].'.'.'VNĐ' ?></td>
								
									<td><?php echo $result['quantity'] ?></td>
								<td><?php echo 'Boughted' ?></td>
								<td><?php echo $result['date_order'] ?></td>
								
								
								
							</tr>
							<?php
							
}
								}
							?>
									
							
						</table>
						
				 
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
	
 <?php
  include 'inc/footer.php';

 ?>