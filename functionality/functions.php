<?php 
  function calculate_discount($product_category)
  {
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
?>