<?php 
	include_once 'inc/header.php';
	// include_once 'inc/slider.php';
	
?>
<?php 
// Kiểm tra xem có productid được truyền vào không
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $customer_id =Session::get('customer_id');
        $insertOrder=$ct->insertOrder($customer_id);
        $delCart=$ct->del_all_data_cart();
        header('Location:success.php');
    }
    //  if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        
    //     $quantity=$_POST['quantity'];

    //     $AddtoCart = $ct->add_to_cart($quantity,$id);
    // }
?>
<style>
	h2.success_order{
		font-size:20px;
		color: red;

	}
	p.success_note{
		text-align: center;
		padding: 8px;
		font-size: 17px;
	}

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    			<h2 class="success_order">Success Order</h2>
    			<?php
    				$customer_id =Session::get('customer_id');
    				$get_amount=$ct->getAmountPrice($customer_id);
    				if($get_amount){
    					$amount=0;
    					while($result =$get_amount->fetch_assoc()){
    						$pricee =$result['price'];
    						$amount += $pricee;

    					}
    				}
    			?>
    			<p class="success_note">Total Price You Have Bought From My Website
    				<?php
    					$vat =$amount * 0.1;
    					$totall = $vat + $amount;
    					echo $totall;
    				?>
    			</p>
    			<p class="success_note">We will contact as soon as possiable. Please see your order details here 
    				<a href="orderdetails.php">Click Here</a>
    				
    			</p>
 		</div>
 	</div>
		
	</div>
	</form>
 <?php
  include_once 'inc/footer.php';

 ?>