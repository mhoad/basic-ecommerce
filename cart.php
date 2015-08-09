<?php 
  require 'partials/head.php';
  require 'functionality/functions.php';
?>
  <body>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main>
        <?php 
          if (count($_POST) > 1) {
            // Grab the relevant variables from the POST method
            $product_id = $_POST['productID'];
            $unit_price = $_POST['unit-price'];
            $qty = $_POST['qty'];
            update_cart($product_id, $qty);
            display_cart_details($_SESSION['cart']);
          } elseif (count($_POST) == 0 && isset($_SESSION['cart'])) {
            // There are no post variables but we do have items in the cart so just display the cart contents
            display_cart_details($_SESSION['cart']);
          } else {
            echo '
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">No Items in Your Cart</h3>
                    </div>
                    <div class="panel-body">
                      It appears your shopping cart is empty! Why dont 
                      you check out some of our products 
                      <a href="products.php">here</a>.
                    </div>
                  </div>
            ';
          }
        ?>
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
    <?php require 'partials/javascript.php'; ?>
  </body>
</html>
