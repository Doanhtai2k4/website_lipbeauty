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
	.box-left{
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding:4px ;
	}
	.box-right{
		width: 45%;
		border: 1px solid #666;
		float: right;
		padding:4px ;
	}
	.a_order {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin: 10px;

    }

    .a_order:hover {
      background-color: green;
    }
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		
    		</div>
    		<div class="clear"></div>
    		<div class="box-left">
    			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    		if(isset($update_quantity_cart)){
			    			echo $update_quantity_cart;
			    		}
			    	?>
			    	<?php 
			    		if(isset($delcart)){
			    			echo $delcart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="20%">Total Price</th>
							
							</tr>
							<?php 
								$get_product_cart=$ct->get_product_cart();
								if($get_product_cart){
									$subtotal=0;
									$qty=0;
									$i=0;
									while($result=$get_product_cart->fetch_assoc()){
										$i++;
									
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img  src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
							
								<td><?php echo $result['price'].' '.'VNĐ' ?></td>
								<td>
									
										<?php echo $result['quantity'] ?>
										
										
									
								</td>
								<td>
									<?php 
									$total=$result['price']* $result['quantity'];
									echo $total.' '.'VNĐ';
									?>
								</td>
								
							</tr>
							<?php
							$subtotal += $total;
							$qty=$qty+ $result['quantity'];
}
								}
							?>
									<?php 
											$check_cart=$ct->check_cart();
											if($check_cart){
												
									?>
							
						</table>
						<table style="float:right;text-align:left;margin: 5px;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 

								
								echo $subtotal.' '.'VNĐ';
								 Session::set('sum',$subtotal);
								 Session::set('qty',$qty);

							?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%(<?php echo $vat=$subtotal*0.1; ?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									<?php 
										
										$gtotal = $subtotal+ $vat;
										echo $gtotal.' '.'VNĐ';

									?>
								 </td>
							</tr>
							
					   </table>
					   <?php 
					} else {
    echo ' <span class="error1">Your Cart is Empty! Please Shopping Now</span>';
}
				 ?>
					</div>
    		</div>
    		<div class="box-right">
    			<table class="tblone">
    				<h2 style="text-align: center;">Profile</h2>
    		<?php
    			$id=Session::get('customer_id');
    			$get_customers = $cs->show_customers($id);
    			if($get_customers){
    				while($result=$get_customers->fetch_assoc()){

    		?>
    		<tr>
    			<td>name</td>
    			<td>:</td>
    			<td><?php echo $result['name'] ?></td>
    		</tr>
    		<tr>
    			<td>city</td>
    			<td>:</td>
    			<td><?php echo $result['city'] ?></td>
    		</tr>
    		<tr>
    			<td>phone</td>
    			<td>:</td>
    			<td><?php echo $result['phone'] ?></td>
    		</tr>
    		<tr>
    			<td>country</td>
    			<td>:</td>
    			<td><?php echo $result['country'] ?></td>
    		</tr>
    		<tr>
    			<td>zipcode</td>
    			<td>:</td>
    			<td><?php echo $result['zipcode'] ?></td>
    		</tr>
    		<tr>
    			<td>email</td>
    			<td>:</td>
    			<td><?php echo $result['email'] ?></td>
    		</tr>
    		<tr>
    			<td>address</td>
    			<td>:</td>
    			<td><?php echo $result['address'] ?></td>
    		</tr>
    		<tr>
    			<td colspan="3"><a href="editprofile.php"> Update Profile</a></td>
    		</tr>

    		<?php

    				}
    			}
    		?>
    	</table>
    		</div>
    		
 		</div>
 	</div>
		<center><a href="?orderid=order" class="a_order"> Order Now</a></center>
		
		 <br> 
	</div>
	</form>
 <?php
  include_once 'inc/footer.php';

 ?>
 
<style>
	.box-left{
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding:4px ;
	}
	.box-right{
		width: 45%;
		border: 1px solid #666;
		float: right;
		padding:4px ;
	}
	.a_order {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin: 10px;

    }

    .a_order:hover {
      background-color: green;
    }