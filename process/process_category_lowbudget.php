<?php
require_once "../classes/Product.php";
$sorted_product  = $products->sort_by_lowbudget($_POST['sort_lowbudget']);
// echo "<pre>";
// print_r($sortedProducts);
// echo "</pre>";
// die();


$html = '';
foreach ($sorted_product as $product) {

 
    $html .= '
     <div class="col-md-3 product_details">
            <input type="hidden" name="" class="product_id" value="' . $product['product_id'] . '">
            <img src="admin/uploads/' . $product['product_img_name'] . '" alt="" id="images" width="300px" height="300px">
            <p name="" class="product_name" value="">' . $product['product_name'] . '</p>
            <p id="flavour_name">' . $product['flavour_name'] . '</p>
            <p id="product_desc">' . $product['products_description'] . '</p>
            <p id="product_price">Price: ' . $product['product_price'] . '</p>
            <div class="butt">
                <button class="btn btn-dark add_cart">Add To Cart 
                    <i class="fa-solid fa-cart-shopping fa-beat-fade" style=" color:rgb(241, 241, 121);"></i>
                </button>
          </div>
        </div>'
        ;
}




echo $html;


?>


