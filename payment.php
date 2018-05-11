<?php include 'inc/header.php'; ?>
<?php
	$login=Session::get("cuslogin");
	if($login==false){
		header("Location:login.php");
	}

?>
<style>
    .payment{width:500px; min-height: 300px; text-align: center;border:1px solid #ddd;margin: 0 auto;}
     
    .payment h2 {
                  border-bottom: 1px solid #ddd;
                  margin-bottom: 80px;
                  padding-bottom: 6px;
                }
    .payment a {
              background: #ae2626 none repeat scroll 0 0;
              color: #fff;
              font-size: 25px;
              padding: 5px 25px;
            }
            .back {
                  background: #555 none repeat scroll 0 0;
                  border: 4px solid #ddd;
                  display: block;
                  font-size: 30px;
                  margin: 23px auto 120px;
                  padding: 10px;
                  text-align: center;
                  width: 160px;
                }
                .back a{color:#fff;}
</style>


 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="payment">
                    <h2> Choose Payment Option </h2>
                    <a href="paymentoffline.php">Offline Payment</a>
                    <a href="paymentonline.php">Online Payment</a>


                </div>
                    
                    <div class="back">
                    <a href="cart.php">Back</a>

                </div>

                

    	
 		</div>
 	</div>
</div>
   <?php include 'inc/footer.php'; ?>