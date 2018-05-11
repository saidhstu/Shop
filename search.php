<?php include 'inc/header.php'; ?>
<?php
    if(!isset($_GET['search'])|| $_GET['search']==NULL){
        header("Location:404.php");

    }
            else{ 
                $search=$_GET['search'];

         
    }
?>
<?php
      $query="SELECT * FROM tbl_product WHERE productName LIKE '%search%'";
                    $result=$this->db->select($query);
                  
                    if($result) {
                    	while($result=$result->fetch_assoc)
                  

?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Apple</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	 $getFpd=$pd->getTopApple();
	      	 if($getFpd){
	      	 	while($result=$getFpd->fetch_assoc()){
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
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
	      	<?php
	      	 $getFpd=$pd->getTopSamgsung();
	      	 if($getFpd){
	      	 	while($result=$getFpd->fetch_assoc()){
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
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Dell</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
	      	<?php
	      	 $getFpd=$pd->getTopDell();
	      	 if($getFpd){
	      	 	while($result=$getFpd->fetch_assoc()){
      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>">
					 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 
					 <p><span class="price">৳<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" 
				     	class="details">Details</a></span></div>
				</div>
				<?php } } } else {?>
				<p>your search not found!!</p>
				<?php }?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>