<?php 
  require 'partials/head.php';
  require 'functionality/functions.php';
?>
<body>
  <script type="text/javascript">
    function validateCreditCardExpiry() {
      var cc_month = document.forms["customer-details"]["credit_card_month"].value;
      var cc_year = document.forms["customer-details"]["credit_card_year"].value;

      var current_month = new Date().getMonth()+1;
      var current_year = new Date().getFullYear();
      
      var user_credit_card_date = new Date(cc_year, cc_month);
      var current_date = new Date(current_year, current_month);

      if (user_credit_card_date < current_date) {
        alert("Please ensure your credit card is up to date");
        return false;  
      };
    }
  </script>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Shipping Details</h3>
          </div>
          <div class="panel-body">
            We're glad that you like our products. Now before we can
            send them to you we just need to grab some quick details
            in the form below. If you're already a member we have 
            pre-populated some forms for you already to save you time!
          </div>
        </div>
        <!-- Begin Checkout Form -->
        <div class="row">
          <div class="col-lg-6 col-md-offset-4">
            <form id="customer-details" method="post" onsubmit="return validateCreditCardExpiry()" action="process_order.php">
              <div class="input-group input-group-lg">
                <p>
                  <label for="customer_first_name">First Name</label><br>
                  <input type="text" class="form-control" required <?php (isset($_SESSION["first_name"]) ? print 'value="' . $_SESSION["first_name"] . '"' : print 'placeholder="Joe"'); ?> name="first_name" id="customer_first_name">
                </p>
                <p>
                  <label for="customer_first_name">Last Name</label><br>
                  <input type="text" class="form-control"  <?php (isset($_SESSION["last_name"]) ? print 'value="' . $_SESSION["last_name"] . '"' : print 'placeholder="Smith"'); ?> name="last_name" id="customer_last_name">
                </p>
              </div>
              <div class="input-group">
                <p>
                  <label for="customer_address">Mailing Address</label><br>
                  <textarea required id="customer_address" rows="4" name="customer_address"></textarea>
                </p>
              </div>
              <div class="input-group input-group-lg">
                <p>
                  <label for="customer_email_address">Email Address</label><br>
                  <input type="email" class="form-control" required <?php (isset($_SESSION["email"]) ? print 'value="' . $_SESSION["email"] . '"' : print 'placeholder="joe@example.com"'); ?> name="email_address" id="customer_email_address">
                </p>
                <p>
                  <label for="customer_phone_number">Mobile Phone Number</label><br>
                  <input type="text" class="form-control" required <?php (isset($_SESSION["phone_number"]) ? print 'value="' . $_SESSION["phone_number"] . '"' : print 'placeholder="+61 410 825 666"'); ?> name="phone_number" id="customer_phone_number" pattern="^[(+]?[)\d ]+$">
                </p>
              </div>
              <div class="input-group input-group-lg">
                <p>  
                  <label>Delivery Method</label><br>
                  <input type="radio" name="animal" value="Regular" checked="" />Regular Post
                  <input type="radio" name="animal" value="Courier" />Courier
                  <input type="radio" name="animal" value="Express" />Express Courier
                </p>
              </div>
              <div class="input-group input-group-lg">
                <p>
                  <label for="customer_credit_card">Credit Card</label><br>
                  <input type="text" id="customer_credit_card" placeholder="1234 4568 91012" pattern="[0-9| ]{13,18}" name="credit_card_number" />
                </p>
                <p>
                  <label>Credit Card Expiry Date</label><br>
                  <select name="credit_card_month">
                    <option value="01">01 Jan</option>
                    <option value="02">02 Feb</option>
                    <option value="03">03 Mar</option>
                    <option value="04">04 Apr</option>
                    <option value="05">05 May</option>
                    <option value="06">0 Jun</option>
                    <option value="07">07 Jul</option>
                    <option value="08">08 Aug</option>
                    <option value="09">09 Sep</option>
                    <option value="10">10 Oct</option>
                    <option value="11">11 Nov</option>
                    <option value="12">12 Dec</option>
                  </select>
                  <select name="credit_card_year">
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                  </select>
                </p>
              </div>
              <div class="input-group input-group-lg">
                <p>
                  <label>Newsletter</label><br>
                  <input type="checkbox" name="newsletter" value="true">Yes, Please Subscribe Me
                </p>
              </div>
              <button class="btn btn-primary">Purchase</button>
              <a href="cart.php" class="btn btn-default">Edit My Shopping Cart</a>
            </form>
          </div>
        </div>
        
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
    <?php require 'partials/javascript.php'; ?>
  </body>
</html>