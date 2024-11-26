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
		   $id=Session::get('customer_id');
		     if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['save'])){
		        
		       

		        $UpdateCustomer = $cs->update_customers($_POST,$id);
		    }
		?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Update Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<form action="" method="post">
    	<table class="tblone">
    		<tr>
    			<?php
    					if(isset($UpdateCustomer)){
    						echo '<td colspan="3">'.$UpdateCustomer.'</td>';
    					}
    			?>
    		</tr>
    		<?php
    			$id=Session::get('customer_id');
    			$get_customers = $cs->show_customers($id);
    			if($get_customers){
    				while($result=$get_customers->fetch_assoc()){

    		?>
    		<tr>
    			<td>name</td>
    			<td>:</td>
    			<td> <input type="text" name="name" value=" <?php echo $result['name'] ?>"></td>
    		</tr>
    		<!-- <tr>
    			<td>city</td>
    			<td>:</td>
    			<td> <input type="text" name="city" value=" <?php echo $result['city'] ?>"></td>
    		
    		</tr> -->
    		<tr>
    			<td>phone</td>
    			<td>:</td>
    			<td> <input type="text" name="phone" value=" <?php echo $result['phone'] ?>"></td>
    			
    		</tr>
    		<!-- <tr>
    			<td>country</td>
    			<td>:</td>
    			<td> <input type="text" name="country" value=" <?php echo $result['country'] ?>"></td>
    			
    		</tr> -->
    		<tr>
    			<td>zipcode</td>
    			<td>:</td>
    			<td> <input type="text" name="zipcode" value=" <?php echo $result['zipcode'] ?>"></td>
    			
    		</tr>
    		<tr>
    			<td>email</td>
    			<td>:</td>
    				<td> <input type="text" name="email" value=" <?php echo $result['email'] ?>"></td>
    			
    		</tr>
    		<tr>
    			<td>address</td>
    			<td>:</td>
    			<td> <input type="text" name="address" value=" <?php echo $result['address'] ?>"></td>
    			
    		</tr>
    		
    		

    		<?php

    				}
    			}
    		?>
    	</table>
    	<div class="saveprofile">
    			<tr>
    			<td colspan="3"><input type="submit" name="save" value="Save" > </a></td>
    		</tr>
    		</div>
    		</form>
 		</div>
 	</div>
	
	</div>
	
 <?php
  include_once 'inc/footer.php';

 ?>
 <style>
 	 input[type="text"] {
        width: auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 10px;
        background-color: #fff; /* Màu nền của input */
    }

    input[type="text"]:focus {
        border-color: #4CAF50; /* Màu viền khi input được focus */
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); /* Hiển thị shadow khi input được focus */
    }
 	.saveprofile {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px; /* Khoảng cách giữa table và nút input */
    }

    /* CSS cho nút input */
    .saveprofile input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .saveprofile input[type="submit"]:hover {
        background-color: #yellowgreen;
    }



 </style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.saveprofile input[type="submit"]').on('mousedown', function() {
            $(this).addClass('active');
        });

        $('.saveprofile input[type="submit"]').on('mouseup', function() {
            $(this).removeClass('active');
        });
    });
</script>
