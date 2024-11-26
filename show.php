<?php
include_once 'inc/header.php';
?>

<?php
if(isset($_GET['products'])) {
    $products = json_decode(urldecode($_GET['products']), true);

    // Hiển thị thông tin sản phẩm, ví dụ:
?>

<div class="section group">
    <?php
    foreach ($products as $product) {
    ?>
        <div class="grid_1_of_4 images_1_of_4">
            <a href="preview-3.php"><img src="admin/uploads/<?php echo $product['image'] ?>" alt="" /></a>
            <h2><?php echo $product['productName'] ?></h2>
            <p><?php echo $fm->textShorten($product['product_desc'], 100) ?></p>
            <p><span class="price"><?php echo $product['price'] . "." . "VNĐ" ?></span></p>
            <div class="button"><span><a href="details.php?proid=<?php echo $product['productId'] ?>" class="details">Details</a></span></div>
        </div>
    <?php
    }
    ?>
</div>

<?php
} else {
    echo 'Category Not Available';
}
?>

<?php
include_once 'inc/footer.php';
?>
