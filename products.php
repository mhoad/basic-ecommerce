<?php require 'partials/head.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Products</li>
        </ol>
        <div class="page-header">
          <h1>Browse Our Products: <small>We Have Shoes For Every Occassion</small></h1>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4" itemscope itemtype="http://schema.org/Product">
            <div class="thumbnail">
              
                <div class="folded sold-out" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                  <h2 itemprop="availability" itemscope itemtype="http://schema.org/SoldOut">Sold Out</h2>
                  <meta itemprop="priceCurrency" content="AUD">
                  <meta itemprop="price" content="72.99">
                </div>
              <!-- Original image sourced from https://stocksnap.io/photo/3K5S13RPLL -->
              <img src="img/navy-all-day.jpg" alt="Navy All Day Shoes" itemprop="image">
              <div class="caption">
                <h3 itemprop="name">The Navy All-Day</h3>
                <p itemprop="description">A thick, cushion-y bottom and a soft, flexible top. The Navy All-Day is a shoe that 
                you can live in. This shoe will be your companion through thick and thin.</p>
                <p><a href="#" class="btn btn-primary disabled" role="button">View Product</a></p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4" itemscope itemtype="http://schema.org/Product">
            <div class="thumbnail">

              <div class="folded sold-out" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                  <h2 itemprop="availability" itemscope itemtype="http://schema.org/SoldOut">Sold Out</h2>
                  <meta itemprop="priceCurrency" content="AUD">
                  <meta itemprop="price" content="64.99">
                </div>
              <!-- Original image sourced from https://stocksnap.io/photo/MFQ5MVE2HL -->
              <img src="img/the-dakota.jpg" alt="The Dakota Shoe" itemprop="image">
              <div class="caption">
                <h3 itemprop="name">The Dakota</h3>
                <p itemprop="description">From movie night with the girls to a meeting with your boss, this shoe does it all. 
                The Dakota can easily be dressed up or down, and has enough support to wear all day. 
                Hello, new favourite!</p>
                <p><a href="#" class="btn btn-primary disabled" role="button">View Product</a></p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4" itemscope itemtype="http://schema.org/Product">

            <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
              <meta itemprop="priceCurrency" content="AUD">
              <meta itemprop="price" content="84.99">
              <meta itemprop="availability" content="http://schema.org/InStock">
            </span>
            <div class="thumbnail">
              <!-- Original image sourced from https://stocksnap.io/photo/BAB0777D08 -->
              <img src="img/the-smooth-operator.jpg" alt="The Smooth Operator Shoe" itemprop="image">
              <div class="caption">
                <h3 itemprop="name">The Smooth Operator</h3>
                <p itemprop="description">Work shoes shouldn't be stiff! The Smooth Operator has built-in cushioning, supple leather, 
                and enough freedom to wear even after you've left the office.</p>
                <p><a href="product.php" class="btn btn-primary" role="button">View Product</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-md-4" itemscope itemtype="http://schema.org/Product">
            <div class="thumbnail">
              <div class="folded sold-out" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <h2 itemprop="availability" itemscope itemtype="http://schema.org/SoldOut">Sold Out</h2>
                <meta itemprop="priceCurrency" content="AUD">
                <meta itemprop="price" content="46.99">
              </div>
              <!-- Original image sourced from https://stocksnap.io/photo/Z5KV7RU4UD -->
              <img src="img/the-everest.jpg" alt="The Everest Shoe" itemprop="image">
              <div class="caption">
                <h3 itemprop="name">The Everest</h3>
                <p itemprop="description">When you're on a hike and everything hurts, comfortable shoes are a must! 
                The Everest is a shoe that will take a beating to save your feet. </p>
                <p><a href="#" class="btn btn-primary disabled" role="button">View Product</a></p>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4" itemscope itemtype="http://schema.org/Product">
            <div class="thumbnail">
              <div class="folded sold-out" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <h2 itemprop="availability" itemscope itemtype="http://schema.org/SoldOut">Sold Out</h2>
                <meta itemprop="priceCurrency" content="AUD">
                <meta itemprop="price" content="57.99">
              </div>
              <!-- Original image sourced from https://stocksnap.io/photo/CE71D332AF -->
              <img src="img/the-bailar.jpg" alt="The Bailar Shoe" itemprop="image">
              <div class="caption">
                <h3 itemprop="name">The Bailar</h3>
                <p itemprop="description">Ever seen a woman holding her shoes as she walks barefoot home after a long night of dancing? 
                Your feet deserve better! The Bailar is gorgeous and cushioned, with hidden in-soles that 
                will ensure you can cha-cha-cha as long as you like.</p>
                <p><a href="#" class="btn btn-primary disabled" role="button">View Product</a></p>
              </div>
            </div>
          </div>

        </div>
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
      <?php require 'partials/javascript.php'; ?>
  </body>
</html>