<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath=realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Cart.php');
    $ct=new Cart();
    $fm= new Format();
?>
<?php 
	
	if(isset($_GET['delcusid'])){
		$id=preg_replace('/[^-a-zA-Z0-9]/', '' , $_GET['delcusid']);
		$delcusid=$pd->delProById($id);


	}
?>
<?php 

	if(isset($_GET['delproid'])){
		$id=$_GET['delproid'];
		$time=$_GET['time'];
		$price=$_GET['price'];
		$delOrder=$ct->delProductShifted($id,$time,$price);
		
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
                	if(isset($shift)){
                		echo $shift;
                	}
                ?>
                <?php 
                	if(isset($delOrder)){
                		echo $delOrder;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Details</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
					$ct=new Cart();
					$fm=new Format();
					$getOrder=$ct->getAllOrderProduct();
						if($getOrder){
							while($result=$getOrder->fetch_assoc()){

				
					?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $result['id']?></td>
						    <td><?php echo $result['name']?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']?>">View Details<a/></td>
							<td><?php echo $result['email']?></td>
	
							<td><a onclick=  "return confirm('Are you sure to delete! ') "
							href="?delcusid=<?php echo $result['productId'];?>">Delete</a></td>
							<?php }?>
							
						  

						</tr>
						<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
