<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php 
    include_once '../classes/brand.php'
?>
 <?php 
    $brand = new brand();  //ten clas
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        

        $insertBrand = $brand->insert_brand($brandName);
    }
?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Danh Mục</h2>
                <?php 
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder=" thêm Thương Hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>