<?php include 'inc/header.php'; ?>
<?php
	$login=Session::get("cuslogin");
	if($login==false){
		header("Location:login.php");
	}

?>
<style>
    .psuccess{width:500px; min-height: 300px; text-align: center;border:1px solid #ddd;margin: 0 auto;}
     
    .psuccess h2 {
              color:green;
                  border-bottom: 1px solid #ddd;
                  margin-bottom: 80px;
                  padding-bottom: 6px;
                }
.psuccess p {
  line-height: 25px;
  padding-left: 29px;
  padding-right: 3px;
  text-align: left;
  font-size: 18px;
}
</style>


 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="psuccess">
               
            
                    <h2> Success</h2>
                    <?php  
                      $cmrId=Session::get("cmrId");
                      $amount=$ct->payableAmount($cmrId);
                        $sum=0;
                      if($amount){
                         
                        while ($result = $amount->fetch_assoc()) {

                         $price = $result['price'];
                         $sum  =  $sum+$price;                       
                       }
                      }
                    ?>
                     <p style="color:red"> Total Payable Amount(Including Vat): 
                      ৳<?php 
                        
                        $vat=$sum * 0.1;
                        $total=$sum+$vat;
                        echo $total;


                       ?>
                    </p>
               
                  <p> Thank for Purchase.Receive Your Order Successfully.We will
                    contact you as soon as possible.with delivery details.
                    Here your order details...<a href="orderdetails.php" style="color:green">View Order Details</a></p>


                </div>
   	
 		</div>
 	</div>
</div>
   <?php include 'inc/footer.php'; ?>