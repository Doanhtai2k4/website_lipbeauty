<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath .'/../lib/database.php');
include_once ($filepath .'/../helpers/format.php');
?>


<?php 
/**
 * 
 */
class category 
{
	private $db;
	private $fm;

	
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function insert_category($catName){
		$catName = $this->fm->validation($catName);
		
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		
		if(empty($catName)){
			$alert = "<span class='error'> Category must be not empty</span>";
				
			return $alert;
		}else {
			
			$query = "INSERT INTO tbl_category(catName) VALUES('" . $catName . "')";
			$result= $this->db->insert($query);
			if($result){
				$alert = "<span class='success'> Insert Category Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Insert Category not Success</span>";
				return $alert;
			}
			

		}
	}
	public function get_product_by_cat($id){
		$query = "SELECT * FROM tbl_product WHERE catId='$id' order by catId desc LIMIT 8"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	public function get_name_by_cat($id){
    $query = "SELECT tbl_product.*, tbl_category.catName
              FROM tbl_product
              JOIN tbl_category ON tbl_product.catId = tbl_category.catId
              WHERE tbl_product.catId='$id'";
    $result = $this->db->select($query);
    return $result;
}

	public function show_category(){
		$query = "SELECT * FROM tbl_category order by catId desc"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	public function show_category_fontend(){
		$query = "SELECT * FROM tbl_category order by catId desc"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getcatbyId($id){
		$query = "SELECT * FROM tbl_category WHERE catId='$id' "; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	
	public function del_category($id){
		$query = "DELETE  FROM tbl_category WHERE catId='$id' "; //theo thu tu id giam
		$result = $this->db->delete($query);
		if($result){
				$alert = "<span class='success'>  Category delete Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>  Category  delete not Success</span>";
				return $alert;
			}
		
	}

	public function update_category($catName,$id){
		$catName = $this->fm->validation($catName);
		$id = mysqli_real_escape_string($this->db->link,$id);
		$catName = mysqli_real_escape_string($this->db->link,$catName);

		if(empty($catName)){
			$alert = "<span class='error'> Category must be not empty</span>";
				
			return $alert;
		}else {
			
			$query = "UPDATE tbl_category SET catName='$catName' WHERE catId='$id' ";
			$result= $this->db->update($query);
			if($result){
				$alert = "<span class='success'>  Category update Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>  Category update not Success</span>";
				return $alert;
			}
			

		}
	}
}

?>