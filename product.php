<?php 
  require 'functionality/product_listings.php'; 
  require 'functionality/functions.php';
?>
<?php 
  // First we want to check that the product_id parameter actually exists and then we want to ensure that it is actualy an integer
  if (isset($_GET['product_id']) && null !== ($product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE)) ) {
    //Now we know that it is an integer we want to make sure it actualy matches up with a valid product
    if (!array_key_exists($product_id, $products)) {
      # Not a valid product ID so send them back to the product page
      header('Location: products.php');
    }
  } else {
    // Not a valid product ID so send them back to the product page
    header('Location: products.php');
  }
?>
<?php require 'partials/head.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main itemscope itemtype="http://schema.org/Product">
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>

        <li class="active"><?php echo $products[$product_id]['title']; ?></li>
      </ol>
      <div class="page-header">
        <h1>
          <span itemprop="name"><?php echo $products[$product_id]['title']; ?></span>
          
          <span itemscope itemtype="http://schema.org/Offer">
            <meta itemprop="availability" content="http://schema.org/InStock">
            <small>
              <span itemprop="priceCurrency" content="AUD">$</span>
              <span itemprop="price" content="<?php echo calculate_price($products[$product_id]['price'],$products[$product_id]['category']); ?>">
              <?php 
              if (is_eligible_for_discount($products[$product_id]['category'])) {
                // If they are eligable for a discount make it obvious to the user when displaying the price
                echo "<del>" . $products[$product_id]['price'] . "</del> " . calculate_price($products[$product_id]['price'],$products[$product_id]['category']);
              } else {
                // If they aren't eligable for a discount just show them the regular price
                echo calculate_price($products[$product_id]['price'],$products[$product_id]['category']);
              }  
              ?>
              </span>
            </small>
          </span>
        </h1>
      </div>
      <div class="row" >
        <div class="col-sm-4">
          <img src="<?php echo $products[$product_id]['image']; ?>" class="img-responsive" alt="<?php echo $products[$product_id]['title']; ?> Shoe" itemprop="image">
        </div>
        <div class="col-sm-8" itemprop="description">
          <p class="lead"><em><?php echo $products[$product_id]['tagline']; ?></em></p>
          <h5>Product Description</h5>
          <p>
            <?php echo $products[$product_id]['description']; ?>
          </p>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Buy A Pair</h3>
              </div>
              <div class="panel-body">
                <p><strong>Status:</strong> In stock</p>
                <?php 
                  if (is_eligible_for_discount($products[$product_id]['category'])) {
                    echo "<p><strong>Customer Loyalty Discount:</strong> " . calculate_discount($products[$product_id]['category']) . "%</p>";
                  }
                ?>
                <p><strong>Category:</strong> <?php echo $products[$product_id]['category'];?></p>
                <form method="post" action="cart.php">
                  <div class="form-group">
                    <label class="sr-only">Amount (in dollars)</label>
                    <div class="input-group">
                      <label for="order-qty">How many pairs do you want?</label>
                      <input type="number" class="form-control" id="order-qty" name="qty" value="1" step="1" min="1" required>
                      <input type="hidden" value="<?php echo calculate_price($products[$product_id]['price'],$products[$product_id]['category']); ?>" name="unit-price" id="unit-price">
                      <input type="hidden" value="<?php echo $product_id; ?>" name="productID">
                      <p>
                        <a class="btn btn-default" id="add-qty">+</a>
                        <a class="btn btn-default" id="minus-qty">-</a>
                      </p>
                      
                    </div>
                  </div>
                  <button class="btn btn-success" type="submit" id="buy-now">Buy</button>
                </form>
                <p><small>Normally delivered within 3-5 business days</small></p>
              </div>
              <div class="panel-footer">Subtotal: <span class="pull-right" id="subtotal"></span></div>
            </div>
          </div>
        </div>
      </div>
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
      <?php require 'partials/javascript.php'; ?>

      <script>
        //Ensure that the subtotal is updated whenever the value of 'order-qty' is changed
        $('#order-qty').change(function(){
          var subtotal = $('#unit-price').val() * $('#order-qty').val();
          $('#subtotal').text("$" + subtotal.toFixed(2));
        });

        //Increase 'order-qty' when user clicks the appropriate button
        $('#add-qty').click(function(){
          var current_quantity = parseInt($('#order-qty').val());
          var updated_qty = current_quantity + 1;
          $('#order-qty').val(updated_qty).change();
        });

        //Decrease 'order-qty' when user clicks the appropriate button
        $('#minus-qty').click(function(){
          var current_quantity = parseInt($('#order-qty').val());
          if (current_quantity > 1) {
            var updated_qty = current_quantity - 1;
            $('#order-qty').val(updated_qty).change();
          };
        });
      </script>
  </body>
</html>