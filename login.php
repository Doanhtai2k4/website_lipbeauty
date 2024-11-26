
<?php 
	include_once 'inc/header.php';
	// include_once 'inc/slider.php';
	
?>
	<?php
		   	$login_check=Session::get('customer_login');
		   	if($login_check){
		   		header('Location: order.php');
		   	}
		   	?>
<?php 
    
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        
        

        $insertCustomers = $cs->insert_customers($_POST);
    }
?> 
<?php 
    
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['login'])){
        
        

        $loginCustomers = $cs->login_customers($_POST);
    }
?> 

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<?php 
			    		if(isset($loginCustomers)){
			    			echo $loginCustomers;
			    		}
			    	?>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST" >
                	<input  type="text" name="email" class="field" placeholder="Enter Email......">
                    <input  type="password" name="password" class="field" placeholder="Enter Password......" >
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name="login" class="grey1" value="Sign In"></div></div>
                   
</form>
 </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php 
			    		if(isset($insertCustomers)){
			    			echo $insertCustomers;
			    		}
			    	?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter name ...." >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter City ....">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter Zip-Code ....">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter E-Mail ....">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter Address ....">
						</div>
		    		<div>
						<select id="country" name="country" >
							<option value="AGG">An Giang</option>
							    <option value="BRVT">Bà Rịa - Vũng Tàu</option>
							    <option value="BL">Bắc Giang</option>
							    <option value="BN">Bắc Ninh</option>
							    <option value="BG">Bến Tre</option>
							    <option value="BD">Bình Dương</option>
							    <option value="BP">Bình Phước</option>
							    <option value="BTH">Bình Thuận</option>
							    <option value="CM">Cà Mau</option>
							    <option value="CT">Cần Thơ</option>
							    <option value="CB">Cao Bằng</option>
							    <option value="ĐN">Đà Nẵng</option>
							    <option value="DB">Đắk Bắc</option>
							    <option value="DL">Đắk Lắk</option>
							    <option value="ĐT">Điện Biên</option>
							    <option value="DN">Đồng Nai</option>
							    <option value="DT">Đồng Tháp</option>
							    <option value="GL">Gia Lai</option>
							    <option value="HG">Hà Giang</option>
							    <option value="HNM">Hà Nam</option>
							    <option value="HNI">Hà Nội</option>
							    <option value="HT">Hà Tĩnh</option>
							    <option value="HP">Hải Phòng</option>
							    <option value="HD">Hậu Giang</option>
							    <option value="HYN">Hưng Yên</option>
							    <option value="KH">Khánh Hòa</option>
							    <option value="KG">Kiên Giang</option>
							    <option value="KL">Kon Tum</option>
							    <option value="LC">Lai Châu</option>
							    <option value="LD">Lâm Đồng</option>
							    <option value="LS">Lạng Sơn</option>
							    <option value="LC">Lào Cai</option>
							    <option value="LA">Long An</option>
							    <option value="ND">Nam Định</option>
							    <option value="NA">Nghệ An</option>
							    <option value="NB">Ninh Bình</option>
							    <option value="NT">Ninh Thuận</option>
							    <option value="PT">Phú Thọ</option>
							    <option value="PY">Phú Yên</option>
							    <option value="QB">Quảng Bình</option>
							    <option value="QNAM">Quảng Nam</option>
							    <option value="QNG">Quảng Ngãi</option>
							    <option value="QN">Quảng Ninh</option>
							    <option value="QT">Quảng Trị</option>
							    <option value="ST">Sóc Trăng</option>
							    <option value="SL">Sơn La</option>
							    <option value="TN">Tây Ninh</option>
							    <option value="TB">Thái Bình</option>
							    <option value="TN">Thái Nguyên</option>
							    <option value="TH">Thanh Hóa</option>
							    <option value="TTH">Thừa Thiên Huế</option>
							    <option value="TG">Tiền Giang</option>
							    <option value="TV">Trà Vinh</option>
							    <option value="TQ">Tuyên Quang</option>
							    <option value="VL">Vĩnh Long</option>
							    <option value="VP">Vĩnh Phúc</option>
							    <option value="YB">Yên Bái</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter Phone ....">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter Password ....">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey1" value="Create Account"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
  include_once 'inc/footer.php';

 ?>