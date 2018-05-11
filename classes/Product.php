<?php
 	$filepath=realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

?> 

<?php 
	class product{
					private $db;
    				private $fm;

    			public function __construct(){
    			$this->db =new Database();
    			$this->fm =new Format();
				
				}
				public function productInsert($data,$file){
					
				   $productName =mysqli_real_escape_string($this->db->link,$data['productName']);
    				$catId		 =mysqli_real_escape_string($this->db->link,$data['catId']);
    				$brandId	 =mysqli_real_escape_string($this->db->link,$data['brandId']);
    				$body 		 =mysqli_real_escape_string($this->db->link,$data['body']);
    				$price		 =mysqli_real_escape_string($this->db->link,$data['price']);
    				$type		 =mysqli_real_escape_string($this->db->link,$data['type']);
    				

				    $permited  = array('jpg', 'jpeg', 'png', 'gif');
				    $file_name = $file['image']['name'];
				    $file_size = $file['image']['size'];
				    $file_temp = $file['image']['tmp_name'];

				    $div = explode('.', $file_name);
				    $file_ext = strtolower(end($div));
				    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				    $uploaded_image = "uploads/".$unique_image;
				    if($productName==""||$catId==""||$brandId==""||$body==""||$price==""||$type=="" ||$file_name==""){

				    	$msg = "<span class='error'> Field must not be empty !</span>";
    					return $msg;
				    }
				    elseif ($file_size >1048567) {
						     echo "<span class='error'>Image Size should be less then 1MB!
						     </span>";
						    } elseif (in_array($file_ext, $permited) === false) {
						     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";}


				    else{
				    	move_uploaded_file($file_temp, $uploaded_image);
    					$query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type ) 
    					VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";


    				
    				$inserted_row=$this->db->insert($query);
                    if($inserted_row){
                        $msg="<span class='sucess'>Product Insert Sucessfully.</span>";
                        return $msg;
                    }
                    else{
                         $msg="<span class='error'>Product not Inserted.</span>";
                         return $msg;

                    }

				    }

    				

				}

				public function getAllProduct(){



					$query="SELECT  tbl_product. *,tbl_category.catName,tbl_brand.brandName
					FROM tbl_product
					INNER JOIN tbl_category	
					ON tbl_product.catId = tbl_category.catId
					INNER JOIN tbl_brand	
					ON tbl_product.brandId = tbl_brand.brandId
 
					ORDER BY tbl_product.productId DESC";
					$result=$this->db->select($query);

					return $result;
                    

				}
				public function getProById($id){
					$query="SELECT * FROM tbl_product WHERE productId='$id'";
                    $result=$this->db->select($query);
                    return $result;


				}
				public function productUpdate($data,$file,$id){
					 $productName =mysqli_real_escape_string($this->db->link,$data['productName']);
    				$catId		 =mysqli_real_escape_string($this->db->link,$data['catId']);
    				$brandId	 =mysqli_real_escape_string($this->db->link,$data['brandId']);
    				$body 		 =mysqli_real_escape_string($this->db->link,$data['body']);
    				$price		 =mysqli_real_escape_string($this->db->link,$data['price']);
    				$type		 =mysqli_real_escape_string($this->db->link,$data['type']);
    				

				    $permited  = array('jpg', 'jpeg', 'png', 'gif');
				    $file_name = $file['image']['name'];
				    $file_size = $file['image']['size'];
				    $file_temp = $file['image']['tmp_name'];

				    $div = explode('.', $file_name);
				    $file_ext = strtolower(end($div));
				    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				    $uploaded_image = "uploads/".$unique_image;
				    if($productName==""|| $catId=="" ||$brandId=="" ||$body=="" ||$price=="" || $type=="" ){

				    	$msg = "<span class='error'> Field must not be empty !</span>";
    					return $msg;
				    }
				    else{
				    	if(!empty($file_name)){
			    
				    if ($file_size >1048567) {
						     echo "<span class='error'>Image Size should be less then 1MB!
						     </span>";
						    } elseif (in_array($file_ext, $permited) ===false) {
						     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";}


				    else{
				    	move_uploaded_file($file_temp, $uploaded_image);

					$query="UPDATE tbl_product
    				SET 
    				productName ='$productName',
    				catId 		='$catId',
    				brandId		='$brandId',
    				body 		='$body',
    				price 		='$price',
    				image 		='$uploaded_image',
    				type 		='$type'
    				WHERE productId ='$id'";

    				
    				$updated_row=$this->db->update($query);
                    if($updated_row){
                        $msg="<span class='sucess'>Product updated Sucessfully.</span>";
                        return $msg;
                    } 
                    else{
                         $msg="<span class='error'>Product not updated.</span>";
                         return $msg;

                    }

				    }
	
			}else{

					$query="UPDATE tbl_product
    				SET 
    				productName ='$productName',
    				catId 		='$catId',
    				brandId		='$brandId',
    				body 		='$body',
    				price 		='$price',
    				type 		='$type'
    				WHERE productId ='$id'";

    				
    				$updated_row=$this->db->update($query);
                    if($updated_row){
                        $msg="<span class='sucess'>Product updated Sucessfully.</span>";
                        return $msg;
                    }

                    else{
                         $msg="<span class='error'>Product not updated.</span>";
                         return $msg;

                    }

				    }

			}
				
 		}
 		public function delProById($id){
 			$query="SELECT * FROM tbl_product WHERE productId = '$id'";
 			$getData=$this->db->select($query);
 			if($getData){
 				while($delImg=$getData->fetch_assoc()){
 					$dellink=$delImg['image'];
 					unlink($dellink);
 				}
 			}
 			$delquery="DELETE FROM tbl_product WHERE productId='$id'";
 			$deldata=$this->db->delete($delquery);
                     if($deldata){
                            $msg="<span class='sucess'>Product Deleted Sucessfully.</span>";
                            return $msg;
                    }
                    else
                    {
                        $msg="<span class='error'>Product not Deleted!</span>";
                        return $msg;
                    }


 		}
       public function getFeaturedProduct(){
                    $query="SELECT * FROM tbl_product WHERE type='0' ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;
       }
       public function getNewProduct(){
                    $query="SELECT * FROM tbl_product WHERE type='1' ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;
       }
       public function getSingleProduct($id){
        $query="SELECT p.*,c.catName,b.brandName
                        FROM tbl_product as p, tbl_category as c, tbl_brand as b
                        WHERE p.catId=c.catId AND p.brandId=b.brandId AND P.productId='$id'";
                     
 
                      
                    $result=$this->db->select($query);
                    return $result;

       }
       public function latestFormIphone(){
                    $query="SELECT * FROM tbl_product WHERE  brandId='1' ORDER BY productId DESC LIMIT 1";
                    $result=$this->db->select($query);
                    return $result;

       }
       public function latestFormSamsung(){
                    $query="SELECT * FROM tbl_product WHERE  brandId='2' ORDER BY productId DESC LIMIT 1";
                    $result=$this->db->select($query);
                    return $result;

       }
       public function latestFormAcer(){
                    $query="SELECT * FROM tbl_product WHERE  brandId='4' ORDER BY productId DESC LIMIT 1";
                    $result=$this->db->select($query);
                    return $result;

       }
       public function latestFormCanon(){
                    $query="SELECT * FROM tbl_product WHERE  brandId='12' ORDER BY productId DESC LIMIT 1";
                    $result=$this->db->select($query);
                    return $result;

       }
       public function insertCompareData($cmprid,$cmrId){
                    $cmrId =mysqli_real_escape_string($this->db->link,$cmrId);
                    $productId      =mysqli_real_escape_string($this->db->link,$cmprid);

                    $cquery  ="SELECT * FROM tbl_compare WHERE cmrId='$cmrId' AND productId='$productId'";
                     $check=$this->db->select($cquery);
                     if($check){
                         $msg="<span class='error'>Already Addded!</span>";
                            return $msg;
                     }
                    $query  ="SELECT * FROM tbl_product WHERE productId='$productId'";
                    $result=$this->db->select($query)->fetch_assoc();
                    
                    if($result){
                            $productId=$result['productId'];
                            $productName =$result['productName'];
                            $price=$result['price'];
                            $image=$result['image'];

                             $query = "INSERT INTO tbl_compare(cmrId,productId,productName,price,image) 
                          VALUES('$cmrId','$productId','$productName','$price','$image')";

             
                    $inserted_row=$this->db->insert($query);
                       if($inserted_row){
                            $msg="<span class='sucess'>Addded to Compare.</span>";
                            return $msg;
                    }
                    else
                    {
                        $msg="<span class='error'>Not Added!</span>";
                        return $msg;
                    }
                   
                    } 

       				

            }
            public function getCompareData($cmrId){
                $query="SELECT * FROM tbl_compare WHERE cmrId='$cmrId' ORDER BY id DESC";
                $result=$this->db->select($query);
                return $result;
            }	
            public function delCompareData($cmrId){
            $query="DELETE FROM tbl_compare WHERE cmrId='$cmrId'";
            $deldata=$this->db->delete($query);

            }
            public function getNewMobile(){
                   $query="SELECT * FROM tbl_product WHERE brandId=2  AND catId=3 ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;
                 }
       public function getMobile() {
                    $query="SELECT * FROM tbl_product WHERE catId='3' and brandId!=2 ORDER BY catId DESC LIMIT 8";
                    $result=$this->db->select($query);
                    return $result;
              }
              public function getdesktop(){
                    $query="SELECT * FROM tbl_product WHERE brandId=14  AND catId=1 ORDER BY catId DESC LIMIT 8";
                    $result=$this->db->select($query);
                    return $result;

              }
              public function getNewdesktop(){
                    $query="SELECT * FROM tbl_product WHERE catId='1' and brandId!=14 ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;
              }
              public function getlaptop(){
                $query="SELECT * FROM tbl_product WHERE catId='2' AND type='0' ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;


              }
              public function getNewlaptop(){
                $query="SELECT * FROM tbl_product WHERE catId='2' AND type='1' ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;

              }
              public function getTopApple(){
                   $query="SELECT * FROM tbl_product WHERE brandId=1 LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;

              }
              public function getTopSamgsung(){
                 $query="SELECT * FROM tbl_product WHERE brandId=2 ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;

              }
              public function getTopDell(){
                 $query="SELECT * FROM tbl_product WHERE brandId=15 ORDER BY catId DESC LIMIT 4";
                    $result=$this->db->select($query);
                    return $result;

              }
}
?>