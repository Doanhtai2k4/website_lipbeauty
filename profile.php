<?php 
	include_once 'inc/header.php';
	// include_once 'inc/slider.php';
	
?>
<?php
	  	$login_check =Session::get('customer_login');
	  	if($login_check == false){
	  		header('Location: login.php');
	  	}

	  ?>
		<?php 
		    // if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
		    //     echo "<script>window.location ='404.php' </script>";
		    // } else {
		    //     $id = $_GET['proid'];
		    // }
		    //  if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
		        
		    //     $quantity=$_POST['quantity'];

		    //     $AddtoCart = $ct->add_to_cart($quantity,$id);
		    // }
		?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<table class="tblone">
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
	
 <?php
  include_once 'inc/footer.php';

 ?>