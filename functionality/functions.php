<?php 
  function calculate_discount($product_category)
  {
    // There are 3 product categories that are eligable for a discount including:
    // Formal shoes, Boots and Casual shoes. So we will just pass in the product
    // category and then use a switch statement to see if it is an eligable category
    // if it is then we will simply check for the existence of a session variable that 
    // is set upon login and contains the personal discounts for that customer. If there
    // is no appropriate session variable for the user than the discount will simply be 0
    
    switch ($product_category) {
      case 'Formal':
        if (isset($_SESSION["discount_1"])) {
          return $_SESSION["discount_1"];
        } else {
          return 0;
        }
        break;
      case 'Boot':
        if (isset($_SESSION["discount_2"])) {
          return $_SESSION["discount_2"];
        } else {
          return 0;
        }
        break;
      case 'Casual':
        if (isset($_SESSION["discount_3"])) {
          return $_SESSION["discount_3"];
        } else {
          return 0;
        }
        break;
      // No other categories receive a discount unfortunately  
      default:
        return 0;
        break;
    }
  }

  function is_eligible_for_discount($product_category){
    $discount = calculate_discount($product_category);
    if ($discount > 0) {
      return true;
    } else {
      return false;
    }
  }

  function calculate_price($original_price, $product_category){
    $discount = calculate_discount($product_category);
    if ($discount > 0) {
      // If they are eligable for a discount we need to give it to them
      // First lets calculate how much we will take from the final price
      $discount_amount = $original_price * ($discount/100);
      // Then just subtract that amount from the original price and round it to 2 decimal places
      return round($original_price - $discount_amount, 2);
    } else {
      return $original_price;
    }
  }
    function calculate_order_total() {
      $total_price = 0;
      foreach($_SESSION['cart'] as $pid => $qty){
        $unit_price = calculate_product_subtotal($pid);
        $total_price = $total_price + ($unit_price * $qty);
      }
      return $total_price;
    }

    function update_cart($product_id, $qty)
    {
      if (isset($_SESSION['cart'][$product_id])) {
        // We already have a quantity associated with this product
        // therefore we need to update it. Let's start by grabbing 
        // the existing value (i.e. the quanity) associated with it.
        $existing_qty = $_SESSION['cart'][$product_id];
        // Now we just update it by adding the new quantity
        $_SESSION['cart'][$product_id] = $existing_qty + $qty;
      } else {
        // At this point we can assume that we don't have this item in 
        // the cart yet so we just use the quantity passed to the function.
        $_SESSION['cart'][$product_id] = $qty;
      }
    }

    function calculate_product_subtotal($product_id)
    {
      // Grab the original price and the product category
      require 'product_listings.php';
      $original_price =  $products[$product_id]['price'];
      $category =  $products[$product_id]['category'];
      return calculate_price($original_price, $category);
    }

    function get_product_name($product_id){
      require 'product_listings.php';
      return $products[$product_id]['title'];
    }

    function display_cart_details($items_in_basket)
    {
      # TODO: WRITE THIS SECTION
      echo "<table class='table table-striped'>";
      echo "<tr>";
      echo "<th>Item Name</th>";
      echo "<th>Quantity</th>";
      echo "<th>Unit Price</th>";
      echo "<th>Product Subtotal</th>";
      echo "</tr>";
      echo "<tbody>";
      
      foreach($_SESSION['cart'] as $pid => $qty)
      {
        echo "<tr>";
        echo "<td>" . get_product_name($pid) . "</td>";
        echo "<td>" . $qty . "</td>"; 
        echo "<td> $" . calculate_product_subtotal($pid) . "</td>";
        echo "<td> $" . calculate_product_subtotal($pid) * $qty . "</td>"; 
        echo "</tr>";
      }
      echo "<tr class='info'>";
      echo "<td></td><td></td><td></td>";
      echo "<td><strong>Total Price:</strong> $" . calculate_order_total() . "</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
      echo "<a href='checkout.php' class='btn btn-success'>Checkout</a>";
    }
?>