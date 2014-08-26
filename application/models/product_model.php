<?php

/**
 * ProductModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class ProductModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function getAllProducts()
    {
        $sql = "SELECT * FROM stock WHERE owner = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id']));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single product
     * @param int $product_id id of the specific product
     * @return object a single object (the result)
     */
    public function getProduct($product_id)
    {
        $sql = "SELECT user_id, product_id, product_text FROM products WHERE user_id = :user_id AND product_id = :product_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id'], ':product_id' => $product_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a product (create)
     * @param string $product_text product text that will be created
     * @return bool feedback (was the product created properly ?)
     */
    public function create()
    {
	/*
	$image_url = "";
	if(!$this->UploadFiles($image_url, UPLOAD_URL .'product_img/'))
	{
	     return false;
	}
	*/
        //Stip_tag cleans the input to prevent for example javascript within the products.

	$mark_up_amount = $_POST['selling_price'] - $_POST['cost_price'];
	
	$sql = "INSERT INTO stock (owner, quantity, cost_price, selling_price, mark_up_amount, category_id, brandname, unit_volume, product_name, description) 
	VALUES ('".strip_tags($_POST['owner'])."', '"
		.strip_tags($_POST['quantity'])."', '"
		.strip_tags($_POST['cost_price'])."', '"
		.strip_tags($_POST['selling_price'])."', '"
		.strip_tags($mark_up_amount)."', '"
		.strip_tags($_POST['category'])."', '"
		.strip_tags($_POST['brandname'])."', '"
		.strip_tags($_POST['unit_volume'])."', '"
		.strip_tags($_POST['product_name'])."', '"
		.strip_tags($_POST['description'])."')";
	$query = $this->db->prepare($sql);
	$query->execute();

	$count =  $query->rowCount();
	if ($count == 1) {
		return true;
	}else {
	    $_SESSION["feedback_negative"][] = "Stock insert error. ".FEEDBACK_NOTE_CREATION_FAILED;
	}
        // default return
        return false;
    }

    /**
     * Setter for a product (update)
     * @param int $product_id id of the specific product
     * @param string $product_text new text of the specific product
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($product_id, $product_text)
    {
        // clean the input to prevent for example javascript within the products.
        $product_text = strip_tags($product_text);
	
	if(!$this->UploadFiles($file, URL .'public/uploads/product_img'))
	{
	     return false;
	}

        $sql = "UPDATE products SET product_text = :product_text WHERE product_id = :product_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':product_id' => $product_id, ':product_text' => $product_text, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Deletes a specific product
     * @param int $product_id id of the product
     * @return bool feedback (was the product deleted properly ?)
     */
    public function delete($product_id)
    {
        $sql = "DELETE FROM products WHERE product_id = :product_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':product_id' => $product_id, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_DELETION_FAILED;
        }
        // default return
        return false;
    }
    
    public function UploadFiles(&$file,$fPath)
    {
	$result = 1;
	
	if(isset($_FILES["file"])){ //processes the file that was uploaded
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$i = 0;
		/*Upload file, assign it a name, check to see if its a valid format and move it to the designated folder*/
		for($i = 0; $i < 1; $i++){
		
			$temp = explode(".", $_FILES["file"]["name"][$i]);
			$extension = end($temp);
			/*
			if ((($_FILES["file"]["type"][$i] == "image/gif")
			|| ($_FILES["file"]["type"][$i] == "image/jpeg")
			|| ($_FILES["file"]["type"][$i] == "image/jpg")
			|| ($_FILES["file"]["type"][$i] == "image/pjpeg")
			|| ($_FILES["file"]["type"][$i] == "image/x-png")
			|| ($_FILES["file"]["type"][$i] == "image/png"))
			&& ($_FILES["file"]["size"][$i] < 80000) && in_array($extension, $allowedExts)) 
			{*/
				$ext = substr(strrchr($_FILES['file']['name'][$i], "."), 1);
			
				$name =  substr($_FILES['file']['name'][$i], 0);
				
				$name =  current(explode(".", $name));
				
				$name = strip_tags($name);
				
				//generate a random file name to avoid name confilct
				$name = md5(rand() * time()).$name;
				
				$field = $name;
				if(!$field || strlen($field = trim($field)) == 0){
					echo "File not selected";
					return false;
				}
				
				if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $fPath.$name.'.'.$ext)){
					//echo '<p> The file "'.$_FILES["file"]["name"][$i].'" has been successfully uploaded. Click <a target="_blank" href="'.$fPath. $name .'.'. $ext.'">here</a> to view. </p>';
					//echo "WTFKS1".$i);
					//return false;
					$file = $fPath.$name.'.'.$ext;
				}else{
					
					//return false;
					switch ($_FILES['file'][$i]['error']){  
						case 1:
							echo '<p> The file "'.$_FILES["file"]["name"][$i].'" is bigger than this PHP installation allows, please try <a href="Register.php">again.</a></p>';
							return false;
						case 2:
							echo '<p> The file "'.$_FILES["file"]["name"][$i].'" is bigger than this form allows, please try <a href="./Register.php">again.</a></p>';
							return false;
						case 3:
							echo '<p> Only part of the file "'.$_FILES["file"]["name"][$i].'" was uploaded. Please try <a href="./Register.php">again.</a></p>';
							return false;
					}
				}
			//}
		}
		if($i == 0){
			echo "No photos where selected.";		
			return false;
		}
	}
	
	return true;
    }    
}
