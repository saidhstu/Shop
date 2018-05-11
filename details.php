<?php include 'inc/header.php'; ?>
<?php
    if(isset($_GET['proid'])){
       
                $id=preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']);

            }
       
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
       
        $quantity=$_POST['quantity'];
        $addCart=$ct->addToCart($quantity,$id);
         }
        ?>
           <?php
                $cmrId=Session::get("cmrId");

                    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['compare'])){
                    	
                    	 $productId=$_POST['productId'];
                     $insertCom=$pd->insertCompareData($productId,$cmrId);
 
                }
                ?>
   

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
				<?php 
					$getPd=$pd->getSingleProduct($id);
					if($getPd){
						while($result=$getPd->fetch_assoc()){

 
				?>			
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?> </h2>

					<div class="price">
						<p>Price: <span>৳<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></s  pan></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style="color:red;font-size:18px;">
					<?php
					if(isset($addCart)){ 
						echo $addCart;
					}

					?>
					

			 </span>
			 <?php
					if(isset($insertCom)){
						echo $insertCom;
					}

					?>
					<?php 
					$login=Session::get("cuslogin");
	  	
	  				if($login==true){?>
					
			 <div class="add-cart">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" 
						value="<?php echo $result['productId']; ?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
					</form>				
				</div>
			  <?php }?>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			    <?php echo $result['body']; ?>
	    </div>
				<?php } } ?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="Mobile.php">Mobile Phones</a></li>
				      <li><a href="desktop.php">Desktop</a></li>
				      <li><a href="laptop.php">Laptop</a></li>
				      <li><a href="Mobile.php">Accessories</a></li>
				      <li><a href="desktop.php">Software</a></li>
					   <li><a href="laptop.php">Sports & Fitness</a></li>
					   <li><a href="Mobile.php">Footwear</a></li>
					   <li><a href="desktop.php">Jewellery</a></li>
					   <li><a href="laptop.php">Clothing</a></li>
					   <li><a href="topbrands.php">Beauty & Healthcare</a></li>
					   <li><a href="Mobile.php">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
   <?php include 'inc/footer.php'; ?>