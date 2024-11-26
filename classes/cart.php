<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath .'/../lib/database.php');
include_once ($filepath .'/../helpers/format.php');
?>


<?php 
/**
 * 
 */
class cart 
{
	private $db;
	private $fm;

	
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
    function add_to_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $sId=session_id();
    $query="SELECT * FROM tbl_product WHERE productId='$id'  ";
    $result =$this->db-> select($query)->fetch_assoc();
     // Lấy giá trị cartId của hàng cuối cùng
            $query_get_last_cartId = "SELECT MAX(cartId) AS max_cartId FROM tbl_cart";
            $result_get_last_cartId = $this->db->select($query_get_last_cartId);
            $row_get_last_cartId = $result_get_last_cartId->fetch_assoc();
            $last_cartId = $row_get_last_cartId['max_cartId'];

            // Thêm 1 vào giá trị cartId
            $new_cartId = $last_cartId + 1;

            $image= $result['image'];
            $price=$result['price'];
            $productName=$result['productName'];
             // // Kiểm tra xem sản phẩm đã được thêm vào giỏ hàng chưa
        $check_cart_query = "SELECT * FROM tbl_cart WHERE productId='$id' AND sId='$sId'";
        $check_cart_result = $this->db->select($check_cart_query);

        if ($check_cart_result) {
            // Sử dụng hàm num_rows để kiểm tra số dòng trả về
            if ($check_cart_result->num_rows > 0) {
                // Sản phẩm đã được thêm vào giỏ hàng, bạn có thể xử lý thông báo ở đây
                $msg = "Product Already added";
                return $msg;
            }
        }
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
          $query = "SELECT * FROM tbl_product WHERE productId='$id'";
        $result = $this->db->select($query);

        // Kiểm tra xem có dữ liệu trả về không trước khi sử dụng fetch_assoc()
        if ($result) {
            $row = $result->fetch_assoc();
            $image = $row["image"];
            $price = $row["price"];
            $productName = $row["productName"];
            // Thực hiện INSERT với giá trị productId mới và tên hình ảnh
          $query_insert  = "INSERT INTO tbl_cart(cartId, productId, sId, productName, price, quantity, image)
          VALUES('$new_cartId', '$id', '$sId', '$productName', '$price', '$quantity', '$image')";

            $insert_cart  = $this->db->insert($query_insert);

            if ($insert_cart) {
             header('Location: cart.php');
            } else {
                header('Location:404.php');
            }
    }else{
         header('Location: 404.php');
    }
}
        public function get_product_cart(){
            $sId=session_id();
            $query="SELECT * FROM tbl_cart WHERE sId='$sId' ";
            $result=$this->db->select($query);
            return $result;
        }
         public function update_quantity_cart($quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET 
            quantity='$quantity'
            WHERE cartId='$cartId'";
        $result = $this->db->update($query);

        if ($result) {
             header('Location: cart.php');
        } else {
            $msg = "<span class='error1'>Product quantity Update not Successfully</span>";
            return $msg;
        }
         

    }
     public function del_product_cart($cartid){
        $cartid=mysqli_real_escape_string($this->db->link, $cartid);
        $query="DELETE FROM tbl_cart WHERE cartId='$cartid' " ;
        $result=$this->db->delete($query);
        if($result){
          header('Location: cart.php');
        }else{
             $msg = "<span class='error1'>Product quantity Delete not Successfully</span>";
            return $msg;
        }
    }
     public function check_cart(){
             $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
        $result = $this->db->select($query);
        return $result;
        }
        public function del_all_data_cart(){
              $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId='$sId'";
        $result = $this->db->select($query);
        return $result;
        }
        public function insertOrder($customer_id){
    $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
    $get_product = $this->db->select($query);

    if ($get_product) {
        while ($result = $get_product->fetch_assoc()) {
            $productid = $result['productId'];
            $productName = $result['productName'];
            $quantity = $result['quantity'];
            $price = $result['price'] * $quantity ;
            $image = $result['image'];
            $customerid = $customer_id;

            $query_order = "INSERT INTO tbl_order (productId, productName, quantity, price, image, customer_id) VALUES
                ('$productid', '$productName', '$quantity', '$price', '$image', '$customerid')";
            $insert_order = $this->db->insert($query_order);
        }
    }
}
    public function getAmountPrice($customer_id){
        $query="SELECT price FROM tbl_order WHERE customer_id ='$customer_id' ";
        $get_price=$this->db->select($query);
        return $get_price;
    }
    public function get_cart_ordered($customer_id){
          $query="SELECT * FROM tbl_order WHERE customer_id ='$customer_id' ";
        $get_cart=$this->db->select($query);
        return $get_cart;
    }
}

?>