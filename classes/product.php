<?php 
$filepath = realpath(dirname(__FILE__));

include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>


<?php 
/**
 * 
 */
class product 
{
	private $db;
	private $fm;

	
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function insert_product($data, $files) {
    $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
    $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
    $category = mysqli_real_escape_string($this->db->link, $data['category']);
    $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type = mysqli_real_escape_string($this->db->link, $data['type']);
    
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    // Kiểm tra xem có hình ảnh mới được chọn hay không
    if (!empty($file_name)) {
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = $this->generateUUID() . '.' . $file_ext;

        $uploaded_image = "uploads/" . $unique_image;

        // Di chuyển file vào thư mục uploads
        if (move_uploaded_file($file_temp, $uploaded_image)) {
            // Lấy giá trị productId của hàng cuối cùng
            $query_get_last_productId = "SELECT MAX(productId) AS max_productId FROM tbl_product";
            $result_get_last_productId = $this->db->select($query_get_last_productId);
            $row_get_last_productId = $result_get_last_productId->fetch_assoc();
            $last_productId = $row_get_last_productId['max_productId'];

            // Thêm 1 vào giá trị productId
            $new_productId = $last_productId + 1;

            // Thực hiện INSERT với giá trị productId mới và tên hình ảnh
            $query = "INSERT INTO tbl_product(productId, productName, catId, brandId, product_desc, type, price, image)
                      VALUES('$new_productId', '$productName', '$category', '$brand', '$product_desc', '$type', '$price', '$unique_image')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Insert Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product not Successful</span>";
                return $alert;
            }
        } else {
            $alert = "<span class='error'>Error uploading image</span>";
            return $alert;
        }
    } else {
        // Trường hợp không có hình ảnh mới được chọn, thực hiện INSERT mà không bao gồm tên hình ảnh
        $query = "INSERT INTO tbl_product(productName, catId, brandId, product_desc, type, price)
                  VALUES('$productName', '$category', '$brand', '$product_desc', '$type', '$price')";
        $result = $this->db->insert($query);

        if ($result) {
            $alert = "<span class='success'>Insert Product Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Insert Product not Successful</span>";
            return $alert;
        }
    }
}

	public function show_product(){
		$query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
		FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
		INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
		Order by tbl_product.productId desc";

	$result = $this->db->select($query);
	 	return $result;
		

	}

     public function search_product($searchTerm) {
        // Sử dụng giá trị $searchTerm trong câu truy vấn SQL hoặc phương thức tìm kiếm
        // $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$searchTerm%'";
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
              FROM tbl_product 
              INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
              INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
              WHERE tbl_product.productName LIKE '%$searchTerm%' 
                    OR tbl_category.catName LIKE '%$searchTerm%' 
                    OR tbl_brand.brandName LIKE '%$searchTerm%'
              ORDER BY tbl_product.productId DESC";
        // Thực hiện câu truy vấn và trả về kết quả
        // Đây chỉ là một ví dụ giả định, bạn cần điều chỉnh theo cấu trúc cơ sở dữ liệu và logic của bạn.
        $result = $this->db->select($query);
            
        // Xử lý kết quả và trả về một mảng các sản phẩm
        $products = $result->fetch_all(MYSQLI_ASSOC);

        return $products;

        // Xử lý kết quả và trả về...
    }
	
	public function getproductbyId($id){
		$query = "SELECT * FROM tbl_product WHERE productId='$id' "; //theo thu tu id giam
		$result = $this->db->select($query);
		return $result;
	}
	
	public function del_product($id){
		$query = "DELETE  FROM tbl_product WHERE productId='$id' "; //theo thu tu id giam
		$result = $this->db->delete($query);
		if($result){
				$alert = "<span class='success'>  product delete Successfull</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>  product  delete not Success</span>";
				return $alert;
			}
		
	}
    public function getLastestLoreal(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son Kem Lì 3CE' order by productId desc LIMIT 1 "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestLorealpro(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son Kem Lì 3CE' order by productId desc  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestCocoon(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son môi 3CE 3.5g lì mềm' order by productId desc LIMIT 1  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestCocoonpro(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son môi 3CE 3.5g lì mềm' order by productId desc   "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
     public function getLastestCocoonprocu(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son môi 3CE 3.5g lì mềm' order by productId LIMIT 4  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestGanier(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son Kem 3CE' order by productId desc  LIMIT 1 "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
     public function getLastestGanierpro(){
        $query = "SELECT * FROM tbl_product WHERE brandId='5' order by productId desc  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
     public function getLastestGanierprocu(){
        $query = "SELECT * FROM tbl_product WHERE brandId='5' order by productId LIMIT 4  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestKlairs(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son thỏi 3CE' order by productId desc LIMIT 1  "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestKlairspro(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son thỏi 3CE' order by productId desc "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
public function getLastestKlairsprocu(){
        $query = "SELECT * FROM tbl_product WHERE productName='Son thỏi 3CE' order by productId LIMIT 4 "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestNEUTROGERApro(){
        $query = "SELECT * FROM tbl_product WHERE brandId='2' order by productId desc "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSimplepro(){
        $query = "SELECT * FROM tbl_product WHERE brandId='4' order by productId desc "; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSimpleprocu(){
        $query = "SELECT * FROM tbl_product WHERE brandId='4' order by productId LIMIT 4"; //theo thu tu id giam
        $result = $this->db->select($query);
        return $result;
    }

	public function update_product($data, $files, $id) {
    $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
    $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
    $category = mysqli_real_escape_string($this->db->link, $data['category']);
    $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type = mysqli_real_escape_string($this->db->link, $data['type']);
    
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    // Kiểm tra xem có hình ảnh mới được chọn hay không
    if (!empty($file_name)) {
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = $this->generateUUID() . '.' . $file_ext;

        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "") {
            $alert = "<span class='error'>Fields must not be empty</span>";
            return $alert;
        } else {
            // Nếu kích thước ảnh vượt quá 2MB hoặc định dạng ảnh không hợp lệ
            if ($_FILES['image']['size'] > 209800 || !in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                $alert = "<span class='error'>Image Size should be less than 2MB and in jpg, jpeg, png, gif format.</span>";
                return $alert;
            }

            // Chuyển ảnh vào thư mục uploads
            if (move_uploaded_file($file_temp, $uploaded_image)) {
                // Thực hiện UPDATE với tên hình ảnh mới
                $query = "UPDATE tbl_product SET 
                            productName='$productName',
                            catId='$category',
                            brandId='$brand',
                            product_desc='$product_desc',
                            type='$type',
                            image='$unique_image',
                            price='$price'
                            WHERE productId='$id'";
                $result = $this->db->update($query);

                if ($result) {
                    $alert = "<span class='success'>Product update Successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Product update not Successful</span>";
                    return $alert;
                }
            } else {
                $alert = "<span class='error'>Error uploading image</span>";
                return $alert;
            }
        }
    } else {
        // Trường hợp không có hình ảnh mới được chọn
        $query = "UPDATE tbl_product SET 
                    productName='$productName',
                    catId='$category',
                    brandId='$brand',
                    product_desc='$product_desc',
                    type='$type',
                    price='$price'
                    WHERE productId='$id'";
        $result = $this->db->update($query);

        if ($result) {
            $alert = "<span class='success'>Product update Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Product update not Successful</span>";
            return $alert;
        }
    }
}

// Hàm sinh UUID
private function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
    public function getproduct_feathered(){
        $query= "SELECT * FROM tbl_product WHERE type= '0' order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query= "SELECT * FROM tbl_product order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
        INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
        WHERE tbl_product.productId='$id' ";

    $result = $this->db->select($query);
        return $result;
    }


}

?>