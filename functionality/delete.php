<?php 
  // Delete the orders.txt file if it exists
  if (unlink("../orders.txt")) {
    echo "success";
  } else {
    echo "error";
  }
?>