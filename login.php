<?php include 'inc/header.php'; ?>
<?php
	$login=Session::get("cuslogin");
	if($login==true){
		header("Location:order.php");
	}

?>
					 <?php
					       
					        if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['login'])){
					      
					        $customerLog=$cmr->customerLogin($_POST);

					    }
					?>
<style>
.contact-form input[type="text"], .contact-form textarea {
  background: #fcfcfc none repeat scroll 0 0;
  border: medium none;
  box-shadow: 0 0 3px #999 inset;
  color: #464646;
  display: block;
  font-family: Arial,Helvetica,sans-serif;
  font-size: 0.8125em;
  outline: medium none;
  padding: 8px;
  width: 300px;
}
					</style>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php
    				if(isset($customerLog)) {
    					echo  $customerLog;
    				}
    		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" >
                	<input name="email" placeholder="Email" type="text"/>
                	<input name="pass" Placeholder="Password" type="password"/>
                	 <div class="buttons"><div><button class="grey"name="login">Sign In</button></div></div>
                    </div>
                 </form>
                 
  				 <?php
					       
					        if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['register'])){
					      
					        $customerReg=$cmr->customerRegistration($_POST);

					    }
					?>
    	<div class="register_account">
    		<?php
    				if(isset($customerReg)) {
    					echo  $customerReg;
    				}
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>

						<td>
							<div>
							<input type="text" name="name" placeholder="Name"  />
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div style="background:#fcfcfc ">
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    		<div>
						<input type="text" name="country" placeholder="Country"/>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone"/>
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		    
  				
		   <div class="search"><div><button class="grey"name="register">Create Account</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>