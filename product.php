<?php require 'partials/head.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main itemscope itemtype="http://schema.org/Product">
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li class="active">The Smooth Operator</li>
      </ol>
      <div class="page-header">
        <h1>
          <span itemprop="name">The Smooth Operator </span>
          <span itemscope itemtype="http://schema.org/Offer">
            <meta itemprop="availability" content="http://schema.org/InStock">
            <small>
              <span itemprop="priceCurrency" content="AUD">$</span>
              <span itemprop="price" content="84.99">84.99</span>
            </small>
          </span>
        </h1>
      </div>
      <div class="row" >
        <div class="col-sm-4">
          <!-- Original image sourced from https://stocksnap.io/photo/DC246EC89C -->
          <img src="img/smooth-operator-product.jpg" class="img-responsive" alt="The Smooth Operator Shoe" itemprop="image">
        </div>
        <div class="col-sm-8" itemprop="description">
          <p class="lead"><em>Great for Work... Even Better for After Work Drinks</em></p>
          <h5>Product Description</h5>
          <p>
            The perfect addition to your work wardrobe, that you'll also be happy to wear on the weekend. 
            Dress shoes can be hard to buy. They're expensive. And you don't really know if you like them 
            until you've gotten your first blister and decide that you hate them. You will not hate these shoes. 
            The cushioning inside makes it feel like you're walking on clouds. The high ankle means that 
            there is no rubbing, ever. You will not get a blister with these shoes. 
          </p>
          <p>
            Also, they've got style. They're classic with a little something. They're not your father's boring shoes, 
            but they're not so eccentric that your boss rolls his eyes. We call them "hipster-lite". Your girlfriend 
            loves to show them off and brag to her friends about your sense of style and your mom thinks you just 
            look so handsome. Hey, this might be the first thing they've ever agreed on. These shoes are definitely 
            a win-win.
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
                <p></p>
                <form method="post" action="http://coreteaching01.csit.rmit.edu.au/~e54061/wp/formprocessor.php">
                  <div class="form-group">
                    <label class="sr-only">Amount (in dollars)</label>
                    <div class="input-group">
                      <label for="order-qty">How many pairs do you want?</label>
                      <input type="number" class="form-control" id="order-qty" name="qty" value="1" step="1" min="1" required>
                      <input type="hidden" value="84.99" name="unit-price" id="unit-price">
                      <input type="hidden" value="p12345" name="productID">
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