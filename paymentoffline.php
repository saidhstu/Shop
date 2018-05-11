<?php include 'inc/header.php'; ?>
<?php
	$login=Session::get("cuslogin");
	if($login==false){
		header("Location:login.php");
	}
  ?>
<?php
  if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
    $cmrId=Session::get("cmrId");
    $insertOrder=$ct->orderProduct($cmrId);   
    $delData=$ct->delCustomerCart();
    header("Location:success.php");
  }
?>


<style>
.division{width:80%;}
.tblone{width:900px;margin:0 auto;border:2px solid #ddd;margin-left: 100px;}
.tblone tr td{text-align: justify;} 
.tbltwo{width:500px;border:2px solid #ddd; margin:0 auto;margin:50px auto; }
.tbltwo tr td{text-align: justify; padding:5px 10px;}
.ordernow{}
.ordernow a{width:150px;margin: 20px auto;text-align: center;padding: 5px;font-size:30px;
display: block;background:#c00a00;color:#fff; }
</style>

 
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="division">
     <table class="tblone">
              <tr>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                
              </tr>
              <?php 
                $getPro=$ct->getCartProduct();
                if($getPro){
                  $i=0; 
                  $sum=0;
                  $qty=0;
                  while($result=$getPro->fetch_assoc()){
                   $i++; 
          
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['productName'];?></td>              
                <td>৳<?php echo $result['price'];?></td>
                <td><?php echo $result['quantity'];?></td>
    
                <td>৳<?php 
                
                 $total=$result['price'] * $result['quantity'];
                 echo $total;

                 ?></td>
                
              </tr>
              <?php 
                 $qty=$qty+$result['quantity'];
                $sum=$sum+$total;
                 

              ?>
              <?php } } ?>
              
            </table>
            <table class="tbltwo">
              <tr>
              
                <td>Sub Total </td>
                <td>: </td>
                <td>৳<?php echo $sum;?></td>
              </tr>
              <tr>
                <td>VAT</td>
                <td>: </td>
                <td>10%</td>
              </tr> 
              <tr>
                <td>Grand Total</td>
                <td>: </td>
                <td>৳
                <?php
                  
                   $vat=$sum*0.1;
                  $gtotal=$sum+$vat;
                   echo $gtotal;
                   Session::set("gtotal",$gtotal);

                ?> 
              </td>
          </tr> 
          <tr>
              
                <td>Quantity </td>
                <td>:</t  d>
                <td><?php echo $qty;?></td>
              </tr>

      </table>
       <div class="ordernow"><a href="?orderid=order">Order</a></div>
    </div>
                                    <div class="division">
                                          <?php 
                                          $id=Session::get("cmrId");
                                          $getdata=$cmr->getCustomerData($id);
                                          if($getdata){
                                            while($result=$getdata->fetch_assoc()){



                                        ?>
                                      
                                        </div>
                                       
<?php } } ?>

 		</div>
    
 	</div>
 
</div>
<?php include 'inc/footer.php'; ?>