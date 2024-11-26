<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php 
/**
 * 
 */
class brand 
{
	private $db;
	private $fm;

	
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function insert_brand($brandName){
		$brandName = $this->fm->validation($brandName);
		
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		
		if(empty($brandName)){
			$alert = "<span class='error'> Category must be not empty</span>";
				
			return $alert;
		}else {
			
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$result= $this->db->insert($query);
			if($result){
				$alert = "<span class='success'> Insert brand Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Insert brand not Success</span>";
				return $alert;
			}
			

		}
	}
	public function get_name_by_brand($id){
    $query = "SELECT tbl_product.*, tbl_brand.brandName
              FROM tbl_product
              JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
              WHERE tbl_product.brandId='$id'";
    $result = $this->db->select($query);
    return $result;
}
public function get_product_by_brand($id){
		$query = "SELECT * FROM tbl_product WHERE brandId='$id' order by brandId desc LIMIT 8"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
public function show_brand_fontend(){
		$query = "SELECT * FROM tbl_brand order by brandId desc"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	public function show_brand(){
		$query = "SELECT * FROM tbl_brand order by brandId desc"; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getbrandbyId($id){
		$query = "SELECT * FROM tbl_brand WHERE brandId='$id' "; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	
	public function del_category($id){
		$query = "DELETE  FROM tbl_brand WHERE brandId='$id' "; //theo thu tu id giam
		$result = $this->db->delete($query);
		if($result){
				$alert = "<span class='success'>  Brand delete Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>  Brand  delete not Success</span>";
				return $alert;
			}
		
	}

	public function update_brand($brandName,$id){
		$brandName = $this->fm->validation($brandName);
		$id = mysqli_real_escape_string($this->db->link,$id);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);

		if(empty($brandName)){
			$alert = "<span class='error'> brand must be not empty</span>";
				
			return $alert;
		}else {
			
			$query = "UPDATE tbl_brand SET brandName='$brandName' WHERE brandId='$id' ";
			$result= $this->db->update($query);
			if($result){
				$alert = "<span class='success'>  brand update Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>  brand update not Success</span>";
				return $alert;
			}
			

		}
	}
}

?>