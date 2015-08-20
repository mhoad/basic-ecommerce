<?php 
  // Delete the orders.txt file if it exists
  if (file_exists("../orders.txt")) {
    unlink("../orders.txt");
  }
?>