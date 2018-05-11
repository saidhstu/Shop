 <?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<style>
.rightside{float: right;width: 70%;
.images_1_of_4 {
  padding: 1.5%;
  position: relative;
  text-align: center;
  width: 28.8%;

}
.middle{float: right;}
.span_3_of_1 {
  padding: 1.5%;
  width: 20.2% 
}
</style>
 <div class="main">
    <div class="content">
    	<div class="rightside">
    	<div class="content_top"> 
    		<div class="heading">
    		<h3>INTEL DEXKTOP</h3> 
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	 $getNMobile=$pd->getdesktop();
	      	 if($getNMobile){
	      	 	while($result=$getNMobile->fetch_assoc()){
      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>">
					 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 
					 <p><span class="price">৳<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" 
				     	class="details">Details</a></span></div>
				</div>
				<?php } }?>
			</div>
		
	
			
    		<div class="heading">
    		<h3 style="border: 1px solid #ebe8e8;border-radius: 3px;padding: 15px 20px;width:94%">POPULAR BRANDS</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

    	<div class="rightsidebar span_3_of_1" style="width:20.2%;">
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

    	<div class="middle">
			<div class="section group">
				<?php
	      	 $getNpd=$pd->getNewdesktop();
	      	 if($getNpd){
	      	 	while($result=$getNpd->fetch_assoc()){
      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>">
					 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 <p><span class="price">৳<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" 
				     	class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
		</div>
      


</div>
</div>
<?php include 'inc/footer.php'; ?>

